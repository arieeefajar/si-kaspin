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
                                            @if ($totalKerugian > 0)
                                                <h2>Rp. {{ number_format($totalKerugian, 0, ',', '.') }}</h2>
                                            @else
                                                <h2>Rp. 0</h2>
                                            @endif
                                            {{-- <h2>Rp. {{ number_format($totalKerugian, 0, ',', '.') }}</h2> --}}
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
                                            @if ($totalLaba > 0)
                                                <h2>Rp. {{ number_format($totalLaba, 0, ',', '.') }}</h2>
                                            @else
                                                <h2>Rp. 0</h2>
                                            @endif
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
                                        <select name="bulan_penjualan" id="salesMonthSelector" class="form-select form-select-sm"
                                            onchange="document.getElementById('salesMonthForm').submit();">
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}" {{ $i == $bulanPenjualan ? 'selected' : '' }}>
                                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                        <select name="tahun_penjualan" id="salesYearSelector" class="form-select form-select-sm"
                                            onchange="document.getElementById('salesMonthForm').submit();">
                                            @for ($i = 2020; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}" {{ $i == $tahunPenjualan ? 'selected' : '' }}>
                                                    {{ $i }}</option>
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
                        <form id="purchasesMonthForm" method="GET" action="{{ route('dashboard') }}">
                            <select name="bulan_pembelian" id="purchasesMonthSelector" class="form-select form-select-sm"
                                onchange="document.getElementById('purchasesMonthForm').submit();">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ $i == $bulanPembelian ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                            <select name="tahun_pembelian" id="purchasesYearSelector" class="form-select form-select-sm"
                                onchange="document.getElementById('purchasesMonthForm').submit();">
                                @for ($i = 2020; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}" {{ $i == $tahunPembelian ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </form>
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
  
        <!-- Best Seller -->
        <div class="col-xl-4 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Best Seller</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" style="width: 62px;">Nama Produk</th>

                                    <th scope="col" style="width: 62px;">Total Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkBestSeller as $produk)
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
        document.addEventListener('DOMContentLoaded', function() {
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

        // pembelian
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('purchasesChart').getContext('2d');
            var purchasesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($nmProduk),
                    datasets: [{
                        label: 'Total Produk Dibeli',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: @json($jmlProduk)
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
