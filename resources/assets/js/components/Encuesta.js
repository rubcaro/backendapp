import React from "react";

import Pregunta from "./Pregunta";

export default class Encuesta extends React.Component {
  constructor() {
    super();
  }
  render() {
    return (
      <div className="row">
        <h1>
          {this.props.encuesta.nombre} - {this.props.encuesta.id}
        </h1>
        {this.props.encuesta.preguntas.map((pregunta, index) => (
          <Pregunta pregunta={pregunta} key={index}/>
        ))}
      </div>
    );
  }
}
