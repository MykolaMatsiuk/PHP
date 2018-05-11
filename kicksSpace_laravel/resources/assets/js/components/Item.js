import React, { Component } from "react";
import ReactDOM from "react-dom";

class Item extends Component {
  constructor(props) {
    super(props);
    this.state = {
      active: null
    };
  }

  chooseSize(size) {
    this.setState({
      active: this.state.active === size ? null : size
    });
  }

  render() {
    return (
      <div className="col-lg-3 col-md-4 col-sm-6 portfolio-item">
        <div className="item-content">
          <div className="card h-100">
            <a href={`/items/${this.props.obj.id}`}>
              <img
                className="card-img-top"
                src={this.props.obj.images[0].src}
                alt={this.props.obj.name}
                height="200"
                // width="200"
              />
            </a>
            <div className="card-body">
              <h4 className="card-title">
                <a href={`/items/${this.props.obj.id}`}>
                  {this.props.obj.name}
                </a>
              </h4>
              <h5>{this.props.obj.model}</h5>
              <p>{this.props.obj.price} грн</p>
            </div>
          </div>
          <div className="hide">
            <div className="sizes">
              <span className="title">
                Доступні розміри:{" "}
              </span>
              {/* <span className="size-type"><a>US</a></span> */}
              {/* <span className="size-type"><a>UK</a></span> */}
              <span className="size-type active">
                <a>EU</a>
              </span>
              {/* <span className="size-type"><a>CM</a></span> */}
              <div>
                <ul>
                  {this.props.obj.sizes.map(size => (
                    <li
                      key={size.id}
                      className={
                        this.state.active === size.size &&
                        "active"
                      }
                      onClick={() =>
                        this.chooseSize(size.size)
                      }
                    >
                      {size.size}
                    </li>
                  ))}
                </ul>
                <div>{this.props.chooseSize}</div>
              </div>
            </div>
            <button
              className="btn sub"
              onClick={() =>
                this.props.addToCart(this.state.active)
              }
            >
              До кошику
            </button>
            <a
              className="btn sub"
              href={`/items/${this.props.obj.id}`}
            >
              Деталі
            </a>
          </div>
        </div>
      </div>
    );
  }
}

export default Item;
