import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ModalCommercial from './ModalCommercial';

export default class Commercial extends Component {
    constructor() {
      super();
      this.state = {
        commercials: [],
        open: false,
        discount: false
      };
    }

    componentWillMount() {
      axios.get('/api/getcommercial').then(response => {
        this.setState({
          commercials: response.data,
        });
      }).catch(error => {
        console.log(error);
      });
    }

    modalShow(e) {
        this.setState({
            open: !this.state.open
        });
    }

    sale(e) {
        this.setState({
            discount: true
        });
        this.forceUpdate();
    }

    render() {
        const comm = this.state.commercials;
        const classes = this.state.open ? 'mod-comm' : 'mod-comm hide';
        return (
            <div className="commercial" onMouseOver={(e) => this.modalShow(e)} 
                onMouseOut={(e) => this.modalShow(e)}>
                {comm.map((item, i) => {
                    const price = this.state.discount ?
                        parseFloat(Math.round((item.price-(item.price*0.1))*100)/100).toFixed(2) : item.price
                    return (
                        <div className="comm-item" key={i}>
                            <div className="comm-title">{item.title}</div>
                            <div className="comm-company">{item.company}</div>
                            <div className="comm-price">${price}</div>
                        </div>
                    )})
                }
                <ModalCommercial classes={classes} sale={(e) => this.sale(e)} />
            </div>
        );
    }
}

if (document.getElementById('commercial')) {
    ReactDOM.render(<Commercial />, document.getElementById('commercial'));
}
