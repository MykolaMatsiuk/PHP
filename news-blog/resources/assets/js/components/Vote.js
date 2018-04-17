import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Vote extends Component {
  constructor() {
    super();
    this.state = {
      upVotes: null,
      downVotes: null
    }
  }

  getVotes(e) {
    axios.get('/api/getvotes', { params: { newsId: window.news_id } }).then(response => {
      this.setState({
        upVotes: response.data,
        downVotes: response.data
      });
      console.log(response.data);
    }).catch(error => {
      console.log(error);
    })
  }

  downVote(e) {
    console.log('down');
  }

  render() {
    return (
      <div>
        <h2>{ window.news_id }</h2>
        <span></span>
        <span className="btn" onClick={(e) => this.getVotes(e)}><img src="/images/up.png" alt="up" /></span>
        <span className="btn" onClick={(e) => this.downVote(e)}><img src="/images/down.png" alt="down" /></span>
      </div>
    );
  }
} 

export default Vote;

if (document.querySelector('.comm')) {
  ReactDOM.render(<Vote />, document.querySelector('.comm'));
}
