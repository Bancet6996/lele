<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'harga_awal',  'definisi_barang', 'deskripsi_barang', 'gambar_barang', 'id_user', 'kategori'];
}
