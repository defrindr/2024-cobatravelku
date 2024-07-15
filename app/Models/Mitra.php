<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    
    protected $fillable = [
        'id',
        'user_id',
        'alamat',
        'no_telepon',
        'nomor_polisi',
        'jenis_mobil',
        'harga_sewa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
