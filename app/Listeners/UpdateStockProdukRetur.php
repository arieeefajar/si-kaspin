<?php

namespace App\Listeners;

use App\Events\ReturOrder;
use App\Models\Produk;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStockProdukRetur
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
    public function handle(ReturOrder $event)
    {
        $retur = $event->retur;

        foreach ($retur->details as $detail) {
            $produk = Produk::where('kode_produk', $detail->kode_produk)->first();
            if ($produk) {
                $produk->stock += $detail->jumlah;
                $produk->save();
            }
        }
    }
}
