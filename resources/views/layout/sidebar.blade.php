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
                <a class="nav-link menu-link" href="{{ route('etalase') }}">
                    <i class="ri-exchange-dollar-line"></i> <span data-key="t-widgets">Retur Penjualan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('etalase') }}">
                    <i class="las la-hand-holding-usd"></i> <span data-key="t-widgets">Piutang</span>
                </a>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarUI">
                    <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Base UI</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ui-alerts.html" class="nav-link" data-key="t-alerts">Alerts</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-badges.html" class="nav-link" data-key="t-badges">Badges</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-buttons.html" class="nav-link" data-key="t-buttons">Buttons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-colors.html" class="nav-link" data-key="t-colors">Colors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-cards.html" class="nav-link" data-key="t-cards">Cards</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-carousel.html" class="nav-link" data-key="t-carousel">Carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-dropdowns.html" class="nav-link" data-key="t-dropdowns">Dropdowns</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-grid.html" class="nav-link" data-key="t-grid">Grid</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ui-images.html" class="nav-link" data-key="t-images">Images</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-tabs.html" class="nav-link" data-key="t-tabs">Tabs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-accordions.html" class="nav-link"
                                        data-key="t-accordion-collapse">Accordion & Collapse</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-modals.html" class="nav-link" data-key="t-modals">Modals</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-offcanvas.html" class="nav-link" data-key="t-offcanvas">Offcanvas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-placeholders.html" class="nav-link"
                                        data-key="t-placeholders">Placeholders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-progress.html" class="nav-link" data-key="t-progress">Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-notifications.html" class="nav-link"
                                        data-key="t-notifications">Notifications</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ui-media.html" class="nav-link" data-key="t-media-object">Media
                                        object</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-embed-video.html" class="nav-link" data-key="t-embed-video">Embed
                                        Video</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-typography.html" class="nav-link"
                                        data-key="t-typography">Typography</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-lists.html" class="nav-link" data-key="t-lists">Lists</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-general.html" class="nav-link" data-key="t-general">General</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-ribbons.html" class="nav-link" data-key="t-ribbons">Ribbons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-utilities.html" class="nav-link" data-key="t-utilities">Utilities</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAdvanceUI">
                    <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Advance UI</span>

                </a>
                <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="advance-ui-sweetalerts.html" class="nav-link" data-key="t-sweet-alerts">Sweet
                                Alerts</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-nestable.html" class="nav-link" data-key="t-nestable-list">Nestable
                                List</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-scrollbar.html" class="nav-link" data-key="t-scrollbar">Scrollbar</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-animation.html" class="nav-link" data-key="t-animation">Animation</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-tour.html" class="nav-link" data-key="t-tour">Tour</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-swiper.html" class="nav-link" data-key="t-swiper-slider">Swiper
                                Slider</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-ratings.html" class="nav-link" data-key="t-ratings">Ratings</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-highlight.html" class="nav-link" data-key="t-highlight">Highlight</a>
                        </li>
                        <li class="nav-item">
                            <a href="advance-ui-scrollspy.html" class="nav-link" data-key="t-scrollSpy">ScrollSpy</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="ri-honour-line"></i> <span data-key="t-widgets">Widgets</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarForms">
                    <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Forms</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarForms">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="forms-elements.html" class="nav-link" data-key="t-basic-elements">Basic
                                Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-select.html" class="nav-link" data-key="t-form-select">
                                Form Select </a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-checkboxs-radios.html" class="nav-link"
                                data-key="t-checkboxs-radios">Checkboxs & Radios</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-pickers.html" class="nav-link" data-key="t-pickers">
                                Pickers </a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-masks.html" class="nav-link" data-key="t-input-masks">Input
                                Masks</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-advanced.html" class="nav-link" data-key="t-advanced">Advanced</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-range-sliders.html" class="nav-link" data-key="t-range-slider"> Range
                                Slider </a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-validation.html" class="nav-link" data-key="t-validation">Validation</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-wizard.html" class="nav-link" data-key="t-wizard">Wizard</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-editors.html" class="nav-link" data-key="t-editors">Editors</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-file-uploads.html" class="nav-link" data-key="t-file-uploads">File
                                Uploads</a>
                        </li>
                        <li class="nav-item">
                            <a href="forms-layouts.html" class="nav-link" data-key="t-form-layouts">Form
                                Layouts</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarTables">
                    <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Tables</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarTables">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="tables-basic.html" class="nav-link" data-key="t-basic-tables">Basic
                                Tables</a>
                        </li>
                        <li class="nav-item">
                            <a href="tables-gridjs.html" class="nav-link" data-key="t-grid-js">Grid
                                Js</a>
                        </li>
                        <li class="nav-item">
                            <a href="tables-listjs.html" class="nav-link" data-key="t-list-js">List
                                Js</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCharts">
                    <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Charts</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarCharts">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#sidebarApexcharts" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApexcharts" data-key="t-apexcharts">
                                Apexcharts
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApexcharts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line"> Line
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-area.html" class="nav-link" data-key="t-area"> Area
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-column.html" class="nav-link" data-key="t-column">
                                            Column </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-bar.html" class="nav-link" data-key="t-bar">
                                            Bar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-mixed.html" class="nav-link" data-key="t-mixed"> Mixed
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-timeline.html" class="nav-link" data-key="t-timeline">
                                            Timeline </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-candlestick.html" class="nav-link"
                                            data-key="t-candlstick"> Candlstick </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-boxplot.html" class="nav-link" data-key="t-boxplot">
                                            Boxplot </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-bubble.html" class="nav-link" data-key="t-bubble">
                                            Bubble </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-scatter.html" class="nav-link" data-key="t-scatter">
                                            Scatter </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-heatmap.html" class="nav-link" data-key="t-heatmap">
                                            Heatmap </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-treemap.html" class="nav-link" data-key="t-treemap">
                                            Treemap </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-pie.html" class="nav-link" data-key="t-pie">
                                            Pie </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-radialbar.html" class="nav-link" data-key="t-radialbar">
                                            Radialbar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-radar.html" class="nav-link" data-key="t-radar"> Radar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-polar.html" class="nav-link" data-key="t-polar-area">
                                            Polar Area </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="charts-chartjs.html" class="nav-link" data-key="t-chartjs">
                                Chartjs </a>
                        </li>
                        <li class="nav-item">
                            <a href="charts-echarts.html" class="nav-link" data-key="t-echarts">
                                Echarts </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Icons</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarIcons">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="icons-remix.html" class="nav-link" data-key="t-remix">Remix</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-boxicons.html" class="nav-link" data-key="t-boxicons">Boxicons</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-materialdesign.html" class="nav-link"
                                data-key="t-material-design">Material Design</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-lineawesome.html" class="nav-link" data-key="t-line-awesome">Line
                                Awesome</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-feather.html" class="nav-link" data-key="t-feather">Feather</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMaps">
                    <i class="ri-map-pin-line"></i> <span data-key="t-maps">Maps</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarMaps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="maps-google.html" class="nav-link" data-key="t-google">
                                Google
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="maps-vector.html" class="nav-link" data-key="t-vector">
                                Vector
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="maps-leaflet.html" class="nav-link" data-key="t-leaflet">
                                Leaflet
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMultilevel">
                    <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarMultilevel">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                                1.2
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAccount">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-level-2.1">
                                            Level 2.1 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarCrm"
                                            data-key="t-level-2.2"> Level 2.2
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarCrm">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link" data-key="t-level-3.1">
                                                        Level 3.1
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link" data-key="t-level-3.2">
                                                        Level 3.2
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
