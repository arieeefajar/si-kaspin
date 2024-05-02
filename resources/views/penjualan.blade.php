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
@endsection
