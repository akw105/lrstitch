import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Threads extends Component {
    constructor(props){
        super(props);
        console.log('threads from component', JSON.parse(this.props.threads));
        threads = JSON.parse(this.props.threads);
    }
    render(){
        return (
            <div>
                {threads.map(function(index, brand, id, name, number){
                    return <li key={ index }>Name is {name}</li>;
                  })}
                {/* <p>Hey</p> */}

            </div>
        );
    }
}


if (document.getElementById('thread-listing')) {
    var threads = document.getElementById('thread-listing').getAttribute('data-threads');
    ReactDOM.render(<Threads threads={threads}/>, document.getElementById('thread-listing'));
}
