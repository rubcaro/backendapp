import React from "react";

export default class Pregunta extends React.Component {
  render() {
    return (
      <div>
        <h2>{this.props.pregunta.pregunta}</h2>
        <ul>
          {this.props.pregunta.alternativas.map((alternativa, index) => (
            <li key={index}>{alternativa}</li>
          ))}
        </ul>
      </div>
    );
  }
}
