<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    protected $table = 'lelang';
    protected $fillable = ['harga_akhir', 'status', 'id_user', 'id_barang'];
}
