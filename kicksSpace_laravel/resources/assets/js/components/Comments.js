import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

class Comments extends Component {
  constructor(props) {
    super(props);
    this.state = {
      comments: [],
      data: null,
      user: null,
      body: ""
    };
  }

  componentDidMount() {
    this.getComments();
  }

  componentWillMount() {
    this.setState({
      user: window.user
    });
  }

  storeComments(e, id) {
    e.preventDefault();
    axios
      .post("/api/savecomments", {
        id: id,
        body: this.state.body
      })
      .then()
      .catch(error => {
        console.log(error);
      });
    this.getComments();
  }

  getComments() {
    let itemId = window.item.id;
    axios
      .get("/api/getcomments", {
        params: { item_id: itemId }
      })
      .then(res => {
        this.setState({
          comments: res.data
        });
      })
      .catch(error => {
        console.log(error);
      });
  }

  voteUp(id) {
    axios
      .post("/api/upvote", { id: id })
      .then(res => {
        this.setState({ data: res.data });
      })
      .catch(error => console.log(error));
    this.getComments();
  }

  voteDown(id) {
    axios
      .post("/api/downvote", { id: id })
      .then(res => {
        this.setState({ data: res.data });
      })
      .catch(error => console.log(error));
    this.getComments();
  }

  handleChange(e) {
    this.setState({ body: e.target.value });
  }

  render() {
    return (
      <div>
        {this.state.comments.length ? (
          <ul className="list-group">
            {this.state.comments.map((comment, i) => {
              return (
                <li className="list-group-item" key={i}>
                  <i>{comment.created_at}: &nbsp;</i>
                  {comment.body} /
                  <i>{comment.user.email} &nbsp;</i>
                  <strong>{comment.user.name}</strong>
                  <br />
                  <form>
                    <span className="vote-up-count">
                      {comment.votes_up}
                    </span>&nbsp;
                    <i
                      className="fas fa-thumbs-up"
                      title={this.state.data}
                      onClick={() =>
                        this.voteUp(comment.id)
                      }
                    />&nbsp;&nbsp;
                    <i
                      className="fas fa-thumbs-down"
                      title={this.state.data}
                      onClick={() =>
                        this.voteDown(comment.id)
                      }
                    />&nbsp;
                    <span className="vote-down-count">
                      {comment.votes_down}
                    </span>
                  </form>
                </li>
              );
            })}
          </ul>
        ) : null}
        <div>
          {this.state.user ? (
            <div className="card">
              <div className="card-body">
                <form>
                  <div className="form-group">
                    <textarea
                      name="body"
                      placeholder="Залиш коментар"
                      className="form-control"
                      onChange={e => this.handleChange(e)}
                      required
                    />
                  </div>
                  <div className="form-group">
                    <button
                      type="submit"
                      className="btn btn-primary"
                      onClick={e =>
                        this.storeComments(e, item.id)
                      }
                    >
                      Залишити коментар
                    </button>
                  </div>
                </form>
              </div>
            </div>
          ) : null}
        </div>
      </div>
    );
  }
}

export default Comments;
