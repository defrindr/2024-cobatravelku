<?php

namespace App\Console\Commands;

use App\Models\Pemesanan;
use Illuminate\Console\Command;

class TransaksiCek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:cek';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cek pembayaran pending';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pemesanan = Pemesanan::where('status', '=', 'pending')
            ->where('bisa_bayar', 1)
            ->where('waktu_selesai_bayar', '<', date('H:i:s'))
            ->get();

        foreach ($pemesanan as $item) {
            $hasNext = Pemesanan::where([
                'jadwal_id' => $item->jadwal_id,
                'status' => 'pending',
            ])->where('id', '!=', $item->id)->first();

            if ($hasNext) {
                $hasNext->update([
                    'bisa_bayar' => 1,
                    'waktu_mulai_bayar' => date('H:i:s'),
                    'waktu_selesai_bayar' => date('H:i:s', strtotime('+ 10 minutes'))
                ]);
            }
            $item->delete();
        }
        return Command::SUCCESS;
    }
}
