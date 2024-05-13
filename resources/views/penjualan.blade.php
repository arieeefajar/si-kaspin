@extends('layout.app')
@section('title', 'Penjualan')
@section('titleHeader', 'Penjualan')
@section('menu', 'Transaksi')
@section('subMenu', 'Penjualan')
@section('content')
    <div class="row h-100">
        {{-- @dd($produk) --}}
        <div class="col-xl-8">
            <div class="card card-height-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="align-items-center d-flex-column">
                        <form action="" class="app-search d-flex">
                            <div class="position-relative">
                                <input type="text" name="" id="" class="form-control rounded-pill"
                                    placeholder="Search...">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                            </div>
                        </form>
                        <div class="row d-flex">
                            @foreach ($produk as $item)
                                <div class="col-6">
                                    <div class="card" id="cardItem" data-bs-toggle="modal" data-bs-target="#addItemModal"
                                        onclick="addItem({{ $item }})">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img class="rounded-start img-fluid h-100 w-100 object-cover"
                                                    src="{{ asset('/storage/gambarProduk/' . $item->gambar) }}"
                                                    alt="Card image">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">{{ $item->nama_produk }}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text mb-2">Rp.
                                                        {{ number_format($item->harga_satuan, 0, ',', '.') }}</p>
                                                    <p class="card-text"><small
                                                            class="text-muted">{{ $item->nama_kategori }} | Stok:
                                                            {{ $item->stock }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            @endforeach
                        </div><!-- end row -->
                    </div>
                </div>
                <!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex gap-2 position-relative">
                        <i class="ri-shopping-cart-line"></i>
                        <h3 class="card-title mb-0">Keranjang</h3>
                    </div>
                    <div class="d-flex-column flex-grow-1 mt-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="rounded-start img-fluid h-100 object-cover"
                                        src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}" alt="Card image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-header">
                                        <h6 class="mb-0">Batako Kotak Biasa</h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mb-2">Rp. 10.000</p>
                                        <p class="card-text">
                                            <small class="text-muted">Edit
                                            </small>
                                            <i class="ri-edit-line"></i>
                                            |
                                            <small class="text-muted">Hapus</small>
                                            <i class="ri-delete-bin-line"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <div class="">
                        <button class="btn btn-success w-100">Lanjutkan</button>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end col-->
    </div> <!-- end row-->

    <!-- Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Keranjang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="produkName" class="form-label">Produk</label>
                                    <input type="text" class="form-control" id="nama_produk"
                                        placeholder="Masukan Nama Produk" readonly required>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label class="form-label">Harga</label>
                                <select class="form-select mb-2" aria-label="Default select example" id="level_harga"
                                    onchange="getHarga()" required>
                                    <input type="text" class="form-control" id="hargaSatuan" disabled required>
                                    <input type="hidden" id="hargaSatuan1" required>
                                </select>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="jumlah" class="form-label">Jumlah<span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="jumlah" oninput="subtotalItem()"
                                        placeholder="Masukan Jumlah" disabled required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <label for="subtotal" class="form-label">Subtotal</label>
                                <input type="text" class="form-control" id="subtotal" value="" required
                                    disabled>
                                <input type="hidden" id="subtotal1" required>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" onclick="clearForm()"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn"
                                        disabled>Tambah</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('otherJs')
    <script>
        function addItem(data) {
            const namaProduk = document.getElementById('nama_produk').value = data.nama_produk;
            const levelHarga = document.getElementById('level_harga');
            fetch("{{ route('penjualan.getLevelHarga', ['id' => '/']) }}/" + data.kode_produk, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(response => response.json()).then(data => {
                const levelHarga = document.getElementById('level_harga');

                levelHarga.innerHTML = `<option selected disabled>Pilih Harga</option>`;
                for (let index = 0; index < data.length; index++) {
                    levelHarga.innerHTML +=
                        `<option value="${data[index].kode_level}">${data[index].nama_level}</option>`
                }
            }).catch(error => console.error('Error:', error));
        }

        function getHarga() {
            const kode_level = document.getElementById('level_harga').value;

            fetch("{{ route('penjualan.getHarga', ['id' => '/']) }}/" + kode_level, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(response => response
                .json()).then(data => {

                hargaSatuan = parseInt(data[0].harga_satuan);

                if (hargaSatuan) {
                    hargaSatuan = parseInt(hargaSatuan, 10).toLocaleString('id-ID');
                }

                document.getElementById('hargaSatuan').value = 'Rp. ' + hargaSatuan;
                document.getElementById('hargaSatuan1').value = data[0].harga_satuan;
                document.getElementById('jumlah').removeAttribute('disabled');
            }).catch(error => console.error('Error:', error));
        }

        function subtotalItem() {
            const qty = parseInt(document.getElementById('jumlah').value);
            const harga = parseInt(document.getElementById('hargaSatuan1').value);
            const subtotal = document.getElementById('subtotal');
            const subtotal1 = document.getElementById('subtotal1');
            const addBtn = document.getElementById("add-btn");

            const hasil = qty * harga;
            subtotal1.value = qty * harga;

            if (hasil) {
                hasil.toLocaleString('id-ID');
                subtotal.value = 'Rp. ' + hasil;
                addBtn.removeAttribute('disabled');
            }

        }

        function clearForm() {
            const levelHarga = document.getElementById('level_harga');
            const hargaSatuan = document.getElementById('hargaSatuan');
            const hargaSatuan1 = document.getElementById('hargaSatuan1');
            const jumlah = document.getElementById('jumlah');
            const subtotal = document.getElementById('subtotal');
            const subtotal1 = document.getElementById('subtotal1');

            levelHarga.innerHTML = `<option selected disabled>Pilih Harga</option>`;
            hargaSatuan.value = '';
            hargaSatuan1.value = '';
            jumlah.value = '';
            jumlah.disabled = true;
            subtotal.value = '';
            subtotal1.value = '';
        }
    </script>
@endsection
