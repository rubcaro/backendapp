import React from "react";
import ReactDOM from "react-dom";

export default class Prueba extends React.Component {
  constructor() {
    super();
    this.state = {
      encuesta: {
        nombre: "",
        encuesta_id: "",
        preguntas: []
      },
      respuesta: {
        encuesta_id: "",
        respuestas: []
      },
      encuesta_id: "",
      preguntas: [
        {
          alternativas: [
            {
              alternativa: 'dsjfjsdjf'
            }
          ],
          pregunta: 'qweejkjkm'
        }
      ]
    };
  }

  async fetchData() {
    let dat = '';
    fetch(`${APP_URL}/api/encuesta/1`)
      .then(res => res.json())
      .then(data => console.log(data))
    // let res = await response.json();
    // let data = res[0];
    // return data;
  }

  createPreguntas(encuesta) {
    let preguntas = [];

    encuesta.preguntas.map(pregunta => {
      let alternativas = [];
      pregunta.alternativas.map(alternativa => {
        let nuevaAlternativa = {
          id: alternativa.id,
          alternativa: alternativa.alternativa,
          selected: false
        };
        alternativas.push(nuevaAlternativa);
      });
      preguntas.push({
        pregunta_id: pregunta.id,
        pregunta: pregunta.pregunta,
        alternativas: alternativas
      });
    });

    this.setState({ encuesta_id: encuesta.id });
    return preguntas;
  }

  componentDidMount() {
    fetch(`${APP_URL}/api/encuesta/1`)
      .then(res => res.json())
      .then(data => {
        let preguntas = this.createPreguntas(data[0]);
        this.setState({ preguntas: preguntas });
      })
      .catch(error => console.log(error));
  }

  render() {
    // if (!this.state.preguntas) {
    //   return (
    //     <h2>Cargando</h2>
    //   );
    // }
    return (
      <div>
        {this.state.preguntas.map((pregunta, indexPregunta) => {
          <div key={indexPregunta}>
          {console.log(pregunta.pregunta)}
            <h2>fdgfdgdfg</h2>
            <ul>
              {pregunta.alternativas.map((alternativa, indexAlternativa) => {
                <li>{alternativa.alternativa}</li>
              })}
            </ul>
          </div>
        })}
      </div>
    );
  }
}

if (document.getElementById("asdf")) {
  ReactDOM.render(<Prueba />, document.getElementById("asdf"));
}
