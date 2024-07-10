<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer'; // Sesuaikan dengan nama tabel di database

    protected $primaryKey = 'id'; // Kolom primary key

    protected $fillable = [
        'id',
        'user_id',
        'alamat',
        'nomor_telepon',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
