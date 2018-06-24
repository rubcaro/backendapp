import React from "react";

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
      valorAlternativa: ''
    };
    // this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleChangeAlternativa = this.handleChangeAlternativa.bind(this);
  }

  addPregunta() {
    this.setState((prevState, props) => {
      let n = {id: prevState.id,pregunta: "", alternativas: []};
      prevState.encuesta.preguntas.push(n);
      return {encuesta: prevState.encuesta}
    })
  }

  addAlternativa(id) {
    this.setState((prevState, props) => {
      prevState.encuesta.preguntas[id].alternativas.push(this.state.valorAlternativa);
      return {encuesta: prevState.encuesta}
    })
    this.setState({valorAlternativa: ''})
  }

  deletePregunta(id) {
    console.log(id);
    this.setState((prevState, props) => {
      // prevState.encuesta.preguntas = prevState.encuesta.preguntas.filter(pregunta => pregunta.id != id) 
      prevState.encuesta.preguntas.splice(id,1);
      return {encuesta: prevState.encuesta}     
    })
  }

  deleteAlternativa(indexAlternativa, index) {
    this.setState((prevState, props) => {
      prevState.encuesta.preguntas[index].alternativas.splice(indexAlternativa,1);
      return {encuesta: prevState.encuesta}
    })
  }

  handleSubmit(event) {
    event.preventDefault();
  }

  handleChange(index, event) {
    event.persist();
    this.setState((prevState, props) => {
      prevState.encuesta.preguntas[index].pregunta = event.target.value;
      return {encuesta: prevState.encuesta}
    });
  }

  handleChangeAlternativa(event) {
    this.setState({valorAlternativa: event.target.value})
  }

  render() {
    return (
      <div>
        <h4>Nombre de la encuesta</h4>
        <input type="text" />
        {this.state.encuesta.preguntas.map((pregunta, index) => (
          <div key={index}> 
            <h4>Pregunta</h4>
              <input type="text" value={this.state.encuesta.preguntas[index].pregunta} onChange={this.handleChange.bind(this, index)}/>
            <ol type="a">
              {pregunta.alternativas.map((alternativa, indexAlternativa) => (
                <div key={indexAlternativa}>
                  <li>{alternativa}</li>
                  <button onClick={() => this.deleteAlternativa(indexAlternativa, index)}>Eliminar alternativa</button>
                </div>
              ))}
            </ol>
            <input type="text" value={this.state.valorAlternativa} onChange={this.handleChangeAlternativa}/>
            <button onClick={() => this.addAlternativa(index)}>Agregar alternativa</button>
            <button onClick={() => this.deletePregunta(index)}>Eliminar pregunta</button>
          </div>
        ))}
        <button onClick={() => {this.state.id++; this.addPregunta(); }}>Agregar pregunta</button>
      </div>
    );
  }
}
