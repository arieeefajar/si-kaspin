@extends('layout.app')
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
                                    <div class="col-md-6">
                                        <div class="card" id="cardItem" data-bs-toggle="modal"
                                            data-bs-target="#addItemModal">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img class="rounded-start img-fluid h-100 object-cover"
                                                        src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                        alt="Card image">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Batako Kotak Biasa</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text mb-2">Rp. 10.000</p>
                                                        <p class="card-text"><small class="text-muted">Bata | Stok:
                                                                40</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img class="rounded-start img-fluid h-100 object-cover"
                                                        src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                        alt="Card image">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Batako Kotak Biasa</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text mb-2">Rp. 10.000</p>
                                                        <p class="card-text"><small class="text-muted">Bata | Stok:
                                                                40</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img class="rounded-start img-fluid h-100 object-cover"
                                                        src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                        alt="Card image">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Batako Kotak Biasa</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text mb-2">Rp. 10.000</p>
                                                        <p class="card-text"><small class="text-muted">Bata | Stok:
                                                                40</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    </div><!-- end col -->
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
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Retur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);">
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
                                        placeholder="Masukan Jumlah">
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label class="form-label">Total Harga<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="disableInput" value="Rp. 3000" disabled>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
