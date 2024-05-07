<!-- LOGO -->
<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ asset('admin_assets/assets/images/Vector.svg') }}" alt="" height="35">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('admin_assets/assets/images/Vector.svg') }}" alt="" height="35">
        </span>
    </a>
    <!-- Light Logo-->
    <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('admin_assets/assets/images/Vector.svg') }}" alt="" height="35">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('admin_assets/assets/images/Vector.svg') }}" alt="" height="35">
        </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
    </button>
</div>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                    <i class="ri-home-4-line"></i> <span data-key="t-widgets">Dashboards</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('etalase') }}">
                    <i class="ri-store-2-line"></i> <span data-key="t-widgets">Etalase</span>
                </a>
            </li>
            <!-- end Dashboard Menu -->

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Transaksi</span>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('penjualan') }}">
                    <i class="las la-money-bill-wave"></i> <span data-key="t-widgets">Penjualan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('retur') }}">
                    <i class="ri-exchange-dollar-line"></i> <span data-key="t-widgets">Retur Penjualan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('piutang') }}">
                    <i class="las la-hand-holding-usd"></i> <span data-key="t-widgets">Piutang</span>
                </a>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Master Produk</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarUI">
                    <i class="ri-dropbox-fill"></i> <span data-key="t-base-ui">Produk</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('kategoriproduk') }}" class="nav-link"
                                        data-key="t-alerts">Kategori Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-badges.html" class="nav-link" data-key="t-badges">Data Produk</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-stock-line"></i> <span data-key="t-widgets">Stock Barang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">Data Stok Limit</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-price-tag-3-line"></i> <span data-key="t-widgets">Level Harga</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="bx bxs-discount"></i> <span data-key="t-widgets">Diskon</span>
                </a>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Master Pelanggan</span>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarForms">
                    <i class="ri-team-line"></i> <span data-key="t-forms">Pelanggan</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarForms">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="forms-elements.html" class="nav-link" data-key="t-basic-elements">Data
                                Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-select.html" class="nav-link" data-key="t-form-select">
                                Rekap Pelanggan </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-contacts-line"></i> <span data-key="t-widgets">Supplier</span>
                </a>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Master Operator</span>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('operator') }}">
                    <i class="las la-users-cog"></i> <span data-key="t-widgets">Operator</span>
                </a>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Keuangan</span>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-history-line"></i> <span data-key="t-widgets">Arus Uang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-todo-line"></i> <span data-key="t-widgets">Laporan</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
