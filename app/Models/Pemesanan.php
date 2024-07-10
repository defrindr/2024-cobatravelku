<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [
        'ref_code',
        'customer_id',
        'jadwal_id',
        'jumlah_kursi',
        'jumlah_bayar',
        'bukti_bayar',
        'nomor_telepon',
        'lokasi_penjemputan',
        'lokasi_pengantaran',
        'bisa_bayar',
        'waktu_mulai_bayar',
        'waktu_selesai_bayar',
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
