<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatLelang extends Model
{
    protected $table = 'riwayat_lelang';
    protected $fillable = ['nominal', 'id_lelang', 'id_barang', 'id_user',];
}
