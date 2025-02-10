import { useEffect, useState } from "react";
import Navbar from "../Components/Navbar";

const Dashboard = () => {
    const [isList, setIsList] = useState(false);

    useEffect(() => {
        const isList = localStorage.getItem("isList");
        if (isList === "list") {
            setIsList(true);
        } else {
            setIsList(false);
        }
    }, []);

    const handleBtnList = () => {
        const newIsList = !isList;
        setIsList(newIsList);
        localStorage.setItem("isList", newIsList ? "list" : "gambar");
    };

    return (
        <>
            <Navbar title={"LumiStore"} />
            <div className="container-fluid mt-4">
                <div className="row">
                    <div className="col-md-8 col-12 mt-2">
                        <div className="card">
                            <div className="card-header">
                                <div className="row">
                                    <div className="col">
                                        <input
                                            type="text"
                                            name=""
                                            id=""
                                            className="form-control"
                                            placeholder="Cari barang"
                                        />
                                    </div>
                                    <button className="btn btn-primary mr-2">
                                        <i className="fa-regular fa-search"></i>
                                    </button>
                                    <button
                                        className="btn btn-primary mr-2"
                                        onClick={handleBtnList}
                                    >
                                        {isList ? (
                                            <i className="fa-regular fa-list"></i>
                                        ) : (
                                            <i className="fa-regular fa-image"></i>
                                        )}
                                    </button>
                                </div>
                            </div>
                            <div className="card-body">
                                <div className="row">
                                    <div
                                        className="col-12"
                                        style={{
                                            overflowX: "auto",
                                            whiteSpace: "nowrap",
                                        }}
                                    >
                                        <button className="btn btn-primary btn-sm mr-2">
                                            Semua
                                        </button>
                                        <button className="btn btn-primary btn-sm mr-2">
                                            Makanan
                                        </button>
                                        <button className="btn btn-primary btn-sm mr-2">
                                            Minuman
                                        </button>
                                    </div>
                                </div>
                                <div className="row">
                                    {isList ? (
                                        <div className="col-12 mt-3">
                                            <div className="table-responsive">
                                                <table className="table table-bordered w-full">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Harga</th>
                                                            <th>Stok</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>001</td>
                                                            <td>Indomie</td>
                                                            <td>Rp. 3.000</td>
                                                            <td>10</td>
                                                            <td>
                                                                <button className="btn btn-primary btn-sm mr-2">
                                                                    <i className="fa-regular fa-plus"></i>
                                                                </button>
                                                                <button className="btn btn-secondary btn-sm">
                                                                    <i className="fa-regular fa-circle-info"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    ) : (
                                        <div className="col-3 mt-3">
                                            <div className="card">
                                                <div className="card-header">
                                                    <img
                                                        src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//87/MTA-2583230/indomie_indomie-goreng-rendang-mie-instan--91-g_full02.jpg"
                                                        alt=""
                                                        className="card-img-top"
                                                    />
                                                </div>
                                                <div className="card-body">
                                                    <h5 className="card-title">
                                                        Indomie
                                                    </h5>
                                                    <p className="card-text">
                                                        Rp. 3.000
                                                    </p>
                                                </div>
                                                <div className="card-footer d-flex justify-content-end bg-primary">
                                                    <button className="btn btn-success btn-sm mr-2">
                                                        <i className="fa-regular fa-plus"></i>
                                                    </button>
                                                    <button className="btn btn-secondary btn-sm">
                                                        <i className="fa-regular fa-circle-info"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4 col-12 mt-2">
                        <div className="card">
                            <div className="card-header">Pemberitahuan</div>
                            <div className="card-body">
                                <h5 className="card-title">Pemberitahuan</h5>
                                <p className="card-text">
                                    Belum ada pemberitahuan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Dashboard;
