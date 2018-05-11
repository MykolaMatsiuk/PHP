import React, { Component } from "react";
import imgCart from "../cart.png";

class Cart extends Component {
  render() {
    return (
      <div onClick={this.props.showCart}>
        <img
          src={imgCart}
          alt="cart"
          className="cart-img"
        />
        <span className="cart-msg">
          {this.props.name}
          {this.props.currency}
        </span>
        <span className="items-count">
          {this.props.count}
        </span>
      </div>
    );
  }
}

export default Cart;
