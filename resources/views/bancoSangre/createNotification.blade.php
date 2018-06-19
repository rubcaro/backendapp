@extends('layouts.app')

@section('content')
<div class="container">
<h2>Crear notificación</h2>

<div class="row">
  <div class="col-8">
    <div class="form-group">
      <label>Título</label>
      <input id="title" type="text" class="form-control" />
    </div>
  </div>

</div>
<div class="row">
  <div class="col-8">
    <div class="form-group">
      <label>Mensaje</label>
      <input id="body" type="text" class="form-control" />
    </div>
  </div>
</div>
<div class="row">
  <div class="col-8">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo de sangre</label>
      <select class="form-control" id="bloodType">
        @foreach ($tiposSangre as $tipoSangre)
      <option value="{{ $tipoSangre->id }}">{{$tipoSangre->nombre}}</option>
        @endforeach
        
      </select>
    </div>
  </div>
</div>
<button id="btn" class="btn btn-primary">
  <i id="send" class="fas fa-arrow-right" style="display: inline-block; margin-right:.5em"></i>
  <i id="loader" class="fa fa-spinner fa-spin" style="display: none; margin-right:.5em"></i>
  <span id="mensaje">Enviar notificación</span>
</button>
<h3 id="error" style="color: red"></h3>
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none" id="alert-fail">
  Lo sentimos, la notificación no se ha podido enviar.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none" id="alert-success">
  La notificación ha sido enviada correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endsection

@section('scripts')
<script>
const URL = "https://fcm.googleapis.com/fcm/send";

var btn = document.getElementById("btn");
var mensaje = document.getElementById("mensaje");
var loader = document.getElementById("loader");
var send = document.getElementById("send");
var alertSuccess = document.getElementById("alert-success");
var alertFail = document.getElementById("alert-fail");

const postData = (url, data) => {
  return fetch(url, {
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
      Authorization:
        "key=AAAAwGMmdYc:APA91bEASWlo2tit3HWa5oTuU82npnFwDXsPp2G32f93C7OGevy63EIkW3moPsaYK4g5j3r-4ItCs_N9kJVL_diIlUKteDxOfVAqNay6H3bOeWl1MZa9YkHmdRXwnWFi6-zElBEHI0BX"
    },
    method: "POST"
  }).then(response => {
    return response.json();
  });
};

const loadingButton = () => {
  send.style.display = "none";
  loader.style.display = "inline-block";
  btn.disabled = true;
  mensaje.innerText = "Enviando mensaje";
};

const normalButton = () => {
  btn.disabled = false;
  send.style.display = "inline-block";
  loader.style.display = "none";
  mensaje.innerText = "Enviar mensaje";
};

const storeMessage = (title, body, bloodType, user, messageId) => {
  asd = {
    titulo: title,
    mensaje: body,
    tipo_sangre_id: bloodType,
    user_id: user,
    message_id: messageId
  }

  fetch('http://localhost:8000/api/ingresar-notificacion', {
    body: JSON.stringify(asd),
    headers: {
      "Content-Type": "application/json"
    },
    method: "POST"
  }).then(response => {
    return response.json();
  }).then(data => {
    console.log(data);
  })
}

btn.addEventListener("click", () => {
  var title = document.getElementById("title");
  var body = document.getElementById("body");
  var bloodType = document.getElementById("bloodType");

  if (title.value == "" || body.value == "") {
    alert("Debe completar los campos antes de enviar una notificación.");
    return;
  }
  console.log({{ Auth::user()->id  }});

  loadingButton();

  const message = {
    to: "/topics/allDevices",
    data: {
      title: title.value,
      body: body.value,
      bloodType: bloodType.value,
    }
  };

  postData(URL, message)
    .then(data => {
      console.log(data);
      alertSuccess.style.display = "inline-block";
      storeMessage(title.value, body.value, bloodType.value, {{Auth::user()->id}}, data.message_id.toString() );
      normalButton();

    })
    .catch(error => {
      alertFail.style.display = "inline-block";
      normalButton();
    });

});
</script>
@endsection
