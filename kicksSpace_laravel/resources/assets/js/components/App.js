import React, { Component } from "react";
// import Pagination from "react-js-pagination";
import Search from "./Search";
import Cart from "./Cart";
import Categories from "./Categories";
import Item from "./Item";
import ModalCart from "./ModalCart";

class App extends Component {
  constructor() {
    super();
    this.state = {
      // activePage: 1,
      items: null,
      itemsInCart: [],
      cart: "Кошик порожній",
      currency: null,
      itemsCount: null,
      chooseSize: null,
      showCart: false,
      catName: null
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

    if (typeof window.searchItems != "undefined") {
      this.setState({
        items: searchItems
      });
      return;
    }

    if (typeof window.itemsCat != "undefined") {
      this.setState({
        items: itemsCat,
        catName: window.name
      });
      return;
    }

    axios
      .get("/api/getitems")
      .then(res => {
        this.setState({
          items: res.data
        });
      })
      .catch(error => {
        console.log(error);
      });
  }

  handlePageChange(pageNumber) {
    this.setState({ activePage: pageNumber });
  }

  addToCart(size, item) {
    if (size != null) {
      item.chosenSize = size;
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
        chooseSize: null
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

  getSize(size) {
    this.setState({ size: size });
    console.log(this.state.size);
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
        {this.state.catName ? (
          <div className="container cat-title">
            {this.state.catName}
          </div>
        ) : null}
        <div className="container">
          {this.state.items instanceof Array ? (
            <div className="row">
              {this.state.items.map(object => {
                return (
                  <Item
                    obj={object}
                    addToCart={size =>
                      this.addToCart(size, object)
                    }
                    getSize={this.getSize.bind(this)}
                    chooseSize={this.state.chooseSize}
                    key={object.id}
                  />
                );
              })}
              {/*<Pagination
                activePage={this.state.activePage}
                itemsCountPerPage={2}
                totalItemsCount={this.state.items.length}
                pageRangeDisplayed={5}
                onChange={() => this.handlePageChange()}
              />*/}
            </div>
          ) : null}
        </div>
      </div>
    );
  }
}

export default App;
