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
                                <div class="d-flex justify-content gap-2">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="">
                                        <form action="{{ route('rekappelanggan') }}" id="selectTahun">
                                            <select name="tahun" id="select-tahun" class="form-select"
                                                onchange="this.form.submit()">
                                                @foreach ($rekap as $key => $item)
                                                    <option value="{{ $item->created_at->format('Y') }}">
                                                        {{ $item->created_at->format('Y') }}</option>
                                                @endforeach
                                            </select>
                                        </form>
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
                                        <th class="sort" data-sort="nama">Nama</th>
                                        <th class="sort" data-sort="tahun">Tahun</th>
                                        <th class="sort" data-sort="bulan">Bulan</th>
                                        <th class="sort" data-sort="total">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($rekap as $key => $item)
                                        <tr class="text-center">
                                            <td class="no">{{ $key + 1 }}</td>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="kode_pelanggan">{{ $item->kode_pelanggan }}</td>
                                            <td class="nama">{{ $item->pelanggan->nama_pelanggan }}</td>
                                            <td class="tahun">{{ $item->created_at->format('Y') }}</td>
                                            <td class="bulan">{{ $item->created_at->format('F') }}</td>
                                            <td class="total">Rp.
                                                {{ number_format($item->total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Maaf! Hasil Pencarian Tidak Ditemukan</h5>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
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
@endsection

@section('otherJs')
    <!-- prismjs plugin -->
    <script src="{{ asset('admin_assets/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('admin_assets/assets/js/customJs/rekapPelanggan.init.js') }}"></script>
@endsection
