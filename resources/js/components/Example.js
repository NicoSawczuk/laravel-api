import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import TransferForm from './TransferForm'
import TransferList from './TransferList'
import Navbar from './Navbar'

export default class Example extends Component {

    constructor(props) {
        super (props)

        this.state = {
            money: 0.0,
            transfers: [],
            error: null,
            form: {
                description: '',
                amount: '',
                wallet_id: 1
            }
        }


        this.handleChange = this.handleChange.bind(this)
        this.handleSubmit = this.handleSubmit.bind(this)
    }

    //Va a esperar por los eventos en los inputs
    handleChange(e){
        
        //Vamos a cambiar el estado de form mientras cambie el atributo name del componente TransferForm
        this.setState({
            //con ...this.state.form, le decimos que mantenga lo que yay existe, para que no sobrescriba los inouts
            form:{
                ...this.state.form,
                [e.target.name]: e.target.value,
            }
        })
    }

    async handleSubmit(e) {
        //Primero anulamos es refresco de la pagina
        e.preventDefault()

        try {
            //Para enviar info debemos crear un objeto de configuracion
            let config = {
                method: 'POST',
                headers: {
                    'Accept': 'aplication/json',
                    'Content-Type': 'aplication/json'
                },
                body: JSON.stringify(this.state.form)
            }

            //Realizamos la peticion
            let res = await fetch('http://127.0.0.1:8000/api/transfer', config)
            let data = await res.json()


            //Si todo sale bien, vamos a tener la data, entocnes actualizamos el estado
            this.setState({
                transfers: this.state.transfers.concat(data),
                money: this.state.money + (parseInt(data.amount))
            })
            
        } catch (error) {
            this.setState({
                error
            })
        }

    }

    async componentDidMount() {
        //se define como asincronico porque primero pide una request y luego actua
        //Como hacemos request, debemos usar try y catch
        try {
            let res = await fetch('http://127.0.0.1:8000/api/wallet')
            let data = await res.json()

            this.setState({
                money: data.money, 
                transfers: data.transfers
            })
        } catch (error) {
            this.setState({
                error
            })
        }
    }


    render() {
        return (
            
            <div className="container">
            <div className="row text-center">
                <div className="col-md-12 m-t-md">
                    <p className="title">
                        $ {this.state.money}
                    </p>
                </div>
                <div className="col-md-12">
                    <TransferForm 
                        form={this.state.form}
                        onChange={this.handleChange}
                        onSubmit={this.handleSubmit}
                    />
                </div>
            </div>
            <div className="m-t-md text-center">
                <TransferList 
                    transfers={this.state.transfers}
                />
            </div>
        </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}


