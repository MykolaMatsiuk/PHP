import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class ModalCommercial extends Component {
    render() {
        return (
            <div className={this.props.classes}>
                <p>Купон на знижку 10% 
                    <span className="discount" onClick={this.props.sale}>
                        використати
                    </span>
                </p>               
            </div>
        );
    }
}

