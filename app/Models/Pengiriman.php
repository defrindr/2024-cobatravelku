<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';

    protected $fillable = [
        'ref_code',
        'customer_id',
        'jadwal_id',
        'jumlah_bayar',
        'bukti_bayar',
        'nomor_telepon',
        'lokasi_penjemputan',
        'lokasi_pengantaran',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
