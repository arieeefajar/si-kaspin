@extends('layout.app')
@section('title', 'Dashboard | Admin')
@section('titleHeader', 'Dashboard')
@section('menu', 'Menu')
@section('subMenu', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-xxl-15">
        <div class="d-flex flex-column h-100">
            <div class="row">
                <!-- Jumlah Penjualan -->
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Jumlah Penjualan </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Total penjualan produk saat ini</h6>
                                    <p class="card-text">
                                        <h3>{{ $jumlahPenjualan }}</h3>
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="pie-chart" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <!-- Jumlah Pembelian -->
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Jumlah Pembelian </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Total pembelian produk saat ini</h6>
                                    <p class="card-text">
                                        <h3>{{ $jumlahPembelian }}</h3>
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="bar-chart-2" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <!-- Total Pemasukan -->
                <div class="col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Total Pemasukan</p>
                                    <p class="mb-0 text-muted">
                                        <h2>Rp. {{ number_format($totalPenjualan, 0, ',', '.') }}</h2>
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="dollar-sign" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->


                <!-- Total Pengeluaran -->
                <div class="col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Total Pengeluaran</p>
                                    <p class="mb-0 text-muted">
                                        <h2>Rp. {{ number_format($totalPembelian, 0, ',', '.') }}</h2>
                                    </p>
                                    
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="dollar-sign" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <!-- Total Kerugian -->
                <div class="col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Total Kerugian</p>
                                    <p class="mb-0 text-muted">
                                        <h2>Rp. {{ number_format($totalKerugian, 0, ',', '.') }}</h2>
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="trending-down" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <!-- Total Laba -->
                <div class="col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Total Laba</p>
                                    <p class="mb-0 text-muted">
                                        <h2>Rp. {{ number_format($totalLaba, 0, ',', '.') }}</h2>
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="trending-up" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">
                <!-- Total Penjualan per Bulan -->
                <div class="col-xl-4">
                    <div class="card card-height-90">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Total Penjualan per Bulan</h4>
                            <div class="flex-shrink-0">
                                <form id="salesMonthForm" method="GET" action="{{ route('dashboard') }}">
                                    <select name="bulan" id="salesMonthSelector" class="form-select form-select-sm" onchange="document.getElementById('salesMonthForm').submit();">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ $i == $bulan ? 'selected' : '' }}>
                                            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                        </option>
                                    @endfor
                                                        </select>
                                                        <select name="tahun" id="salesYearSelector" class="form-select form-select-sm" onchange="document.getElementById('salesMonthForm').submit();">
                                                        @for ($i = 2020; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" width="100%" height="120"></canvas>
                            
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <!-- Total Pembelian per Bulan -->
                <div class="col-xl-4">
                    <div class="card card-height-90">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Total Pembelian per Bulan</h4>
                            <div class="flex-shrink-0">
                                <select id="salesMonthSelector" class="form-select form-select-sm">
                                    <option value="January">Januari</option>
                                    <option value="February">Februari</option>
                                    <option value="March">Maret</option>
                                    <option value="January">April</option>
                                    <option value="February">Mei</option>
                                    <option value="March">Juni</option>
                                    <option value="January">Juli</option>
                                    <option value="February">Agustus</option>
                                    <option value="March">September</option>
                                    <option value="January">Oktober</option>
                                    <option value="February">November</option>
                                    <option value="March">Desember</option>
                                    <!-- Add more months as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="purchasesChart" width="100%" height="120"></canvas>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <!-- Kategori Produk -->
                <div class="col-xl-4">
                    <div class="card card-height-90">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Kategori Produk</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="productCategoryChart" width="100%" height="120"></canvas>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div> <!-- end col-->
</div><!-- end row -->


<div class="row">
    <!-- Total Hutang -->
    <div class="col-xl-4 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Total Hutang</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Hari Ini</a>
                            <a class="dropdown-item" href="#">Minggu Ini</a>
                            <a class="dropdown-item" href="#">Bulan Ini</a>
                            <a class="dropdown-item" href="#">Tahun Ini</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div id="user_device_pie_charts" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]'
                    class="apex-charts" dir="ltr"></div>
                <div class="table-responsive mt-3">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                        <tbody class="border-0">
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                            class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Desktop
                                        Users</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i data-feather="users"
                                            class="me-2 icon-sm"></i>78.56k</p>
                                </td>
                                <td class="text-end">
                                    <p class="text-success fw-medium fs-12 mb-0"><i
                                            class="ri-arrow-up-s-fill fs-5 align-middle"></i>2.08%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                            class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Mobile
                                        Users</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i data-feather="users"
                                            class="me-2 icon-sm"></i>105.02k</p>
                                </td>
                                <td class="text-end">
                                    <p class="text-danger fw-medium fs-12 mb-0"><i
                                            class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                            class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Tablet
                                        Users</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i data-feather="users"
                                            class="me-2 icon-sm"></i>42.89k</p>
                                </td>
                                <td class="text-end">
                                    <p class="text-danger fw-medium fs-12 mb-0"><i
                                            class="ri-arrow-down-s-fill fs-5 align-middle"></i>7.36%
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <!-- Total Transaksi -->
    <div class="col-xl-4 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Total Transaksi</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-primary btn-sm">Export Report</button>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-12 mb-3">Jumlah Semua</h6>
                        <h4 class="mb-0">725,800</h4>
                        <p class="mb-0 mt-2 text-muted"><span class="badge badge-soft-success mb-0">
                                <i class="ri-arrow-up-line align-middle"></i> 15.72 %</span></p>
                    </div><!-- end col -->
                </div><!-- end row -->
                <div class="mt-2 text-center">
                    <a href="javascript:void(0);" class="text-muted text-decoration-underline">Show All</a>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <!-- Best Seller -->
    <div class="col-xl-4 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Best Seller</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Current Year</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                        <thead class="text-muted table-light">
                            <tr>
                                <th scope="col" style="width: 62px;">Nama Produk</th>
                                
                                <th scope="col">Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produkBestSeller as $produk)
                            <tr>
                                <td>{{ $produk['nama_produk'] }}</td>
                                <td>{{ $produk['jumlah'] }}</td>
                            </tr>
                        @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table-responsive -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection

@section('otherJs')
    <!-- apexcharts -->
    <script src="{{ asset('admin_assets/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('admin_assets/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Dashboard init -->
    <script>
        // penjualan
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($namaProduk),
                    datasets: [{
                        label: 'Total Produk Terjual',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: @json($jumlahProduk)
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        
        // Data untuk total pembelian per bulan
        var purchasesData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: 'Total Pembelian per Bulan',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: [800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900] // Ganti dengan data pembelian yang sesuai
            }]
        };

        // Inisialisasi chart pembelian
        var purchasesCtx = document.getElementById('purchasesChart').getContext('2d');
        var purchasesChart = new Chart(purchasesCtx, {
            type: 'bar',
            data: purchasesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Inisialisasi Chart -->
    <script>
        var ctx = document.getElementById('productCategoryChart').getContext('2d');
        var productCategoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($kategoriProdukLabel) !!},
                datasets: [{
                    label: 'Produk per Kategori',
                    data: {!! json_encode($kategoriProdukData) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>


@endsection
