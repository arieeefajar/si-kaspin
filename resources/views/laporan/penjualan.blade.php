<table class="table align-middle table-nowrap" id="customerTable">
    <thead class="table-light">
        <tr class="text-center">
            <th class="sort" data-sort="no">No</th>
            <th class="sort" data-sort="kodePenjualan">Kode Penjualan</th>
            <th class="sort" data-sort="namaOperator">Nama Operator</th>
            <th class="sort" data-sort="namaOperator">Nama Pelanggan</th>
            <th class="sort" data-sort="total">Total</th>
            <th class="sort" data-sort="aksi">Aksi</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
        @foreach ($penjualan as $key => $item)
            <tr class="text-center">
                <td class="no">{{ $key + 1 }}</td>
                <td class="id" style="display:none;"><a href="javascript:void(0);"
                        class="fw-medium link-primary">#VZ2101</a></td>
                <td class="kode_penjualan">{{ $item->kode_penjualan }}</td>
                <td class="nama">{{ $item->operator->nama }}</td>
                <td class="pelanggan">{{ $item->pelanggan->nama_pelanggan }}</td>
                <td class="total1">Rp.
                    {{ number_format($item->total, 0, ',', '.') }}</td>
                <td class="total" style="display:none;">{{ $item->total }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <div class="detail">
                            <button class="btn btn-sm btn-success remove-item-btn" data-bs-toggle="modal"
                                data-bs-target="#addModal"
                                onclick="detailPenjualan({{ $item }})">Detail</button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- detail modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="card">
                <div class="card-body table-responsive" id="table-detail">
                    <table class="table table-borderless mb-0">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th class="sort" data-sort="produk">Produk</th>
                                <th class="sort" data-sort="hargaSatuan">Harga Satuan</th>
                                <th class="sort" data-sort="jumlah">Jumlah</th>
                                <th class="sort" data-sort="subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <tr class="text-center">
                                <td class="produk">T-Shirt</td>
                                <td class="hargaSatuan">Rp. 100.000</td>
                                <td class="jumlah">1</td>
                                <td class="subtotal">Rp. 100.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex container" id="detail-penjualan">
                <div class="row g-0 mb-3 flex-grow-1 align-items-center">
                    <div class="col-sm-6 d-flex-column">
                        <div class="info-row">
                            <p><span class="label">Kode Penjualan</span> <span class="value" id="kode-penjualan"> :
                                    #okok</span></p>
                        </div>
                        <div class="info-row">
                            <p><span class="label">Tanggal</span> <span class="value" id="tanggal"> : 16</span>
                            </p>
                        </div>
                        <div class="info-row">
                            <p><span class="label">Operator</span> <span class="value" id="nama-operator"> :
                                    Bintang</span></p>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex-column">
                        <div class="info-row">
                            <p><span class="label">Total</span> <span class="value" id="total"> : #okok</span>
                            </p>
                        </div>
                        <div class="info-row">
                            <p><span class="label">Bayar</span> <span class="value" id="bayar"> : #okok</span>
                            </p>
                        </div>
                        <div class="info-row">
                            <p><span class="label">Kembalian</span> <span class="value" id="kembalian"> :
                                    #okok</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
