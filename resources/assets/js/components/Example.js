import React, { Component } from "react";
import ReactDOM from "react-dom";

import encuestas from "./../data/encuestas";

import Encuesta from "./Encuesta";
import AddEncuesta from './AddEncuesta'

export default class Example extends Component {
  constructor() {
    super();
    this.state = {
      encuestas: encuestas,
      currentEncuesta: {},
      addEncuesta: false
    };
  }
  showEncuesta(encuesta) {
    this.state.encuestas.map(encuesta => {
      if (encuesta.id === id) {
        return encuesta;
      }
    });
  }
  changeCurrentEncuesta(encuesta) {
    this.setState({ currentEncuesta: encuesta });
  }
  showAddEncuesta() {
    this.setState({ currentEncuesta: {} });
    this.setState({ addEncuesta: true });
  }
  render() {
    return (
      <div className="row">
        {/* {this.state.encuestas.map((encuesta, index) => (
          <button
            onClick={() => this.setState({ currentEncuesta: encuesta })}
            key={index}
          >
            {encuesta.nombre} - {encuesta.id}
          </button>
        ))} */}
        {/* <div className="col-12">
          <button onClick={() => this.showAddEncuesta()} className="btn btn-primary btn-fw">
            Ingresar encuesta
          </button>
        </div>
        {Object.keys(this.state.currentEncuesta).length != 0 && (
          <Encuesta encuesta={this.state.currentEncuesta} />
        )} */}
        <div className="col-12">
          <AddEncuesta/>
        </div>
      </div>
    );
  }
}

if (document.getElementById("example")) {
  ReactDOM.render(<Example />, document.getElementById("example"));
}
