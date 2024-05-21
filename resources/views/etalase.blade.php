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
                    <h1 class="card-title mb-2">Etalase</h1>
                    <div class="align-items-center d-flex-column">

                        <form action="{{ route('etalase.search') }}" method="GET" class="input-group mb-3">
                            <div class="input-group">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" name="cari" id="produk"
                                            class="form-control rounded-pill" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row d-flex">
                            @foreach ($etalase as $item)
                                <div class="col-6">
                                    <div class="card">
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
                                {!! $etalase->withQueryString()->links('pagination::bootstrap-5') !!}
                            @endforeach
                        </div><!-- end row -->

                        {{-- <div class="row d-flex">
                            <div class="row my-3">
                                @foreach ($etalase as $item)
                                    <div class="col-3">
                                        <div class="row g-0">
                                            <div class="card">
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
                        </div><!-- end col --> --}}
                    </div><!-- end row -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
