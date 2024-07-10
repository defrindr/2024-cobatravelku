<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';


    protected $fillable = [
        'nomor_polisi',
        'jenis_mobil',
        'kuota',
        'sisa_kuota',
        'harga_travel',
        'harga_barang',
        'tanggal',
        'jam_berangkat',
        'kota_keberangkatan_id',
        'kota_tujuan_id',
    ];

    public function kotaKeberangkatan()
    {
        return $this->belongsTo(KotaKeberangkatan::class);
    }

    public function kotaTujuan()
    {
        return $this->belongsTo(KotaTujuan::class);
    }

    public function travels()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function getEstimasiPembayaranAttribute()
    {
        $travelsPending = $this->travels()->where('status', '=', 'pending')->count() * 10;
        return date("H:i A", strtotime("+ {$travelsPending} minutes"));
    }
}
