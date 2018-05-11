import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class NotFound extends Component {
  render() {
    return (
      <div
        style={{ textAlign: "center", minHeight: "600px" }}
      >
        <div>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="280"
            height="240"
            viewBox="50 0 600.000000 320.000000"
          >
            <g transform="scale(0.9, 0.9)">
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="10"
                d="M205.47907053363792,49.085278457943886 L149.6651153947748,236.68218323023385 "
                id="svg_1"
              />
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="5"
                d="M148.88992158431185,237.4573770406968L286.0992279673503,198.69768597204182"
                id="svg_3"
              />
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="10"
                d="M148.88992158431185,237.4573770406968 L286.0992279673503,198.69768597204182 "
                id="svg_8"
              />
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="10"
                d="M300.0527167520661,83.1938065874501L269.82015771851525,354.5116440680347"
                id="svg_5"
              />
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="10"
                d="M653.0759787759919,81.95349639534194 L622.843419742441,353.27133387592653 "
                id="svg_4"
              />
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="10"
                d="M502.8434070732035,241.02326902182165 L640.0527134562419,202.2635779531667 "
                id="svg_6"
              />
              <path
                fill="#242424"
                fillOpacity="1"
                stroke="#222222"
                strokeOpacity="1"
                strokeWidth="10"
                d="M558.0372141493606,53.58140212947556 L502.2232590104975,241.1783069017655 "
                id="svg_7"
              />
              <path
                fill="#ffffff"
                fillOpacity="0"
                stroke="#242424"
                strokeOpacity="1"
                strokeWidth="10"
                d="M331,213 C331,133.99447513812154 364.78729281767954,70 406.5,70 C448.21270718232046,70 482,
                133.99447513812154 482,213 C482,292.0055248618785 448.21270718232046,356 406.5,
                356 C364.78729281767954,356 331,292.0055248618785 331,213 Z"
                id="svg_2"
              />
            </g>
          </svg>
        </div>
        <h2 style={{ color: "#4C4E4E" }}>
          Сторінка не знайдена
        </h2>
        <p style={{ color: "#4C4E4E" }}>
          Вибач, але такої сторінки не існує. Повернутися на{" "}
          <a href="/">головну</a> сторінку.
        </p>
      </div>
    );
  }
}

if (document.getElementById("not-found")) {
  ReactDOM.render(
    <NotFound />,
    document.getElementById("not-found")
  );
}
