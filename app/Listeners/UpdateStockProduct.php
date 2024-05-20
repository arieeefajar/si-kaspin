<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Produk;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStockProduct
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
    public function handle(OrderPlaced $event)
    {
        $penjualan = $event->penjualan;

        foreach ($penjualan->details as $detail) {
            $produk = Produk::where('kode_produk', $detail->kode_produk)->first();
            if ($produk) {
                $produk->stock -= $detail->jumlah;
                $produk->save();
            }
        }
    }
}
