import React, { Component } from "react";
import SearchImg from "../search.png";

class Search extends Component {
  render() {
    return (
      <form action="/search" method="get">
        <input
          type="text"
          name="search"
          placeholder="Пошук"
          className="input"
        />
        <button type="submit" className="sbtn btn-search">
          <img src={SearchImg} alt="search_img" />
        </button>
      </form>
    );
  }
}

export default Search;
