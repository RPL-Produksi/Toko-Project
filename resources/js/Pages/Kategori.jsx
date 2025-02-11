import Navbar from "../Components/Navbar";

const KategoriPage = () => {
    return (
        <>
            <Navbar title={"LumiStore"} />
            <div className="container">
                <div className="row">
                    <div className="col-12 mt-5">
                        <div className="card">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-12 col-md-6">
                                        <button className="btn btn-primary mb-3">
                                            <i className="fa-regular fa-plus"></i>
                                        </button>
                                    </div>
                                    <div className="col-12 col-md-6">
                                        <div className="d-flex">
                                            <input
                                                type="text"
                                                className="form-control mr-2"
                                                placeholder="Cari Kategori"
                                            />
                                            <button className="btn btn-primary">
                                                <i className="fa-regular fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table className="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Icon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Elektronik</td>
                                            <td>Barang elektronik</td>
                                            <td>icon</td>
                                            <td>
                                                <button className="btn btn-primary mr-2">
                                                    <i className="fa-regular fa-edit"></i>
                                                </button>
                                                <button className="btn btn-danger">
                                                    <i className="fa-regular fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div className="d-flex justify-content-end">
                                    <button className="btn btn-primary mr-2">
                                        <i className="fa-regular fa-arrow-left"></i>
                                    </button>
                                    <button className="btn btn-primary">
                                        <i className="fa-regular fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default KategoriPage;
