@extends('layout.app')
@section('otherStyle')
    <style>
        #cardItem {
            cursor: pointer;
        }
    </style>
@endsection
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
                        <template id="cardItemTemplate">
                            <div class="card" id="cardItem">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img class="rounded-start img-fluid h-100 w-100 object-cover"
                                            src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                            alt="Card image" id="itemImg">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-header">
                                            <h6 class="mb-0 itemName">2x | Batako Kotak Biasa</h6>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text mb-2 itemPrice">Rp. 10.000</p>
                                            <p class="card-text">
                                                <span class="btn btn-sm btn-danger" id="btnRemoveItem" data-index=""
                                                    onclick="removeItem(this)">Hapus <i
                                                        class="ri-delete-bin-line"></i></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div id="cartItemsContainer"></div>
                        <button class="btn btn-success w-100" id="btnCheckout" data-bs-toggle="modal"
                            data-bs-target="#addPenjualan" onclick="setValueForm()" hidden>Checkout</button>
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
                                <input type="hidden" id="kode_produk">
                                <input type="hidden" id="gambar">
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
                                    <button type="button" class="btn btn-success" id="add-btn"
                                        data-bs-dismiss="modal" onclick="addItemToCart()" disabled>Tambah</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPenjualan" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penjualan.store') }}" id="addPenjualanForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <select name="kode_pelanggan" class="form-select" id="nama-pelanggan" required></select>
                                {{-- <input type="text" id="nama-pelanggan" name="nama_pelanggan"
                                    class="form-control"required> --}}
                            </div>
                            <div class="col-xxl-6">
                                <label for="total">Total</label>
                                <input type="text" id="total" class="form-control" readonly required>
                                <input type="hidden" id="total1" name="total">
                            </div>
                            <div class="col-xxl-6">
                                <label for="bayar">Bayar</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" id="bayar" class="form-control"
                                        placeholder="Masukan nominal tunai" required
                                        oninput="formatRP(this); setKembalian()" />
                                </div>
                                <input type="hidden" id="bayar1" name="bayar">
                            </div>

                            <div class="col-xxl-6">
                                <label for="kembalian">Kembalian</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" id="kembalian" class="form-control" name="kembalian" required
                                        readonly oninput="formatRP(this)" />
                                </div>
                                <input type="hidden" name="kembalian" id="kembalian1">
                            </div>

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal"
                                        id="btn-simpan" onclick="deleteCart()" disabled>simpan</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            getCartItem();
            getPelanggan()
        });

        function formatRP(input) {
            var value = input.value.replace(/[^0-9]/g, '');

            if (value) {
                value = parseInt(value, 10).toLocaleString('id-ID');
            }

            input.value = value;
        }

        function addItem(data) {
            const kodeProduk = document.getElementById('kode_produk').value = data.kode_produk;
            const namaProduk = document.getElementById('nama_produk').value = data.nama_produk;
            const gambar = document.getElementById('gambar').value = data.gambar;
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

        function getPelanggan() {
            fetch("{{ route('penjualan.getPelanggan') }}", {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(response => response
                .json()).then(data => {
                const pelanggan = document.getElementById('nama-pelanggan');
                pelanggan.innerHTML = `<option selected disabled>Pilih Pelanggan</option>`;
                for (let index = 0; index < data.length; index++) {
                    pelanggan.innerHTML +=
                        `<option value="${data[index].kode_pelanggan}">${data[index].nama_pelanggan}</option>`
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
            const gambar = document.getElementById('gambar');

            levelHarga.innerHTML = `<option selected disabled>Pilih Harga</option>`;
            hargaSatuan.value = '';
            hargaSatuan1.value = '';
            jumlah.value = '';
            jumlah.disabled = true;
            subtotal.value = '';
            subtotal1.value = '';
            gambar.value = '';
        }

        function addItemToCart() {
            const kodeProduk = document.getElementById('kode_produk').value;
            const namaProduk = document.getElementById('nama_produk').value;
            const jumlah = parseInt(document.getElementById('jumlah').value);
            const subtotal1 = parseInt(document.getElementById('subtotal1').value);
            const hargaSatuan1 = parseInt(document.getElementById('hargaSatuan1').value);
            const gambar = document.getElementById('gambar').value;

            let cartItem = JSON.parse(localStorage.getItem('cartItem')) || [];
            const existingItemIndex = cartItem.findIndex(item => item.kodeProduk === kodeProduk);

            if (existingItemIndex === -1) {
                const newItem = {
                    kodeProduk: kodeProduk,
                    namaProduk: namaProduk,
                    jumlah: jumlah,
                    hargaSatuan: hargaSatuan1,
                    subtotal1: subtotal1,
                    gambar: gambar
                };
                cartItem.push(newItem);
            } else {
                cartItem[existingItemIndex].jumlah += jumlah;
                cartItem[existingItemIndex].subtotal1 += subtotal1;
            }

            localStorage.setItem('cartItem', JSON.stringify(cartItem));
            clearForm();
            getCartItem();
            getPelanggan();
        }

        function getCartItem() {
            const items = JSON.parse(localStorage.getItem('cartItem'));
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const btnCheckout = document.getElementById('btnCheckout');
            const btnAddItem = document.getElementById('add-btn');
            const template = document.getElementById('cardItemTemplate');

            if (items && items.length > 0) {
                cartItemsContainer.innerHTML = '';
                btnCheckout.removeAttribute('hidden');

                items.forEach((item, index) => {
                    const clone = template.content.cloneNode(true);
                    const btnRemove = clone.querySelector('#btnRemoveItem');
                    clone.querySelector('#itemImg').src = `/storage/gambarProduk/${item.gambar}`;
                    clone.querySelector('.itemName').textContent = `${item.jumlah}x | ${item.namaProduk}`;
                    clone.querySelector('.itemPrice').textContent = `Rp. ${item.subtotal1.toLocaleString('id-ID')}`;
                    btnRemove.setAttribute('data-index', index);
                    cartItemsContainer.appendChild(clone);
                });
            } else {
                btnCheckout.setAttribute('hidden', true);
                btnAddItem.setAttribute('disabled', true);
            }
        }

        function setValueForm() {
            const items = JSON.parse(localStorage.getItem('cartItem'));
            const form = document.getElementById('addPenjualanForm');
            const total = form.querySelector('#total');
            const total1 = form.querySelector('#total1');
            let totalSubtotal = 0;

            if (items && items.length > 0) {
                items.forEach((item, index) => {

                    // console.log(item);
                    // input kodeProduk
                    const kodeProduk = document.createElement('input');
                    kodeProduk.id = 'kodeProduk';
                    kodeProduk.type = 'hidden';
                    kodeProduk.name = 'kode_produk[]';
                    kodeProduk.value = item.kodeProduk;
                    form.appendChild(kodeProduk);

                    // input namaProduk
                    const namaProduk = document.createElement('input');
                    namaProduk.id = 'namaProduk';
                    namaProduk.type = 'hidden';
                    namaProduk.name = 'nama_produk[]';
                    namaProduk.value = item.namaProduk;
                    form.appendChild(namaProduk);

                    // input qty
                    const qty = document.createElement('input');
                    qty.id = 'qty';
                    qty.type = 'hidden';
                    qty.name = 'jumlah[]';
                    qty.value = item.jumlah;
                    form.appendChild(qty);

                    // input subtotal
                    const subtotal = document.createElement('input');
                    subtotal.id = 'subtotal';
                    subtotal.type = 'hidden';
                    subtotal.name = 'subtotal[]';
                    subtotal.value = item.subtotal1;
                    form.appendChild(subtotal);

                    // input hargaSatuan
                    const hargaSatuan = document.createElement('input');
                    hargaSatuan.id = 'hargaSatuan';
                    hargaSatuan.type = 'hidden';
                    hargaSatuan.name = 'harga_satuan[]';
                    hargaSatuan.value = item.hargaSatuan;
                    form.appendChild(hargaSatuan);

                    // input total
                    totalSubtotal += parseInt(item.subtotal1);
                });

                // total value
                total1.value = totalSubtotal;
                totalSubtotal = totalSubtotal.toLocaleString('id-ID');
                total.value = 'Rp. ' + totalSubtotal;
            }
        }

        function removeItem(button) {
            const index = button.getAttribute('data-index');
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const btnCheckout = document.getElementById('btnCheckout');
            const btnAddItem = document.getElementById('add-btn');

            let items = JSON.parse(localStorage.getItem('cartItem')) || [];

            if (index >= 0 && index < items.length) {
                items.splice(index, 1);

                localStorage.setItem('cartItem', JSON.stringify(items));

                if (items.length === 0) {
                    cartItemsContainer.innerHTML = '';
                    btnCheckout.setAttribute('hidden', true);
                    btnAddItem.setAttribute('disabled', true);
                } else {
                    getCartItem();
                }
            }
        }

        function setKembalian() {
            const total = parseInt(document.getElementById('total1').value);
            const bayar = document.getElementById('bayar').value;
            const bayar1 = document.getElementById('bayar1');
            const uang = parseInt(bayar.replace(/[^0-9]/g, ''));
            const kembalian = document.getElementById('kembalian');
            const kembalian1 = document.getElementById('kembalian1');
            const btnCheckout = document.getElementById('btn-simpan');

            const hasil = uang - total;
            const format = parseInt(hasil, 10).toLocaleString('id-ID');

            if (hasil < 0) {
                kembalian.value = 0
            } else {
                bayar1.value = uang;
                kembalian.value = format;
                kembalian1.value = hasil
                btnCheckout.removeAttribute('disabled')
            }
        }

        function deleteCart() {
            localStorage.removeItem('cartItem');
        }
    </script>
@endsection
