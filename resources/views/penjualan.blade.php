@extends('layout.app')
@section('otherStyle')
    <style>
        .info-row {
            display: flex;
        }

        .info-row p {
            display: flex;
            justify-content: flex-start;
            width: 100%;
        }

        .label {
            min-width: 150px;
            text-align: start;
            padding-right: 10px;
            font-weight: 600;
        }

        .value {
            text-align: left;
            flex-grow: 1;
        }
    </style>
@endsection
@section('title', 'Penjualan')
@section('titleHeader', 'Penjualan')
@section('menu', 'Keuangan')
@section('subMenu', 'Penjualan')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Data Transaksi Penjualan</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th class="sort" data-sort="no">No</th>
                                        <th class="sort" data-sort="kodePenjualan">Kode Penjualan</th>
                                        <th class="sort" data-sort="namaOperator">Nama Operator</th>
                                        <th class="sort" data-sort="total">Total</th>
                                        <th class="sort" data-sort="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($penjualan as $key => $item)
                                        <tr class="text-center">
                                            <td class="no">{{ $key + 1 }}</td>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="kode_penjualan">{{ $item->kode_penjualan }}</td>
                                            <td class="nama">{{ $item->operator->nama }}</td>
                                            <td class="total1">Rp.
                                                {{ number_format($item->total, 0, ',', '.') }}</td>
                                            <td class="total" style="display:none;">{{ $item->total }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <div class="detail">
                                                        <button class="btn btn-sm btn-success remove-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#addModal"
                                                            onclick="detailPenjualan({{ $item }})">Detail</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- no result --}}
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Maaf! Hasil Pencarian Tidak Ditemukan</h5>
                                </div>
                            </div>
                        </div>

                        {{-- pagination --}}
                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    < </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            >
                                        </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>

    {{-- add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card">
                    <div class="card-body table-responsive" id="table-detail">
                        <table class="table table-borderless mb-0">
                            <thead class="table-light">
                                <tr class="text-center">
                                    <th class="sort" data-sort="produk">Produk</th>
                                    <th class="sort" data-sort="hargaSatuan">Harga Satuan</th>
                                    <th class="sort" data-sort="jumlah">Jumlah</th>
                                    <th class="sort" data-sort="subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <tr class="text-center">
                                    <td class="produk">T-Shirt</td>
                                    <td class="hargaSatuan">Rp. 100.000</td>
                                    <td class="jumlah">1</td>
                                    <td class="subtotal">Rp. 100.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex container" id="detail-penjualan">
                    <div class="row g-0 mb-3 flex-grow-1 align-items-center">
                        <div class="col-sm-6 d-flex-column">
                            <div class="info-row">
                                <p><span class="label">Kode Penjualan</span> <span class="value" id="kode-penjualan"> :
                                        #okok</span></p>
                            </div>
                            <div class="info-row">
                                <p><span class="label">Tanggal</span> <span class="value" id="tanggal"> : 16</span>
                                </p>
                            </div>
                            <div class="info-row">
                                <p><span class="label">Operator</span> <span class="value" id="nama-operator"> :
                                        Bintang</span></p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex-column">
                            <div class="info-row">
                                <p><span class="label">Total</span> <span class="value" id="total"> : #okok</span>
                                </p>
                            </div>
                            <div class="info-row">
                                <p><span class="label">Bayar</span> <span class="value" id="bayar"> : #okok</span>
                                </p>
                            </div>
                            <div class="info-row">
                                <p><span class="label">Kembalian</span> <span class="value" id="kembalian"> :
                                        #okok</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('otherJs')
        <!-- prismjs plugin -->
        <script src="{{ asset('admin_assets/assets/libs/prismjs/prism.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/libs/list.js/list.min.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

        <!-- listjs init -->
        <script src="{{ asset('admin_assets/assets/js/customJs/dataPenjualan.init.js') }}"></script>

        <script>
            function formatRp(value) {
                value = parseInt(value, 10).toLocaleString('id-ID');
                return value;
            }

            function produkBelanja(data) {
                const cardDetail = document.getElementById('table-detail');
                const tbody = cardDetail.querySelector('tbody');

                tbody.innerHTML = '';
                data.forEach(items => {
                    const hargaSatuan = formatRp(items.produk.level_harga[0].harga_satuan);
                    const subtotal = formatRp(items.subtotal);
                    const tr = document.createElement('tr');
                    tr.className = 'text-center';

                    const tdProduk = document.createElement('td');
                    tdProduk.textContent = items.produk.nama_produk;
                    tr.appendChild(tdProduk);

                    const tdHargaSatuan = document.createElement('td');
                    tdHargaSatuan.textContent = "Rp. " + hargaSatuan;
                    tr.appendChild(tdHargaSatuan);

                    const tdJumlah = document.createElement('td');
                    tdJumlah.textContent = items.jumlah;
                    tr.appendChild(tdJumlah);

                    const tdSubtotal = document.createElement('td');
                    tdSubtotal.textContent = "Rp. " + subtotal;
                    tr.appendChild(tdSubtotal);

                    tbody.appendChild(tr);
                });
                console.log(data);
            }

            function detailPenjualan(data) {
                produkBelanja(data.details);
                const cardDetail = document.getElementById('detail-penjualan"');
                const kodePenjualan = document.querySelector('#kode-penjualan');
                const tanggal = document.querySelector('#tanggal');
                const namaOperator = document.querySelector('#nama-operator');
                const total = document.querySelector('#total');
                const bayar = document.querySelector('#bayar');
                const kembalian = document.querySelector('#kembalian');

                const date = new Date(data.created_at);
                const format = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();

                const totalBelanja = formatRp(data.total);
                const uangBayar = formatRp(data.bayar);
                const uangKembalian = formatRp(data.kembalian);

                kodePenjualan.textContent = ": " + data.kode_penjualan;
                tanggal.textContent = ": " + format;
                namaOperator.textContent = ": " + data.operator.nama;
                total.textContent = ": Rp." + totalBelanja;
                bayar.textContent = ": Rp." + uangBayar;
                kembalian.textContent = ": Rp." + uangKembalian;
            }
        </script>
    @endsection
