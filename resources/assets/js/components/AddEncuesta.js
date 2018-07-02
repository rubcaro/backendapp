import React from "react";
import { CSSTransition, TransitionGroup } from "react-transition-group";

// import URL from "./../data/url";

export default class addEncuesta extends React.Component {
  constructor() {
    super();
    this.state = {
      encuesta: {
        id: 4,
        nombre: "",
        preguntas: [
          {
            id: 0,
            pregunta: "",
            alternativas: []
          }
        ]
      },
      id: 0,
      valorAlternativa: ""
    };
    // this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleChangeAlternativa = this.handleChangeAlternativa.bind(this);
    this.handleChangeNombre = this.handleChangeNombre.bind(this);
  }

  addEncuesta() {
    fetch(APP_URL + "/api/ingresar-encuesta", {
      body: JSON.stringify(this.state.encuesta),
      headers: {
        "Content-Type": "application/json"
      },
      method: "POST"
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        alert("Encuesta se ha agregado correctamente");
      })
      .catch(error => console.error(error));
  }

  addPregunta() {
    this.setState((prevState, props) => {
      let n = { id: prevState.id, pregunta: "", alternativas: [] };
      prevState.encuesta.preguntas.push(n);
      return { encuesta: prevState.encuesta };
    });
  }

  addAlternativa(id) {
    this.setState((prevState, props) => {
      prevState.encuesta.preguntas[id].alternativas.push(
        this.state.valorAlternativa
      );
      return { encuesta: prevState.encuesta };
    });
    this.setState({ valorAlternativa: "" });
  }

  deletePregunta(id) {
    console.log(id);
    this.setState((prevState, props) => {
      // prevState.encuesta.preguntas = prevState.encuesta.preguntas.filter(pregunta => pregunta.id != id)
      prevState.encuesta.preguntas.splice(id, 1);
      return { encuesta: prevState.encuesta };
    });
  }

  deleteAlternativa(indexAlternativa, index) {
    this.setState((prevState, props) => {
      prevState.encuesta.preguntas[index].alternativas.splice(
        indexAlternativa,
        1
      );
      return { encuesta: prevState.encuesta };
    });
  }

  handleSubmit(event) {
    event.preventDefault();
  }

  handleChange(index, event) {
    event.persist();
    this.setState((prevState, props) => {
      prevState.encuesta.preguntas[index].pregunta = event.target.value;
      return { encuesta: prevState.encuesta };
    });
  }

  handleChangeAlternativa(event) {
    this.setState({ valorAlternativa: event.target.value });
  }

  handleChangeNombre(event) {
    event.persist();
    this.setState((prevState, props) => {
      prevState.encuesta.nombre = event.target.value;
      return { encuesta: prevState.encuesta };
    });
  }

  render() {
    return (
      <div style={{ marginTop: "1em" }}>
        <div className="form-group">
          <h5>Nombre de la encuesta</h5>
          <input
            type="text"
            value={this.state.encuesta.nombre}
            onChange={this.handleChangeNombre}
            className="form-control"
          />
        </div>
        <TransitionGroup>
          {this.state.encuesta.preguntas.map((pregunta, index) => (
            <CSSTransition timeout={250} classNames="fade">
              <div key={index}>
                <hr />
                <h5>Pregunta</h5>
                <div className="row">
                  <div className="col-10">
                    <input
                      type="text"
                      value={this.state.encuesta.preguntas[index].pregunta}
                      onChange={this.handleChange.bind(this, index)}
                      className="form-control"
                    />
                  </div>
                  <div className="col-2">
                    <button
                      onClick={() => this.deletePregunta(index)}
                      className="btn btn-danger btn-fw"
                    >
                      <i className="far fa-trash-alt" />
                      Eliminar pregunta
                    </button>
                  </div>
                </div>
                <ol type="a">
                  <TransitionGroup>
                    {pregunta.alternativas.map(
                      (alternativa, indexAlternativa) => (
                        <CSSTransition timeout={250} classNames="fade">
                          <div key={indexAlternativa} className="alternativa">
                            <li>{alternativa}</li>
                            <button
                              onClick={() =>
                                this.deleteAlternativa(indexAlternativa, index)
                              }
                              className="btn btn-icons btn-rounded btn-light"
                            >
                              <i className="fas fa-times" />
                            </button>
                          </div>
                        </CSSTransition>
                      )
                    )}
                  </TransitionGroup>
                </ol>
                <div className="form-group">
                  <h5>Alternativa</h5>
                  <div className="row">
                    <div className="col-6">
                      <input
                        type="text"
                        value={this.state.valorAlternativa}
                        onChange={this.handleChangeAlternativa}
                        className="form-control"
                      />
                    </div>
                    <div>
                      <button
                        onClick={() => this.addAlternativa(index)}
                        className="btn btn-primary btn-fw"
                      >
                        Agregar alternativa
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </CSSTransition>
          ))}
        </TransitionGroup>
        <div className="row">
          <button
            onClick={() => {
              this.state.id++;
              this.addPregunta();
            }}
            className="btn btn-primary btn-fw"
          >
            <i className="fas fa-plus" />
            Agregar pregunta
          </button>
        </div>
        <div className="row" style={{ marginTop: "1em" }}>
          <button
            onClick={() => this.addEncuesta()}
            className="btn btn-secondary btn-fw"
          >
            Agregar encuesta
          </button>
        </div>
      </div>
    );
  }
}
