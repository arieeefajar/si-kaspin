@extends('layout.app')
@section('title', 'Stock Barang')
@section('titleHeader', 'Stock Barang')
@section('menu', 'Produk')
@section('subMenu', 'Stock Barang')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Data Stock Barang</h4>
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
                                        <th class="sort" data-sort="kode_produk">Kode Produk</th>
                                        <th class="sort" data-sort="kode_kategori">Kode Kategori</th>
                                        <th class="sort" data-sort="nama_produk">Nama Produk</th>
                                        <th class="sort" data-sort="stock">Stock</th>
                                        <th class="sort" data-sort="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($produk as $key => $item)
                                        <tr class="text-center">
                                            <td class="no">{{ $key + 1 }}</td>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="kode_produk">{{ $item->kode_produk }}</td>
                                            <td class="nama_kategori">{{ $item->nama_kategori }}</td>
                                            <td class="nama_produk">{{ $item->nama_produk }}</td>
                                            <td class="stock">{{ $item->stock }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-warning edit-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#addModal"
                                                            onclick="addStock({{ $item }})">Edit</button>
                                                    </div>
                                                    {{-- <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            onclick="deleteStock({{ $item }})"><i
                                                                class="ri-subtract-line"></i></button>
                                                    </div> --}}
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

    {{-- add stock --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form action="" method="POST" id="addForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="kode_kategori" class="form-label">Kategori</label>
                            <select name="kode_kategori" id="kode-kategori" class="form-select" required disabled>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->kode_kategori }}"
                                        {{ old('nama_kategori') == $item->kode_kategori ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama</label>
                            <input type="text" id="nama-produk" class="form-control" name="nama_produk"
                                placeholder="Masukan nama produk" value="{{ old('nama_produk') }}" required disabled />
                        </div>

                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Jumlah</label>
                            <input type="number" name="stock" id="stock" class="form-control"
                                placeholder="Masukan jumlah stock" required min="1">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- delete stock --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Kurangi Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form action="" id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="kode_kategori" class="form-label">Kategori</label>
                            <select name="kode_kategori" id="kode-kategori" class="form-select" required disabled>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->kode_kategori }}"
                                        {{ old('nama_kategori') == $item->kode_kategori ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama</label>
                            <input type="text" id="nama-edit" class="form-control" name="nama_produk"
                                placeholder="Masukan nama produk" value="{{ old('nama_produk') }}" required disabled />
                        </div>

                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Jumlah</label>
                            <input type="number" name="stock" id="stock" class="form-control"
                                placeholder="Masukan jumlah stock" required min="1">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success" id="edit-btn">Kurangi</button>
                        </div>
                    </div>
                </form>
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
    <script src="{{ asset('admin_assets/assets/js/customJs/stock.init.js') }}"></script>

    <script>
        function addStock(data) {
            const form = document.getElementById('addForm');
            form.action = "{{ route('stock.update', ['id' => '/']) }}/" + data.kode_produk;
            form.querySelector("#kode-kategori").value = data.kode_kategori;
            form.querySelector("#nama-produk").value = data.nama_produk;
            form.querySelector("#stock").value = data.stock;
        }

        function deleteStock(data) {
            const form = document.getElementById('editForm');
            form.action = "{{ route('stock.update', ['id' => '/']) }}/" + data.kode_produk;
            form.querySelector("#kode-kategori").value = data.kode_kategori;
            form.querySelector("#nama-edit").value = data.nama_produk;
            form.querySelector("#stock").value = data.stock;
        }
    </script>
@endsection
