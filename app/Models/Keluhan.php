<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $table = 'keluhan'; // Sesuaikan dengan nama tabel di database

    protected $primaryKey = 'id'; // Kolom primary key

    protected $fillable = [
        'id',
        'nama_customer',
        'keluhan',
    ];
}
