import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Modal extends Component {
  constructor() {
    super();
    this.state = {
      show: false
    };
    if (!sessionStorage.getItem('show')) {
      setTimeout(() => {
        this.setState({
          show: true
        });
      }, 15000)
    }
  }

  componentDidMount() {
    setTimeout(() => {
      sessionStorage.setItem('show', 'show');
    }, 16000);
  }

  toggle(e) {
    this.setState({
      show: !this.state.show
    });
  }

  render() {
    if (!this.state.show) {
      return null;
    }

    return (
      <div className="mod">
        <div className="modal-content">
          <button type="button" className="close" onClick={(e) => this.toggle(e)}>&times;</button>
          <form>
            <div className="form-group row">
              <h2>Підпишись на розсилку!</h2>
            </div>
            <div className="form-group row">
              <label htmlFor="email" className="col-2 col-form-label">Email:</label>
              <div className="col-10">
                <input type="text" name="mail" id="email" className="form-control" />
              </div>
            </div>
            <button type="submit" className="btn btn-primary" onClick={(e) => this.toggle(e)}>Готово!</button>
          </form>
        </div>
      </div>
    );
  }
}

if (document.getElementById('modal')) {
  ReactDOM.render(<Modal />, document.getElementById('modal'));
}
