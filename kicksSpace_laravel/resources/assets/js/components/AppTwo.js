import React, { Component } from "react";
import Search from "./Search";
import Cart from "./Cart";
import Categories from "./Categories";
import ModalCart from "./ModalCart";
import ItemShow from "./ItemShow";

class AppTwo extends Component {
  constructor() {
    super();
    this.state = {
      size: null,
      items: null,
      itemsInCart: [],
      cart: "Кошик порожній",
      currency: null,
      itemsCount: null,
      chooseSize: null,
      showCart: false,
      item: null
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
    this.setState({
      item: window.item
    });
  }

  addToCart(item) {
    if (this.state.size != null) {
      item.chosenSize = this.state.size;
      let cart = this.state.itemsInCart.concat(item);
      localStorage.setItem("cart", JSON.stringify(cart));
      this.setState({
        itemsInCart: cart,
        currency: " грн",
        cart:
          typeof this.state.cart === "string"
            ? item.price
            : this.state.cart + item.price,
        itemsCount: cart.length,
        chooseSize: !this.state.chooseSize,
        size: null
      });
    } else {
      this.setState({ chooseSize: "вибери розмір" });
    }
  }

  closeItem(id) {
    let arr = this.state.itemsInCart;
    let arrWhole = arr.slice();
    let remove = arr.map(item => item.id).indexOf(id);
    let item = arr.splice(remove, 1);
    this.setState({
      itemsInCart: arr,
      itemsCount: arr.length ? arr.length : null,
      cart: arr.length
        ? this.state.cart - arrWhole[remove].price
        : "Кошик порожній",
      currency: arr.length ? "грн" : null
    });
    localStorage.setItem("cart", JSON.stringify(arr));
  }

  showCart() {
    this.setState({ showCart: !this.state.showCart });
  }

  chooseSize(e) {
    this.setState({
      size: e.target.value
    });
  }

  render() {
    return (
      <div>
        <div className="container cart-search">
          <div className="cart-with-drop">
            <div
              className={
                "cart-kicks " +
                (this.state.itemsCount ? "clickable" : "")
              }
            >
              <Cart
                name={this.state.cart}
                currency={this.state.currency}
                count={this.state.itemsCount}
                showCart={() => this.showCart()}
              />
            </div>
            {this.state.itemsCount ? (
              <div
                className={
                  "cart-drop " +
                  (this.state.showCart ? "show" : "")
                }
              >
                {this.state.itemsInCart.map((object, i) => {
                  return (
                    <ModalCart
                      obj={object}
                      key={i}
                      closeItem={() =>
                        this.closeItem(object.id)
                      }
                    />
                  );
                  <hr />;
                })}
                <a className="btn btn-primary" href="/cart">
                  Кошик
                </a>
              </div>
            ) : null}
          </div>
          <div className="search">
            <Search />
          </div>
        </div>
        <Categories />
        <ItemShow
          chooseSize={e => this.chooseSize(e)}
          toCart={() => this.addToCart(this.state.item)}
        />
      </div>
    );
  }
}

export default AppTwo;
