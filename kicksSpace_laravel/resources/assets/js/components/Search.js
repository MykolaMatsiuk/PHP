import React, { Component } from "react";
import SearchImg from "../search.png";

class Search extends Component {
  constructor() {
    super();
    this.state = {
      results: []
    };
  }

  getAutocomplete(e) {
    axios
      .get("/api/getautocomplete", {
        params: { input: e.target.value }
      })
      .then(res => this.setState({ results: res.data }))
      .catch(error => console.log(error));
    console.log(e.target.value);
    console.log(this.state.results);
  }

  render() {
    return (
      <form action="/search" method="get">
        <input
          type="text"
          name="search"
          id="search"
          placeholder="Пошук"
          className="input"
          autoComplete="off"
          onChange={e => this.getAutocomplete(e)}
        />
        <button type="submit" className="sbtn btn-search">
          <img src={SearchImg} alt="search_img" />
        </button>
      </form>
    );
  }
}

export default Search;
