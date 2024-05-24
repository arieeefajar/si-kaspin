@extends('layout.app')
@section('otherStyle')
    <style>
        #cardItem {
            cursor: pointer;
        }
    </style>
@endsection
@section('title', 'Retur Penjualan')
@section('titleHeader', 'Retur Penjualan')
@section('menu', 'Transaksi')
@section('subMenu', 'Retur Penjualan')
@section('content')

    <div class="row h-100">
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
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($produk as $item)
                                        <div class="col-md-6">
                                            <div class="card" id="cardItem" data-bs-toggle="modal"
                                                data-bs-target="#addItemModal" onclick="addItem({{ $item }})">
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
                            </div><!-- end col -->
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
                        <h3 class="card-title mb-0">Daftar Retur</h3>
                    </div>
                    <div class="d-flex-column flex-grow-1 mt-4">
                        <template id="cardItemTemplate">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img class="rounded-start img-fluid h-100 w-100 object-cover" id="cardItemImg"
                                            src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                            alt="Card image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-header">
                                            <h6 class="mb-0" id="cardItemTitle">Batako Kotak Biasa</h6>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text mb-2" id="cardItemPrice">Rp. 10.000</p>
                                            <p class="card-text">
                                                <span class="btn btn-sm btn-danger" id="btnRemoveItem" data-index=""
                                                    onclick="removeItem(this)">Hapus <i
                                                        class="ri-delete-bin-line"></i></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </template>
                        <div id="cartItemsContainer"></div>
                    </div>
                    <div class="">
                        <button class="btn btn-success w-100" id="btnSimpan" data-bs-toggle="modal"
                            data-bs-target="#addModal" onclick="setValueForm()" hidden>Lanjutkan</button>
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
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Retur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="addItemForm">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="produkName" class="form-label">Produk</label>
                                    <input type="text" class="form-control" id="produkName"
                                        placeholder="Masukan Nama Produk" readonly>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="jumlah" class="form-label">Jumlah<span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="jumlah"
                                        oninput="subtotalItem(); inputAngka(this)" placeholder="Masukan Jumlah">
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label class="form-label">Total Harga<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="totalHarga1" disabled>
                            </div><!--end col-->

                            <input type="hidden" id="hargaSatuan" name="harga_satuan">
                            <input type="hidden" id="totalHarga" name="total_harga">
                            <input type="hidden" id="kodeProduk" name="kode_produk">
                            <input type="hidden" id="gambar" name="gambar">

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                        id="closeModal">Close</button>
                                    <button type="button" id="addItemButton" class="btn btn-success"
                                        onclick="addItemtoCart()" disabled>Tambah</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Retur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('retur.store') }}" method="POST" id="addReturnForm">
                        @csrf
                        @method('POST')
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <select name="kode_pelanggan" class="form-select" id="nama-pelanggan" required></select>
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
                                    <input type="text" id="bayar" class="form-control" maxlength="11"
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
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                        id="closeModal">Close</button>
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal"
                                        id="btn-simpan" onclick="deleteCart()" disabled>Simpan</button>
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
            getPelanggan();
        })

        function inputAngka(input) {
            input.value = input.value.replace(/\D/g, '');
        }

        function formatRP(input) {
            var value = input.value.replace(/[^0-9]/g, '');

            if (value) {
                value = parseInt(value, 10).toLocaleString('id-ID');
            }

            input.value = value;
        }

        function addItem(data) {
            const form = document.getElementById('addItemForm');
            form.querySelector("#kodeProduk").value = data.kode_produk;
            form.querySelector("#produkName").value = data.nama_produk;
            form.querySelector("#hargaSatuan").value = data.harga_satuan;
            form.querySelector("#gambar").value = data.gambar;
        }

        function subtotalItem() {
            const form = document.getElementById('addItemForm');
            const harga = form.querySelector("#hargaSatuan").value;
            const jumlah = form.querySelector('#jumlah').value;
            const button = form.querySelector('#addItemButton');

            const subtotal = harga * jumlah;
            form.querySelector('#totalHarga').value = subtotal;
            const totalHarga1 = form.querySelector('#totalHarga1');

            if (!isNaN(subtotal) && jumlah > 0) {
                totalHarga1.value = "Rp. " + subtotal.toLocaleString('id-ID');
                button.removeAttribute('disabled');
            } else {
                button.setAttribute('disabled', true);
            }
        }

        function addItemtoCart() {
            const form = document.getElementById('addItemForm');
            const kodeProduk = form.querySelector('#kodeProduk').value;
            const namaProduk = form.querySelector('#produkName').value;
            const gambar = form.querySelector('#gambar').value;
            const jumlah = parseInt(form.querySelector('#jumlah').value);
            const subtotal = parseInt(form.querySelector('#totalHarga').value);
            const buttonClose = form.querySelector('#closeModal');
            buttonClose.click();

            let cartItem = JSON.parse(localStorage.getItem('cartRetur')) || [];
            const existingItemIndex = cartItem.findIndex(item => item.kodeProduk === kodeProduk);

            if (existingItemIndex === -1) {
                const newItem = {
                    kodeProduk: kodeProduk,
                    namaProduk: namaProduk,
                    jumlah: jumlah,
                    subtotal: subtotal,
                    gambar: gambar
                };
                cartItem.push(newItem);
            } else {
                cartItem[existingItemIndex].jumlah += jumlah;
                cartItem[existingItemIndex].subtotal += subtotal;
            }

            localStorage.setItem('cartRetur', JSON.stringify(cartItem));
            clearForm();
            getCartItem();
            getPelanggan()
        }

        function clearForm() {
            const form = document.getElementById('addItemForm');
            form.querySelector('#addItemButton').setAttribute('hidden', true);
            form.reset();
        }

        function getCartItem() {
            const items = JSON.parse(localStorage.getItem('cartRetur'));
            const template = document.getElementById('cardItemTemplate');
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const btnSimpan = document.getElementById('btnSimpan');

            if (items && items.length > 0) {
                cartItemsContainer.innerHTML = '';
                btnSimpan.removeAttribute('hidden');

                items.forEach((item, index) => {
                    const tr = template.content.cloneNode(true);
                    const btnRemove = tr.querySelector('#btnRemoveItem');
                    tr.querySelector('#cardItemImg').src = `/storage/gambarProduk/${item.gambar}`;
                    tr.querySelector('#cardItemTitle').textContent = `${item.jumlah}x | ${item.namaProduk}`;
                    tr.querySelector('#cardItemPrice').textContent = 'Rp. ' + item.subtotal
                        .toLocaleString(
                            'id-ID');
                    btnRemove.setAttribute('data-index', index);
                    cartItemsContainer.appendChild(tr);
                })
            } else {
                btnSimpan.setAttribute('hidden', true);
            }
        }

        function removeItem(button) {
            const index = button.getAttribute('data-index');
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const btnSimpan = document.getElementById('btnSimpan');

            let items = JSON.parse(localStorage.getItem('cartRetur')) || [];

            if (index >= 0 && index < items.length) {
                items.splice(index, 1);

                localStorage.setItem('cartRetur', JSON.stringify(items));

                if (items.length === 0) {
                    cartItemsContainer.innerHTML = '';
                    btnSimpan.setAttribute('hidden', true);
                } else {
                    getCartItem();
                }
            }
        }

        function getPelanggan() {
            fetch("{{ route('retur.getPelanggan') }}", {
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

        function setValueForm() {
            const items = JSON.parse(localStorage.getItem('cartRetur'));
            const form = document.getElementById('addReturnForm');
            const total = form.querySelector('#total');
            const total1 = form.querySelector('#total1');
            let totalSubtotal = 0;

            console.log(items);

            if (items && items.length > 0) {
                items.forEach((item, index) => {
                    // input kodeProduk
                    const kodeProduk = document.createElement('input');
                    kodeProduk.id = 'kodeProduk';
                    kodeProduk.type = 'hidden';
                    kodeProduk.name = 'kode_produk[]';
                    kodeProduk.value = item.kodeProduk;
                    form.appendChild(kodeProduk);
                    console.log(kodeProduk);

                    // input namaProduk
                    const namaProduk = document.createElement('input');
                    namaProduk.id = 'namaProduk';
                    namaProduk.type = 'hidden';
                    namaProduk.name = 'nama_produk[]';
                    namaProduk.value = item.namaProduk;
                    form.appendChild(namaProduk);
                    console.log(namaProduk);

                    // input qty
                    const qty = document.createElement('input');
                    qty.id = 'qty';
                    qty.type = 'hidden';
                    qty.name = 'jumlah[]';
                    qty.value = item.jumlah;
                    form.appendChild(qty);
                    console.log(qty);

                    // input subtotal
                    const subtotal = document.createElement('input');
                    subtotal.id = 'subtotal';
                    subtotal.type = 'hidden';
                    subtotal.name = 'subtotal[]';
                    subtotal.value = item.subtotal;
                    form.appendChild(subtotal);
                    console.log(subtotal);

                    // input total
                    totalSubtotal += parseInt(item.subtotal);
                });

                // total value
                total1.value = totalSubtotal;
                totalSubtotal = totalSubtotal.toLocaleString('id-ID');
                total.value = 'Rp. ' + totalSubtotal;
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

            if (hasil < 0 || isNaN(hasil)) {
                kembalian.value = 0
                btnCheckout.setAttribute('disabled', true)
            } else {
                bayar1.value = uang;
                kembalian.value = format;
                kembalian1.value = hasil
                btnCheckout.removeAttribute('disabled')
            }
        }

        function deleteCart() {
            localStorage.removeItem('cartRetur');
        }
    </script>
@endsection
