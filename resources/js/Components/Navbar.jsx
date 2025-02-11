import { Link } from "@inertiajs/react";
import LinkKasir from "../Utils/LinkKasir";

const Navbar = ({ title }) => {
    return (
        <>
            <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
                <div className="container-fluid">
                    <a className="navbar-brand" href="#">
                        {title}
                    </a>
                    <button
                        className="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav mr-auto">
                            {LinkKasir &&
                                LinkKasir.map((link, i) => (
                                    <li
                                        className={`nav-item`} 
                                        style={{ textDecoration: "none" }}
                                        key={i}
                                    >
                                        <Link
                                            className="nav-link"
                                            href={link.link}
                                        >
                                            {link.name}
                                        </Link>
                                    </li>
                                ))}
                        </ul>
                        <ul className="navbar-nav ml-auto">
                            <li className="nav-item dropdown">
                                <button
                                    className="nav-link dropdown-toggle btn"
                                    href="#"
                                    id="userDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <span className="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                    <img
                                        src="https://evoting.smkn2smi.sch.id/assets/img/avatar-1.png"
                                        className="img-fluid d-md-inline-block d-none rounded-circle"
                                        width={40}
                                        height={40}
                                    ></img>
                                    <span className="d-md-none">Kasir</span>
                                </button>
                                <div
                                    className="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown"
                                >
                                    <Link className="dropdown-item" href="">
                                        <i className="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </Link>
                                    <div className="dropdown-divider"></div>
                                    <button
                                        className="dropdown-item"
                                        data-toggle="modal"
                                        data-target="#logoutModal"
                                    >
                                        <i className="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div
                className="modal fade"
                id="logoutModal"
                tabIndex="-1"
                role="dialog"
                aria-labelledby="logoutModalLabel"
                aria-hidden="true"
            >
                <div
                    className="modal-dialog modal-dialog-centered"
                    role="document"
                >
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="logoutModalLabel">
                                Yakin Ingin Keluar?
                            </h5>
                            <button
                                className="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            Pilih "Keluar" di bawah jika Anda siap mengakhiri
                            sesi Anda saat ini.
                        </div>
                        <div className="modal-footer">
                            <button
                                className="btn btn-link"
                                type="button"
                                data-dismiss="modal"
                            >
                                Batal
                            </button>
                            <form
                                action=""
                                method="POST"
                                className="form-with-loading"
                            >
                                <button
                                    type="submit"
                                    className="btn btn-danger btn-loading"
                                >
                                    <span className="btn-text">Keluar</span>
                                    <span
                                        className="spinner-border spinner-border-sm d-none"
                                        role="status"
                                    ></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Navbar;
