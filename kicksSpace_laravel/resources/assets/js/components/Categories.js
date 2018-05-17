import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Categories extends Component {
  constructor(props) {
    super(props);
    this.state = {
      categories: ""
    };
  }

  componentWillMount() {
    axios
      .get("/api/getcategories")
      .then(res => {
        this.setState({
          categories: res.data
        });
      })
      .catch(error => {
        console.log(error);
      });
  }

  render() {
    return (
      <nav className="navbar navbar-expand-sm navbar-light cat-nav">
        <div className="container">
          <div>
            {this.state.categories.length ? (
              <ul className="navbar-nav mr-auto">
                {this.state.categories.map(
                  (category, i) => {
                    return (
                      <li className="nav-item" key={i}>
                        <a
                          className="nav-link"
                          href={`/categories/${
                            category.id
                          }`}
                        >
                          {category.name}
                        </a>
                      </li>
                    );
                  }
                )}
              </ul>
            ) : null}
          </div>
        </div>
      </nav>
    );
  }
}

if (document.getElementById("navbarText")) {
  ReactDOM.render(
    <Categories />,
    document.getElementById("navbarText")
  );
}
