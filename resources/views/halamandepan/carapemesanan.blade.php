<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cara Pemesanan - Lentera Jaya Travel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .bg-bright-blue {
            background-color: #3490dc; /* Tailwind blue-500 */
        }
        .hover-bg-darker-blue:hover {
            background-color: #2779bd; /* Tailwind blue-700 */
        }
    </style>
</head>
<body class="antialiased bg-bright-blue text-white">

    <!-- Header -->
    <header class="fixed-header flex justify-between items-center p-4 bg-bright-blue">
        <h1 class="text-3xl font-bold underline">
            <a href="/" class="text-white hover:text-gray-300">Lentera Jaya Travel</a>
        </h1>
        <nav class="space-x-4">
        <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen pt-16 px-4">
        <div class="bg-white text-gray-900 rounded-lg shadow-lg p-8 w-full max-w-4xl">
            <h2 class="text-4xl font-semibold mb-8 text-center text-bright-blue">Cara Pemesanan</h2>
            <div class="space-y-6">
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Cari Tiket</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> 
                    Mulai pencarian Anda dengan memasukkan kota asal, kota Tujuan dan tanggal.
                </p>
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Lihat dan Pilih Tiket</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    Detail tiket (jurusan, jadwal, harga tiket, dll.) dapat Anda lihat di halaman hasil pencarian.<br>
                    Atau dapat juga dilihat pada menu Service Jadwal.
                </p>
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Pilih dan Pesan Tiket</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    Untuk dapat melakukan pemesanan Anda harus melakukan <b class="text-red-500">Login</b> atau <b class="text-red-500">Daftar Akun</b> jika belum memiliki Akun.
                    Anda juga dapat memilih <b class="text-red-500">Lupa Password</b> jika Anda lupa password akun Anda, kemudian masukkan email Anda maka notifikasi password baru akan terkirim langsung ke email Anda.
                </p>
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Isi Data Penumpang</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    Setelah memilih Tiket Anda, isi data pemesan yang dapat dihubungi dan data penumpang yang berangkat.
                </p>
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Lakukan Pembayaran</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    Pembayaran dan konfirmasi pembayaran dilakukan setelah pemesan tiket, paling lambat 1 jam setelah dilakukan pemesanan.
                    Jika tidak maka pemesanan akan otomatis terhapus.
                </p>
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Lakukan Konfirmasi Pembayaran</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    Untuk melakukan konfirmasi pembayaran klik tombol <b class="text-red-500">Belum Bayar</b>.<br>
                    Setelah melakukan konfirmasi pembayaran maka status pembayaran Anda otomatis menjadi <b class="text-blue-500">Dalam Proses</b>.
                </p>
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <strong>Cetak Tiket</strong><br>
                    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                    Cetak tiket dapat dilakukan setelah Kami mencocokkan data konfirmasi pemesanan Anda dan status pembayaran Anda <b class="text-green-500">Lunas</b>.
                </p>
                <div class="alert alert-danger" role="alert">
                    <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <strong>Batal Pesan</strong><br>
                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                        Pembatalan pemesanan hanya dapat dilakukan pada pemesanan yang belum dilakukan konfirmasi pembayaran.
                    </p>
                    <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <strong>Konfirmasi Pembayaran Tidak Sesuai / Palsu</strong><br>
                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                        Apabila konfirmasi pembayaran yang dilakukan sudah Kami cek namun <b class="text-red-500">tidak sesuai</b> maka pemesanan 
                        Anda akan kami hapus dari daftar dan pemberitahuan dugaan pemalsuan konfirmasi pembayaran akan terkirim ke email Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-bright-blue text-white py-4">
        <div class="text-center">
            <p>&copy; 2024 Lentera Jaya Travel. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
