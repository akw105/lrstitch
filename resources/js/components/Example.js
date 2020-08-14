import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(props){
        super(props);
        console.log('data from component', JSON.parse(this.props.user_data));
        user_data = JSON.parse(this.props.user_data);
    }
    render(){
        return (
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">Hello { user_data['name']}</div>
                            <ul>
                                <li><a href="/threads">Threads</a></li>
                            </ul>

                        </div>

        );
    }
}


if (document.getElementById('sidebar')) {
    var user_data = document.getElementById('sidebar').getAttribute('data-user');
    ReactDOM.render(<Example user_data={user_data}/>, document.getElementById('sidebar'));
}
