import React, { Component } from "react";
import Comments from "./Comments";

class ItemShow extends Component {
  constructor() {
    super();
    this.state = {
      item: null,
      // user: null,
      chosenSize: null
    };
  }

  componentWillMount() {
    this.setState({
      item: window.item
      // user: window.user
    });
  }

  render() {
    let { item } = this.state;
    return (
      <div className="container">
        <div className="prod-show row">
          <div className="col-md-6">
            <div className="owl-carousel owl-theme">
              {item.images.map((image, i) => {
                return (
                  <div key={i}>
                    <img
                      src={`/../${image.src}`}
                      alt={image.name}
                    />
                  </div>
                );
              })}
            </div>
          </div>
          <div className="col-md-6">
            <div className="name-price">
              <h2 className="name-model">
                {item.name} {item.model}
              </h2>
              <h3>{item.price} грн</h3>
            </div>
            <p className="item-desc">{item.description}</p>
            <hr />
            <div className="form-group">
              <label htmlFor="size" className="choose-size">
                Вибери розмір:{" "}
              </label>
              <select
                name="size"
                id="size"
                className="form-control"
                onChange={this.props.chooseSize}
              >
                <option value="">Розмір не вибрано</option>
                {item.sizes.map((size, i) => {
                  return (
                    <option value={size.size} key={i}>
                      {size.size}
                    </option>
                  );
                })}
              </select>
            </div>
            <div className="form-group">
              <button
                onClick={this.props.toCart}
                className="btn btn-primary sub"
              >
                До кошику
              </button>
            </div>
            <hr />
            <Comments />
          </div>
        </div>
      </div>
    );
  }
}

export default ItemShow;
