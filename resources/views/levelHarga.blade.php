@extends('layout.app')
@section('title', 'Level Harga')
@section('titleHeader', 'Level Harga')
@section('menu', 'Produk')
@section('subMenu', 'Level Harga')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Level Harga</h4>
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
                                        <th class="sort" data-sort="kode_level">Kode Level</th>
                                        <th class="sort" data-sort="nama_level">Nama Level</th>
                                        <th class="sort" data-sort="nama_produk">Nama Produk</th>
                                        <th class="sort" data-sort="harga_satuan">Harga Satuan</th>
                                        <th class="sort" data-sort="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($levelharga as $key => $item)
                                        <tr class="text-center">
                                            <td class="no">{{ $key + 1 }}</td>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="kode_level">{{ $item->kode_level }}</td>
                                            <td class="nama_level">{{ $item->nama_level }}</td>
                                            <td class="nama_produk">{{ $item->nama_produk }}</td>
                                            <td class="harga_satuan">Rp.
                                                {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-warning edit-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            onclick="editLevelHarga({{ $item }})">Edit</button>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#deleteRecordModal"
                                                            onclick="deleteLevelHarga({{ $item }})">Hapus</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Level Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form action="{{ route('levelharga.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Produk</label>
                            <select name="kode_produk" id="kode_produk" class="form-select" required>
                                <option selected disabled>Pilih Produk</option>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->kode_produk }}"
                                        {{ old('kode_produk') == $item->kode_produk ? 'selected' : '' }}>
                                        {{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Level</label>
                            <input type="text" id="nama-level" class="form-control" name="nama_level"
                                placeholder="Masukan nama level" required />
                        </div>

                        <div class="mb-3">
                            <label for="hargaSatuan" class="form-label">Harga Satuan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" id="harga-satuan" class="form-control" name="harga_satuan"
                                    placeholder="Masukan harga satuan" required oninput="formatRP(this); inputHarga()" />
                            </div>
                        </div>

                        <input type="hidden" id="harga-satuan1" name="harga_satuan1">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Operator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form action="" id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Produk</label>
                            <select name="kode_produk" id="kode_produk_edit" class="form-select" required>
                                <option selected disabled>Pilih Produk</option>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->kode_produk }}"
                                        {{ old('kode_produk') == $item->kode_produk ? 'selected' : '' }}>
                                        {{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Level</label>
                            <input type="text" id="nama-level-edit" class="form-control" name="nama_level"
                                placeholder="Masukan nama level" required />
                        </div>

                        <div class="mb-3">
                            <label for="hargaSatuan" class="form-label">Harga Satuan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" id="harga-satuan-edit" class="form-control" name="harga_satuan"
                                    placeholder="Masukan harga satuan" required
                                    oninput="formatRP(this); inputHargaEdit()" />
                            </div>
                        </div>

                        <input type="hidden" id="harga-satuan1-edit" name="harga_satuan1">
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
    <script src="{{ asset('admin_assets/assets/js/customJs/levelHarga.init.js') }}"></script>

    <script>
        function formatRP(input) {
            var value = input.value.replace(/[^0-9]/g, '');

            if (value) {
                value = parseInt(value, 10).toLocaleString('id-ID');
            }

            input.value = value;
        }

        function inputHarga() {
            const hargaSatuan = document.getElementById('harga-satuan').value;
            const hargaSatuan1 = document.getElementById('harga-satuan1');
            const harga = parseInt(hargaSatuan.replace(/[^0-9]/g, ''));

            hargaSatuan1.value = harga;
        }

        function inputHargaEdit() {
            const hargaSatuan = document.getElementById('harga-satuan-edit').value;
            const hargaSatuan1 = document.getElementById('harga-satuan1-edit');
            const harga = parseInt(hargaSatuan.replace(/[^0-9]/g, ''));

            hargaSatuan1.value = harga;
        }

        function editLevelHarga(data) {

            var hargaSatuan = parseInt(data.harga_satuan);

            if (hargaSatuan) {
                hargaSatuan = parseInt(hargaSatuan, 10).toLocaleString('id-ID');
            }

            const form = document.getElementById('editForm');
            form.action = "{{ route('levelharga.update', ['id' => '/']) }}/" + data.kode_level;
            form.querySelector("#kode_produk_edit").value = data.kode_produk;
            form.querySelector("#nama-level-edit").value = data.nama_level;
            form.querySelector("#harga-satuan-edit").value = hargaSatuan;
            form.querySelector("#harga-satuan1-edit").value;
        }

        function deleteLevelHarga(data) {
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('levelharga.destroy', ['id' => '/']) }}/" + data.kode_level;
        }
    </script>
@endsection
