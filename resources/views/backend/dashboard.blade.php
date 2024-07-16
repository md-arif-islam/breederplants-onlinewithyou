<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link href="{{asset('assets/backend/css/main.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.html" class="brand-wrap">
                <img src="{{asset('assets/backend/imgs/theme/logo.png')}}" class="logo" alt="Evara Dashboard">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="dashboard.html"> <span class="menu-icon">
                            <img src="{{asset('assets/backend/imgs/theme/home.svg')}}" style="filter: brightness(0.3);" alt="">
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="dashboard.html"> <span class="menu-icon">
                            <img src="{{asset('assets/backend/imgs/theme/File_Document.svg')}}" style="filter: brightness(0.3);" alt="">
                        </span>
                        <span class="text">Variety Reports</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="dashboard.html"> <span class="menu-icon">
                            <img src="{{asset('assets/backend/imgs/theme/Growers.svg')}}" style="filter: brightness(0.3);" alt="">
                        </span>
                        <span class="text">Growers</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="dashboard.html"> <span class="menu-icon">
                            <img src="{{asset('assets/backend/imgs/theme/Breeders.svg')}}" style="filter: brightness(0.3);" alt="">
                        </span>
                        <span class="text">Breeders</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="dashboard.html"> <span class="menu-icon">
                            <img src="{{asset('assets/backend/imgs/theme/Settings.svg')}}" style="filter: brightness(0.3);" alt="">
                        </span>
                        <span class="text">Settings</span>
                    </a>
                </li>
            </ul>

        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">

            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i
                        class="material-icons md-apps"></i> </button>
                <ul class="nav">

                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount"
                            aria-expanded="false"> <img class="img-xs rounded-circle" src="{{asset('assets/backend/imgs/people/user.png')}}"
                                alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account
                                Settings</a>
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help
                                center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i
                                    class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Growers</h2>

                </div>
                <div>
                    <a href="#" class="btn btn-primary btn-sm rounded">Create new</a>
                </div>
            </div>
            <header class="card card-body mb-4">
                <div class="row gx-3">
                    <div class="col-lg-4 col-md-6 me-auto">
                        <input type="text" placeholder="Search..." class="form-control">
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>All category</option>
                            <option>Electronics</option>
                            <option>Clothings</option>
                            <option>Something else</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Latest added</option>
                            <option>Cheap first</option>
                            <option>Most viewed</option>
                        </select>
                    </div>
                </div>
            </header> <!-- card-header end// -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('assets/backend/imgs/products/product_image.png') }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="btn btn-sm btn-brand rounded">
                                    <i class="material-icons md-edit mr-5"></i>Edit
                                </a> -->
                            </div>
                            <a href="#" class="title">Hydrangea</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>12</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>Boot & Co</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>Newey</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>Chichester, UK</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>20 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>28 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>250</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>20</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>28 Oct 2024</span>
                            </div>

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('assets/backend/imgs/products/product_image.png') }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="btn btn-sm btn-brand rounded">
                                    <i class="material-icons md-edit mr-5"></i>Edit
                                </a> -->
                            </div>
                            <a href="#" class="title">Hydrangea</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>12</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>Boot & Co</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>Newey</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>Chichester, UK</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>20 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>28 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>250</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>20</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>28 Oct 2024</span>
                            </div>

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('assets/backend/imgs/products/product_image.png') }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="btn btn-sm btn-brand rounded">
                                    <i class="material-icons md-edit mr-5"></i>Edit
                                </a> -->
                            </div>
                            <a href="#" class="title">Hydrangea</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>12</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>Boot & Co</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>Newey</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>Chichester, UK</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>20 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>28 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>250</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>20</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>28 Oct 2024</span>
                            </div>

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('assets/backend/imgs/products/product_image.png') }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="btn btn-sm btn-brand rounded">
                                    <i class="material-icons md-edit mr-5"></i>Edit
                                </a> -->
                            </div>
                            <a href="#" class="title">Hydrangea</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>12</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>Boot & Co</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>Newey</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>Chichester, UK</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>20 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>28 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>250</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>20</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>28 Oct 2024</span>
                            </div>

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('assets/backend/imgs/products/product_image.png') }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="btn btn-sm btn-brand rounded">
                                    <i class="material-icons md-edit mr-5"></i>Edit
                                </a> -->
                            </div>
                            <a href="#" class="title">Hydrangea</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>12</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>Boot & Co</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>Newey</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>Chichester, UK</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>20 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>28 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>250</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>20</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>28 Oct 2024</span>
                            </div>

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('assets/backend/imgs/products/product_image.png') }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="btn btn-sm btn-brand rounded">
                                    <i class="material-icons md-edit mr-5"></i>Edit
                                </a> -->
                            </div>
                            <a href="#" class="title">Hydrangea</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>12</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>Boot & Co</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>Newey</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>Chichester, UK</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>20 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>28 March 2024</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>250</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>20</span>
                            </div>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>28 Oct 2024</span>
                            </div>

                        </div>
                    </div> <!-- card-product  end// -->
                </div> <!-- col.// -->


            </div> <!-- row.// -->
            <div class="pagination-area mt-15 mb-50 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">16</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="material-icons md-chevron_right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </section> <!-- content-main end// -->
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> ©, Breederplants
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        All rights reserved
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="{{asset('assets/backend/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendors/perfect-scrollbar.js')}}"></script>
    <!-- Main Script -->
    <script src="{{asset('assets/backend/assets/js/main.js')}}" type="text/javascript"></script>
</body>

</html>
