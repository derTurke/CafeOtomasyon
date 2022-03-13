import React, {Component} from "react";
import ReactDOM from 'react-dom';
import NewOrder from "./components/NewOrder";
import PrepareOrder from "./components/PrepareOrder";
class Index extends Component{
    state = {
        orders: [],
        prepareOrders: [],
        result: ""
    }

    componentDidMount() {
        this.getNewOrders()
        this.getPrepareOrders()
    }

    getNewOrders = () => {
        fetch('http://127.0.0.1:8000/api/chefNewOrder')
            .then(response => response.json())
            .then(data => this.setState({orders: data}))
    }
    getPrepareOrders = () => {
        fetch('http://127.0.0.1:8000/api/chefPrepareOrder')
            .then(response => response.json())
            .then(data => this.setState({prepareOrders: data}))
    }
    getChangeStatus = (order_id,status) => {
        fetch(`http://127.0.0.1:8000/api/updateNewOrder?order_id=${order_id}&status=${status}`)
            .then(response => response.json())
            .then(data => this.setState({result: data}))
        this.getNewOrders();
        this.getPrepareOrders();
    }
    render(){
        return (
            <div>
                <div className="row">
                    <div className="col-md-6">
                        <NewOrder orders={this.state.orders} getChangeStatus={this.getChangeStatus}/>
                    </div>
                    <div className="col-md-6">
                        <PrepareOrder prepareOrders={this.state.prepareOrders} getChangeStatus={this.getChangeStatus}/>
                    </div>
                </div>
            </div>
        )
    }
}
ReactDOM.render(<Index/>,document.getElementById('index'));
