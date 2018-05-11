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
    return this.state.itemsInCart && window.user ? (
      <div className="container cart-content">
        {this.state.itemsInCart.map((item, i) => {
          return (
            <div key={i} className="card cart-item">
              <div className="card-body">
                <div className="basket-item">
                  <div>
                    <a href={`/items/${item.id}`}>
                      <img
                        src={`/${item.images[0].src}`}
                        alt={item.model}
                        width="100"
                      />
                    </a>
                  </div>
                  <div className="whole-item">
                    <div>
                      <span className="cart-item-words">
                        Кросівки:{" "}
                      </span>
                      <b>
                        {item.name} {item.model}
                      </b>{" "}
                    </div>
                    <div>
                      <span className="cart-item-words">
                        Розмір:{" "}
                      </span>
                      <b>{item.chosenSize}</b>{" "}
                    </div>
                    <div>
                      <span className="cart-item-words">
                        Ціна:{" "}
                      </span>
                      {item.price} грн
                    </div>
                    <div>
                      <select
                        name="size"
                        id="size"
                        className="form-control"
                        onChange={this.props.chooseSize}
                      >
                        <option value="">
                          Змінити розмір
                        </option>
                        {item.sizes.map((size, i) => {
                          return (
                            <option
                              value={size.size}
                              key={i}
                            >
                              {size.size}
                            </option>
                          );
                        })}
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            // <hr/>
          );
        })}
      </div>
    ) : (
      <div className="container">
        <div className="card cart-register">
          <div className="card-body">
            <div className="form-group">
              <p>
                <a href="/register">Зареєструйся</a>, щоб
                зробити замовлення або зайди в свій{" "}
                <a href="/login">аккаунт</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Basket;
