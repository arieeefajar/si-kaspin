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
                        <button class="btn btn-success w-100" id="btnSimpan" hidden>Lanjutkan</button>
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
@endsection

@section('otherJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getCartItem();
        })

        function inputAngka(input) {
            input.value = input.value.replace(/\D/g, '');
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
    </script>
@endsection
