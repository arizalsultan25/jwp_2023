<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // konfigurasi
    protected $table = "tb_barang";
    protected $primary_key = "kode_barang";
    protected $guarded = [];
    public $timestamps = false;
}
