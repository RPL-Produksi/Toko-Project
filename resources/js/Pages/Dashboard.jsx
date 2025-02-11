import { useEffect, useState } from "react";
import Navbar from "../Components/Navbar";
import { router } from "@inertiajs/react";

const DashboardPage = ({ produk }) => {
    const [search, setSearch] = useState("");
    const [kategori, setKategori] = useState("semua");
    const [isList, setIsList] = useState(false);

    useEffect(() => {
        // console.log(produk)
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

    const handleSearch = () => {
        router.get(
            "/kasir/dashboard",
            { search, kategori },
            { preserveState: true }
        );
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
                                            value={search}
                                            onChange={(e) =>
                                                setSearch(e.target.value)
                                            }
                                            placeholder="Cari barang"
                                        />
                                    </div>
                                    <button
                                        className="btn btn-primary mr-2"
                                        onClick={handleSearch}
                                    >
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
                                        {["Semua", "Makanan", "Minuman"].map(
                                            (cat) => (
                                                <button
                                                    key={cat}
                                                    className={`btn btn-sm mr-2 ${
                                                        kategori === cat
                                                            ? "btn-primary"
                                                            : "btn-secondary"
                                                    }`}
                                                    onClick={() =>
                                                        setKategori(cat)
                                                    }
                                                >
                                                    {cat}
                                                </button>
                                            )
                                        )}
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
                                                        {produk.map(
                                                            (
                                                                product,
                                                                index
                                                            ) => (
                                                                <tr
                                                                    key={
                                                                        product.id
                                                                    }
                                                                >
                                                                    <td>
                                                                        {index +
                                                                            1}
                                                                    </td>
                                                                    <td>
                                                                        {
                                                                            product.kode
                                                                        }
                                                                    </td>
                                                                    <td>
                                                                        {
                                                                            product.nama
                                                                        }
                                                                    </td>
                                                                    <td>
                                                                        Rp{" "}
                                                                        {
                                                                            product.harga
                                                                        }
                                                                    </td>
                                                                    <td>
                                                                        {
                                                                            product.stok
                                                                        }
                                                                    </td>
                                                                </tr>
                                                            )
                                                        )}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    ) : (
                                        <div className="col-3 mt-3">
                                            <div className="card border-0 shadow">
                                                <img
                                                    src="https://c.alfagift.id/product/1/1_A09430005096_20210705133027841_base.jpg"
                                                    alt=""
                                                    className=" rounded-top"
                                                    height="220"
                                                    style={{
                                                        objectFit: "cover",
                                                    }}
                                                />
                                                <span
                                                    className="badge text-white position-absolute top-0 end-0 m-2 rounded-3"
                                                    style={{
                                                        backgroundColor:
                                                            "#2E5077",
                                                    }}
                                                >
                                                    Makanan
                                                </span>
                                                <div className="card-body">
                                                    <h5 className="fw-bold text-center">
                                                        Indomie
                                                    </h5>
                                                    <small className="text-secondary d-block text-center">
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Officia tenetur hic
                                                        saepe tempora dicta
                                                        quibusdam excepturi, nam
                                                        vel voluptates provident
                                                        pariatur est ad sed, rem
                                                        dolore dolorum
                                                        voluptatum eaque enim.
                                                    </small>
                                                    <p
                                                        className="text-center mt-2 fw-bold"
                                                        style={{
                                                            color: "#2E5077",
                                                        }}
                                                    >
                                                        Rp 3.0000
                                                    </p>
                                                    <button
                                                        type="button"
                                                        className="btn w-100 text-white fw-bold mt-2 px-4 d-flex justify-content-center"
                                                        style={{
                                                            backgroundColor:
                                                                " #2E5077",
                                                        }}
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#purchaseModal"
                                                        data-id=""
                                                        data-nama=""
                                                        data-harga=""
                                                    >
                                                        Beli sekarang
                                                    </button>
                                                    <div className="mt-3 row">
                                                        <div className="col-6 d-flex align-items-center">
                                                            <small className="text-secondary">
                                                                <i className="fa-solid fa-box"></i>{" "}
                                                                Stok : 5
                                                            </small>
                                                        </div>
                                                        <div className="d-flex col-6 justify-content-end">
                                                            <a
                                                                href="#"
                                                                className="btn rounded-circle btn-custom-border btn-detail"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#productDetailModal"
                                                                data-nama=""
                                                                data-deskripsi=""
                                                                data-harga=""
                                                                data-stok=""
                                                                data-kategori=""
                                                                data-photo=""
                                                            >
                                                                <i className="fa-solid fa-ellipsis"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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

export default DashboardPage;
