import React, { Component } from "react";

class Basket extends Component {
  constructor() {
    super();
    this.state = {
      itemsInCart: null,
      rerender: false,
      cart: null,
      currency: null,
      itemsCount: null,
      show: false
    };
  }

  componentDidMount() {
    if (
      JSON.parse(localStorage.getItem("cart")) &&
      JSON.parse(localStorage.getItem("cart")) instanceof
        Array
    ) {
      if (JSON.parse(localStorage.getItem("cart")).length) {
        let totalPrice = JSON.parse(
          localStorage.getItem("cart")
        )
          .map(item => item.price)
          .reduce((prev, current) => {
            return prev + current;
          }, 0);
        this.setState({
          itemsInCart: JSON.parse(
            localStorage.getItem("cart")
          ),
          cart: totalPrice,
          currency: " грн",
          itemsCount: JSON.parse(
            localStorage.getItem("cart")
          ).length
        });
      }
    }
  }

  removeItem(id) {
    let arr = this.state.itemsInCart;
    let arrWhole = arr.slice();
    let remove = arr.map(item => item.id).indexOf(id);
    let item = arr.splice(remove, 1);
    this.setState({
      itemsInCart: arr,
      itemsCount: arr.length,
      cart: arr.length
        ? this.state.cart - arrWhole[remove].price
        : "Кошик порожній",
      currency: arr.length ? "грн" : null
    });
    localStorage.setItem("cart", JSON.stringify(arr));
  }

  changeSize(e, id, size, name) {
    let arr = this.state.itemsInCart;
    this.state.itemsInCart.map(item => {
      if (
        id === item.id &&
        size === item.chosenSize &&
        name === item.name
      ) {
        item.chosenSize = e.target.value;
        this.setState({ rerender: !this.state.rerender });
      }
    });
    localStorage.setItem("cart", JSON.stringify(arr));
  }

  makeOrder() {
    axios
      .post("/api/makeorder", {
        items: JSON.stringify(this.state.itemsInCart),
        total: JSON.stringify(this.state.cart)
      })
      .then(res => console.log(res.data))
      .catch(error => console.log(error));
    this.setState({
      show: !this.state.show,
      itemsInCart: []
    });
    localStorage.setItem("cart", JSON.stringify([]));
  }

  render() {
    return this.state.itemsInCart && window.user ? (
      <div className="container cart-content">
        <div className="cart-total">
          {this.state.itemsInCart.length ? (
            <div className="cart-count">
              К-сть товарів: {this.state.itemsCount}шт.
            </div>
          ) : null}
          {this.state.itemsInCart.length ? (
            <div className="cart-price">
              Загальна вартість: {this.state.cart}{" "}
              {this.state.currency}
            </div>
          ) : null}
        </div>
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
                    <div className="select-size">
                      <select
                        name="size"
                        id="size"
                        className="form-control"
                        onChange={e =>
                          this.changeSize(
                            e,
                            item.id,
                            item.chosenSize,
                            item.name
                          )
                        }
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

                    <div className="delete-item">
                      <button
                        className="btn btn-danger"
                        onClick={() =>
                          this.removeItem(item.id)
                        }
                      >
                        Видалити
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            // <hr/>
          );
        })}
        {this.state.itemsInCart.length ? (
          <div className="make-order">
            <button
              onClick={() => this.makeOrder()}
              className="btn btn-success sub"
            >
              Зробити замовлення
            </button>
          </div>
        ) : (
          <div className="container">
            <div className="card cart-register">
              <div className="card-body">
                <div className="form-group">
                  {this.state.show ? (
                    <p>
                      Дякуєм за замовлення, найближчим часом
                      наш менеджер зв'яжиться з Вами. Деталі
                      замовлення Ви можете переглянути в
                      особистому{" "}
                      <a href="/orders">кабінеті</a>.
                    </p>
                  ) : null}
                  <p>
                    Кошик порожній, перейти на{" "}
                    <a href="/">головну</a> сторінку.
                  </p>
                </div>
              </div>
            </div>
          </div>
        )}
      </div>
    ) : (
      <div className="container">
        <div className="card cart-register">
          <div className="card-body">
            <div className="form-group">
              {window.user ? (
                <p>
                  Кошик порожній, перейти на{" "}
                  <a href="/">головну</a> сторінку.
                </p>
              ) : (
                <p>
                  <a href="/register">Зареєструйся</a>, щоб
                  зробити замовлення або зайди в свій{" "}
                  <a href="/login">аккаунт</a>.
                </p>
              )}
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Basket;
