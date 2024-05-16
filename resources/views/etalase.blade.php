 @extends('layout.app')
 @section('title', 'Etalase')
 @section('titleHeader', 'Etalase')
 @section('menu', 'Menu')
 @section('subMenu', 'Etalase')
 @section('content')
     <div class="row h-100">
         <div class="col-xl-12">
             <div class="card card-height-100">

                 <!-- card body -->
                 <div class="card-body">
                     <h1 class="card-title mb-0">Etalase</h1>
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
                                     <div class="col-md-3">
                                         <div class="card" id="cardItem" data-bs-toggle="modal"
                                             data-bs-target="#addItemModal">
                                             <div class="row g-0">
                                                 <div class="col-md-12">
                                                     <img class="rounded-start img-fluid h-100 object-cover"
                                                         src="{{ asset('admin_assets/assets/images/small/bata.jpeg') }}"
                                                         alt="Card image">
                                                 </div>
                                                 <div class="col-md-12">
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

                                     <div class="col-md-3">
                                         <div class="card" id="cardItem" data-bs-toggle="modal"
                                             data-bs-target="#addItemModal">
                                             <div class="row g-0">
                                                 <div class="col-md-12">
                                                     <img class="rounded-start img-fluid h-100 object-cover"
                                                         src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                         alt="Card image">
                                                 </div>
                                                 <div class="col-md-12">
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
                                         </div><!-- end row -->
                                     </div><!-- end col -->

                                     <div class="col-md-3">
                                         <div class="card" id="cardItem" data-bs-toggle="modal"
                                             data-bs-target="#addItemModal">
                                             <div class="row g-0">
                                                 <div class="col-md-12">
                                                     <img class="rounded-start img-fluid h-100 object-cover"
                                                         src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                         alt="Card image">
                                                 </div>
                                                 <div class="col-md-12">
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
                                         </div><!-- end row -->
                                     </div><!-- end col -->

                                     <div class="col-md-3">
                                         <div class="card" id="cardItem" data-bs-toggle="modal"
                                             data-bs-target="#addItemModal">
                                             <div class="row g-0">
                                                 <div class="col-md-12">
                                                     <img class="rounded-start img-fluid h-100 object-cover"
                                                         src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                         alt="Card image">
                                                 </div>
                                                 <div class="col-md-12">
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
                                         </div><!-- end row -->
                                     </div><!-- end col -->

                                 </div><!-- end row -->
                             </div><!-- end col -->
                             <div class="row">
                                 <div class="col-12">
                                     <div class="row">
                                         <div class="col-md-3">
                                             <div class="card" id="cardItem" data-bs-toggle="modal"
                                                 data-bs-target="#addItemModal">
                                                 <div class="row g-0">
                                                     <div class="col-md-12">
                                                         <img class="rounded-start img-fluid h-100 object-cover"
                                                             src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                             alt="Card image">
                                                     </div>
                                                     <div class="col-md-12">
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

                                         <div class="col-md-3">
                                             <div class="card" id="cardItem" data-bs-toggle="modal"
                                                 data-bs-target="#addItemModal">
                                                 <div class="row g-0">
                                                     <div class="col-md-12">
                                                         <img class="rounded-start img-fluid h-100 object-cover"
                                                             src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                             alt="Card image">
                                                     </div>
                                                     <div class="col-md-12">
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
                                             </div><!-- end row -->
                                         </div><!-- end col -->

                                         <div class="col-md-3">
                                             <div class="card" id="cardItem" data-bs-toggle="modal"
                                                 data-bs-target="#addItemModal">
                                                 <div class="row g-0">
                                                     <div class="col-md-12">
                                                         <img class="rounded-start img-fluid h-100 object-cover"
                                                             src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                             alt="Card image">
                                                     </div>
                                                     <div class="col-md-12">
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
                                             </div><!-- end row -->
                                         </div><!-- end col -->

                                         <div class="col-md-3">
                                             <div class="card" id="cardItem" data-bs-toggle="modal"
                                                 data-bs-target="#addItemModal">
                                                 <div class="row g-0">
                                                     <div class="col-md-12">
                                                         <img class="rounded-start img-fluid h-100 object-cover"
                                                             src="{{ asset('admin_assets/assets/images/small/img-12.jpg') }}"
                                                             alt="Card image">
                                                     </div>
                                                     <div class="col-md-12">
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
                                             </div><!-- end row -->
                                         </div><!-- end col -->
                                         <ul>
                                             @foreach ($products as $produk)
                                                 <li>{{ $product->name }} - {{ $product->price }}</li>
                                             @endforeach
                                         </ul>

                                     </div> <!-- end card body -->
                                 </div><!-- end card -->
                             </div><!-- end col -->
                         </div><!-- end row -->
                     @endsection

