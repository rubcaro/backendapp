import React, { Component } from "react";
import ReactDOM from "react-dom";
// import { PieChart, Pie, Tooltip } from "recharts";
import { Pie } from "react-chartjs-2";

export default class Result extends Component {
  constructor() {
    super();
    this.state = {
      results: {},
      preguntas: []
    };
  }

  componentDidMount() {
    fetch("http://localhost:8000/api/encuestas/1/resultados")
      .then(response => response.json())
      .then(data => {
        this.setState({ results: data });
        this.createPreguntas();
      })
      .catch(error => console.log(error));
  }

  createPreguntas() {
    let preguntas = [];
    this.state.results.preguntas.map(pregunta => {
      let preg = {data: {}};
      preg.pregunta = pregunta.pregunta;
      preg.data.labels = [];
      preg.data.datasets = [
        {
          label: "Cantidad",
          data: [],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)"
          ],
          borderColor: [
            "rgba(255,99,132,1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)"
          ],
          borderWidth: 1
        }
      ];
      pregunta.alternativas.map(alternativa => {
        preg.data.labels.push(alternativa.alternativa);
        preg.data.datasets[0].data.push(alternativa.cantidad);
      });
      preguntas.push(preg);
    });
    // console.log(preguntas);
    this.setState({ preguntas: preguntas });
  }

  render() {
    return (
      <div>
        {this.state.preguntas.map((pregunta, key) => (
          <div key={key}>
            <h3>{pregunta.pregunta}</h3>
            <Pie data={pregunta.data} options={{}} />
          </div>
        ))}
      </div>
    );
  }
}

if (document.getElementById("result")) {
  ReactDOM.render(<Result />, document.getElementById("result"));
}
