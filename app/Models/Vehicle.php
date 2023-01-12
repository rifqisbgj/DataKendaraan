<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['no_reg', 'nama_pemilik', 'alamat', 'merk', 'tahun', 'silinder','warna','bahan_bakar'];
    protected $primaryKey = 'no_reg';
    public $incrementing = false;
}
