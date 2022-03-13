import React, {Component} from 'react';

class NewOrder extends Component {


    render() {
        return (
            <div>
                <div className="shadow-lg p-3 mb-5 bg-body rounded mt-2">
                    <div className="card">
                        <h5 className="card-header text-white" style={{backgroundColor: "#009FD4"}}>Onaylanacak
                            Siparişler</h5>
                        <div className="card-body">
                            <table className="table table-striped table-sm table-bordered">
                                <thead>
                                <th>#</th>
                                <th>Sipariş No</th>
                                <th>Resim</th>
                                <th>Ad</th>
                                <th>Adet</th>
                                <th></th>
                                </thead>
                                <tbody>
                                {
                                    this.props.orders.map(order =>
                                        <tr>
                                            <td>{order.id}</td>
                                            <td>{order.order_id}</td>
                                            <td><img src={"http://127.0.0.1:8000/storage/" + order.image} width={75}/>
                                            </td>
                                            <td>{order.name}</td>
                                            <td>{order.amount}</td>
                                            <td>
                                                <button className="btn btn-sm text-white"
                                                        style={{backgroundColor: "#009FD4"}}
                                                        onClick={() => this.props.getChangeStatus(order.id,2)}
                                                >
                                                    Onayla
                                                </button>
                                            </td>
                                        </tr>
                                    )
                                }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default NewOrder;
