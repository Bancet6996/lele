<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $fillable = ['jawaban', 'id_pertanyaan', 'id_barang', 'id_user'];
}
