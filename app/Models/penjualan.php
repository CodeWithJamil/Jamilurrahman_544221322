<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'kategori', 'harga'];
    protected $table = 'penjualan';
    public $timestamps = false;
}
