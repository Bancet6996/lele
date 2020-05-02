<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Bantal', 'harga_awal' => '14000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/single_product_1.png', 'kategori' => 'Peralatan'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Pillow', 'harga_awal' => '7000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product_list_8.png', 'kategori' => 'Peralatan'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Karpet', 'harga_awal' => '35000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/single_product_3.png', 'kategori' => 'Peralatan'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Jam Tangan', 'harga_awal' => '42000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product1.png', 'kategori' => 'Aksesoris'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Power Bank', 'harga_awal' => '28000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product8.png', 'kategori' => 'Elektronik'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Mobil', 'harga_awal' => '2100000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product6.png', 'kategori' => 'Otomotif'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Tas', 'harga_awal' => '56000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product5.png', 'kategori' => 'Peralatan'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Sepatu', 'harga_awal' => '70000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/feature_3.png', 'kategori' => 'Pakaian'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Black Pillow', 'harga_awal' => '21000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product_list_2.png', 'kategori' => 'Peralatan'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'White and Gold Pillow', 'harga_awal' => '21000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product_list_1.png',  'kategori' => 'Peralatan'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Topi', 'harga_awal' => '21000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/arrivel_1.png', 'kategori' => 'Aksesoris'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Combined Cloth', 'harga_awal' => '49000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/arrivel_2.png', 'kategori' => 'Pakaian'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Elegant Shoes', 'harga_awal' => '49000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/arrivel_5.png', 'kategori' => 'Pakaian'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Si Biru Aneh', 'harga_awal' => '63000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product7.png', 'kategori' => 'Elektronik'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Salep', 'harga_awal' => '21000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product2.png', 'kategori' => 'Medis'],
            ['definisi_barang' => 'Definisi', 'deskripsi_barang' => 'Deskripsi', 'id_user' => '1', 'nama_barang' => 'Lamp Holder', 'harga_awal' => '49000', 'gambar_barang' => 'http://127.0.0.1:8000/gambar_barang/product3.png', 'kategori' => 'Elektronik'],
        ];
        Barang::insert($data);
    }
}
