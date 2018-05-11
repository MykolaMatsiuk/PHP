import React, { Component } from "react";

class Basket extends Component {
  constructor() {
    super();
    this.state = {
      itemsInCart: null
    };
  }

  componentDidMount() {
    if (JSON.parse(localStorage.getItem("cart")).length) {
      this.setState({
        itemsInCart: JSON.parse(
          localStorage.getItem("cart")
        )
      });
    }
  }

  render() {
    return this.state.itemsInCart ? (
      <div className="container cart-body">
        <ul>
          {this.state.itemsInCart.map((item, i) => {
            return (
              <li key={i} className="basket-item">
                {item.name} - {item.model} -{" "}
                {item.chosenSize} -
                {item.price} грн
              </li>
            );
          })}
        </ul>
      </div>
    ) : (
      <div className="container">Кошик порожній</div>
    );
  }
}

export default Basket;
