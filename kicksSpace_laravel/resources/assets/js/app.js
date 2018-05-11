require("./bootstrap");

window.axios = require("axios");

import React from "react";
import ReactDOM from "react-dom";
import App from "./components/App";
import NotFound from "./components/NotFound";
import Comments from "./components/Comments";
import AppTwo from "./components/AppTwo";
import Basket from "./components/Basket";

import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel";

import registerServiceWorker from "./registerServiceWorker";

if (document.getElementById("root")) {
  ReactDOM.render(<App />, document.getElementById("root"));
}

if (document.getElementById("app-two")) {
  ReactDOM.render(
    <AppTwo />,
    document.getElementById("app-two")
  );
}

if (document.getElementById("basket")) {
  ReactDOM.render(
    <Basket />,
    document.getElementById("basket")
  );
}
registerServiceWorker();
