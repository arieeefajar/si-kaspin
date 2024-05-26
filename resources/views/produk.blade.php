@extends('layout.app')
@section('title', 'Produk')
@section('titleHeader', 'Produk')
@section('menu', 'Produk')
@section('subMenu', 'Data Produk')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Data Produk</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#addModal"><i
                                            class="ri-add-line align-bottom me-1"></i> Tambah</button>
                                </div>
                            </div>
                            <div class="col-sm">
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
                                        <th class="sort" data-sort="nama_kategori">Nama Kategori</th>
                                        <th class="sort" data-sort="nama_produk">Nama Produk</th>
                                        <th class="sort" data-sort="nama_supplier">Supplier</th>
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
                                            <td class="nama_kategori">{{ $item->kategori->nama_kategori }}</td>
                                            <td class="nama_produk">{{ $item->nama_produk }}</td>
                                            <td class="nama_supplier">{{ $item->supplier->nama }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-warning edit-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            onclick="editKategori({{ $item }})">Edit</button>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#deleteRecordModal"
                                                            onclick="deleteKategori({{ $item }})">Hapus</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="kode_kategori" class="form-label">Kategori</label>
                            <select name="kode_kategori" id="kode-kategori" class="form-select" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kode_kategori }}"
                                        {{ old('nama_kategori') == $item->kode_kategori ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kode_supplier" class="form-label">Supplier</label>
                            <select name="kode_supplier" id="kode-supplier" class="form-select" required>
                                <option value="" selected disabled>Pilih Supplier</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->kode_supplier }}"
                                        {{ old('nama') == $item->kode_supplier ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama</label>
                            <input type="text" id="nama_produk" class="form-control" name="nama_produk"
                                placeholder="Masukan nama produk" value="{{ old('nama_produk') }}" required />
                        </div>

                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Pilih gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form action="" id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Pilih Kategori</label>
                            <select name="kode_kategori" id="kode-kategori" class="form-select">
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kode_kategori }}"
                                        {{ old('kode_kategori') == $item->kode_kategori ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kode_supplier" class="form-label">Supplier</label>
                            <select name="kode_supplier" id="kode-supplier" class="form-select" required>
                                <option value="" selected disabled>Pilih Supplier</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->kode_supplier }}"
                                        {{ old('nama') == $item->kode_supplier ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama</label>
                            <input type="text" id="nama-edit" class="form-control" name="nama_produk"
                                placeholder="Masukan nama produk" required />
                        </div>

                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Pilih gambar</label>
                            <input type="file" name="gambar" id="gambar-edit" class="form-control"
                                value="{{ old('gambar') }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success" id="edit-btn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Apakah anda yakin ?</h4>
                            <p class="text-muted mx-4 mb-0">Apakah anda yakin mau menghapus data ini ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                        <form action="" id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn w-sm btn-danger ">Ya, Hapus!</button>
                        </form>
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
    <script src="{{ asset('admin_assets/assets/js/customJs/produk.init.js') }}"></script>

    <script>
        function editKategori(data) {
            const form = document.getElementById('editForm');
            form.action = "{{ route('produk.update', ['id' => '/']) }}/" + data.kode_produk;
            form.querySelector("#kode-kategori").value = data.kode_kategori;
            form.querySelector("#kode-supplier").value = data.kode_supplier;
            form.querySelector("#nama-edit").value = data.nama_produk;
            form.querySelector("#gambar-edit").value;
        }

        function deleteKategori(data) {
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('produk.destroy', ['id' => '/']) }}/" + data.kode_produk;
        }
    </script>
@endsection
