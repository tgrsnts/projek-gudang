<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaBarang extends Model
{
    use HasFactory;
    protected $table = "nama_barangs";
    protected $guarded = ['id'];
}
