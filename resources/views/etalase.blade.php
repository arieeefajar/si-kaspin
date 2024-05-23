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
                    <div class="align-items-center d-flex-column">
                        <form action="{{ route('etalase.search') }}" method="GET" class="app-search d-flex">
                            <div class="position-relative">
                                <input type="text" name="" id="" class="form-control rounded-pill"
                                    placeholder="Search...">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    @foreach ($etalase as $item)
                                        <div class="col-md-6">
                                            <div class="card" id="cardItem" data-bs-toggle="modal"
                                                data-bs-target="#addItemModal">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img class="rounded-start img-fluid h-100 object-cover"
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
                                    {!! $etalase->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div>
                <!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div> <!-- end row-->
@endsection
