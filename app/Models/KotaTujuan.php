<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaTujuan extends Model
{
    use HasFactory;

    protected $table = 'kota_tujuan'; // Sesuaikan dengan nama tabel di database

    protected $primaryKey = 'id'; // Kolom primary key

    protected $fillable = [
        'id', 'nama_kotaTujuan',
    ];
}
