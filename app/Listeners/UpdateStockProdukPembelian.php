<?php

namespace App\Listeners;

use App\Events\TransaksiPembelian;
use App\Models\Produk;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStockProdukPembelian
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransaksiPembelian $event)
    {
        $pembelian = $event->pembelian;

        foreach ($pembelian->details as $detail) {
            $produk = Produk::where('kode_produk', $detail->kode_produk)->first();
            if ($produk) {
                $produk->stock += $detail->jumlah;
                $produk->save();
            }
        }
    }
}
