import React from 'react'

const TransferForm = ({ form, onChange, onSubmit }) => (
    <form className="form-inline justify-content-center" onSubmit={onSubmit}>
        <div className="form-goup mb-2">
            <input
                type="text"
                className="form-control ml-1"
                placeholder="Descripcion"
                name="description"
                value={form.description}
                onChange={onChange}
            />
        </div>
        <div className="input-group ms-sm-2 mb-2 ml-1">
            <div className="input-group-prepend">
                <div className="input-group-text">$</div>
            </div>
            <input
                type="number"
                className="form-control"
                name="amount"
                value={form.amount}
                onChange={onChange}
            />
        </div>
        <button
            type="submit"
            className="btn btn-primary mb-2 ml-1"
        >
            Registrar
        </button>

    </form>
)

export default TransferForm