import React, { Component } from "react";
import ReactDOM from "react-dom";

class ModalCart extends Component {
  render() {
    return (
      <div>
        <ul>
          <li>
            <img
              className="cart-drop-img"
              src={`/${this.props.obj.images[0].src}`}
              alt={this.props.obj.model}
              width="66"
              height="66"
            />
            {this.props.obj.name} {this.props.obj.model}{" "}
            {this.props.obj.price} грн розмір:{" "}
            {this.props.obj.chosenSize}
            <span
              onClick={this.props.closeItem}
              className="cart-drop-close"
            >
              x
            </span>
          </li>
        </ul>
      </div>
    );
  }
}

export default ModalCart;
