<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // jumlah penjualan
        $jumlahPenjualan = DetailPenjualan::sum('jumlah');

        // jumlah pembelian
        $jumlahPembelian = DetailPembelian::sum('jumlah');

        // total penjualan
        $totalPenjualan = Penjualan::sum('total');

        // total pembelian
        $totalPembelian = Pembelian::sum('total');

        // total kerugian
        $totalKerugian = $totalPembelian - $totalPenjualan;

        // total laba
        $totalLaba = $totalPenjualan - $totalPembelian;

        // kategori produk
        $produkPerKategori = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')
            ->select('kategori_produks.nama_kategori', \DB::raw('COUNT(kode_produk) as jumlah_produk'))
            ->groupBy('kategori_produks.nama_kategori')
            ->get();

        $kategoriProdukData = [];
        $kategoriProdukLabel = [];

        foreach ($produkPerKategori as $produk) {
            $kategoriProdukLabel[] = $produk->nama_kategori;
            $kategoriProdukData[] = $produk->jumlah_produk;
        }

        // $kategoriProduk = KategoriProduk::all();
        // $produkPerKategori = [];
        // foreach ($kategoriProduk as $kategori) {
        //$produk = Produk::where('kode_kategori', $kategori->kode_kategori)->count();
        //$produkPerKategori[] = $produk;
        //}

        //$kategoriProdukLabel = $kategoriProduk->pluck('nama_kategori');
        //$kategoriProdukData = $produkPerKategori;

        // best seller
        $bestSeller = DetailPenjualan::select('kode_produk', DB::raw('SUM(jumlah) as total_penjualan'))
            ->groupBy('kode_produk')
            ->orderByDesc('total_penjualan')
            ->limit(5)
            ->get();

        $produkBestSeller = [];
        foreach ($bestSeller as $item) {
            $produk = Produk::find($item->kode_produk);
            if ($produk) {
                $produkBestSeller[] = [
                    'nama_produk' => $produk->nama_produk,
                    'jumlah' => $item->total_penjualan
                ];
            }
        }

        // t.penjualan
        // Mengambil bulan dan tahun dari request, default ke bulan dan tahun saat ini
        $bulanPenjualan = $request->input('bulan_penjualan', Carbon::now()->month);
        $tahunPenjualan = $request->input('tahun_penjualan', Carbon::now()->year);

        // Mengambil data penjualan per produk untuk bulan yang dipilih
        $salesData = DetailPenjualan::join('penjualans', 'detail_penjualans.kode_penjualan', '=', 'penjualans.kode_penjualan')
            ->join('produks', 'detail_penjualans.kode_produk', '=', 'produks.kode_produk')
            ->whereYear('penjualans.created_at', $tahunPenjualan)
            ->whereMonth('penjualans.created_at', $bulanPenjualan)
            ->selectRaw('produks.nama_produk, SUM(detail_penjualans.jumlah) as total')
            ->groupBy('produks.nama_produk')
            ->pluck('total', 'produks.nama_produk');

        // Format data untuk Chart.js
        $namaProduk = $salesData->keys()->toArray();
        $jumlahProduk = $salesData->values()->toArray();

        // t.pembelian
        // Mengambil bulan dan tahun dari request, default ke bulan dan tahun saat ini
        $bulanPembelian = $request->input('bulan_pembelian', Carbon::now()->month);
        $tahunPembelian = $request->input('tahun_pembelian', Carbon::now()->year);

        // Mengambil data pembelian per produk untuk bulan yang dipilih
        $purchaseData = DetailPembelian::join('pembelians', 'detail_pembelians.kode_pembelian', '=', 'pembelians.kode_pembelian')
            ->join('produks', 'detail_pembelians.kode_produk', '=', 'produks.kode_produk')
            ->whereYear('pembelians.created_at', $tahunPembelian)
            ->whereMonth('pembelians.created_at', $bulanPembelian)
            ->selectRaw('produks.nama_produk, SUM(detail_pembelians.jumlah) as total')
            ->groupBy('produks.nama_produk')
            ->pluck('total', 'produks.nama_produk');

        // Format data untuk Chart.js
        $nmProduk = $purchaseData->keys()->toArray();
        $jmlProduk = $purchaseData->values()->toArray();

        return view('dashboard', compact(
            'jumlahPenjualan',
            'jumlahPembelian',
            'totalPenjualan',
            'totalPembelian',
            'totalKerugian',
            'totalLaba',
            'kategoriProdukLabel',
            'kategoriProdukData',
            'produkBestSeller',
            'namaProduk',
            'jumlahProduk',
            'bulanPenjualan',
            'tahunPenjualan',
            'nmProduk',
            'jmlProduk',
            'bulanPembelian',
            'tahunPembelian'
        ));
    }
}
