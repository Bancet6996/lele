<?php

use App\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Aksesoris'],
            ['nama_kategori' => 'Peralatan'],
            ['nama_kategori' => 'Otomotif'],
            ['nama_kategori' => 'Medis'],
            ['nama_kategori' => 'Pakaian'],
        ];
        Kategori::insert($data);
    }
}
