import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Search extends Component {
  constructor() {
    super();
    this.state = {
      tags: [],
      items: []
    };
  }

  componentWillMount() {
    axios.get('/api/gettags').then(response => {
      this.setState({
        tags: response.data,
      });
    }).catch(error => {
      console.log(error);
    })
  }

  onChange(e) {
    if (e.target.value == '') {
      this.setState({
        items: []
      })
      return;
    };
    let items = this.state.tags.filter((tag) => {
      return tag.title.toLowerCase().search(
        e.target.value.toLowerCase()) !== -1;
    });
    this.setState({
      items: items
    });
  }

  render() {
    const { items } = this.state;
    return items.length ? (
      <form className="form-inline">
          <input className="form-control mr-sm-2" onChange={(e) => this.onChange(e)} placeholder="Search" />
            <ul className="search-list">
              {items.map((item, i) => {
                return (
                  <li className="search-item" key={i}><a href={`/1/1/${item.id}`}>{item.title}</a></li>
                );
              })}
            </ul>
      </form>
    ) : (
      <form className="form-inline">
          <input className="form-control mr-sm-2" onChange={(e) => this.onChange(e)} placeholder="Search" />
      </form>
    );
  }
};

export default Search;

if (document.getElementById('search')) {
    ReactDOM.render(<Search />, document.getElementById('search'));
}
