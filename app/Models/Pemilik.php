<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'pemilik';

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
