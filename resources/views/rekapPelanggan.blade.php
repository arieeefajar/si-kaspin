@extends('layout.app')
@section('title', 'Rekap Pelanggan')
@section('titleHeader', 'Rekap Pelanggan')
@section('menu', 'Pelanggan')
@section('subMenu', 'Rekap Pelanggan')
@section('content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Rekap Pelanggan</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-start">
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
                                        <th class="sort" data-sort="kode_pelanggan">Kode Pelanggan</th>
                                        <th class="sort" data-sort="nama_pelanggan">Nama</th>
                                        <th class="sort" data-sort="nama_pelanggan">Tahun</th>
                                        <th class="sort" data-sort="nama_pelanggan">Bulan</th>
                                        <th class="sort" data-sort="total">Total</th>
                                    </tr>
                                </thead>

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
                            </table>
                        </div>
                </div><!-- end customerList -->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

@endsection

                        