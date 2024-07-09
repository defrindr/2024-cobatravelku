<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lentera Jaya Travel</title>

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
        .fixed-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #3490dc;
        }
        body {
            padding-top: 4rem; /* Adjust this value based on the header height */
        }
    </style>
</head>
<body class="antialiased bg-bright-blue text-white">

    <!-- Header -->
    <header class="fixed-header flex justify-between items-center p-4">
    <h1 class="text-xl font-semibold underline font-sans">
    <a href="/" class="text-white hover:text-gray-300">Lentera Jaya Travel</a>
</h1>
        <nav class="space-x-4">
        <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="text-center">
            <h2 class="text-4xl font-semibold mb-4">Welcome to Lentera Jaya Travel</h2>
            <p class="text-lg mb-8">Explore the world with us. Your adventure starts here.</p>
            <a href="#services" class="bg-white text-black px-4 py-2 rounded-full hover-bg-darker-blue">Learn More</a>
        </div>
    </div>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-white text-gray-900">
        <div class="max-w-6xl mx-auto px-4">
            <h3 class="text-3xl font-semibold text-center mb-12">Experience Our Selection</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-6 border rounded-lg shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">
                        <a href="{{ route('profil') }}" class="text-blue-500 hover:underline">Profil</a>
                    </h4>
                    <p class="text-gray-600">Informasi tentang profil perusahaan.</p>
                </div>
                <div class="p-6 border rounded-lg shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">
                        <a href="{{ route('carapemesanan') }}" class="text-blue-500 hover:underline">Cara Pemesanan</a>
                    </h4>
                    <p class="text-gray-600">Informasi tentang cara memesan layanan kami.</p>
                </div>
                <div class="p-6 border rounded-lg shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">Lokasi</h4>
                    <p class="text-gray-600">Lokasi kantor dan area layanan kami.</p>
                    <a href="https://maps.app.goo.gl/z9YAcSpqgBULEayi9" target="_blank" class="text-blue-500 hover:underline">Lihat di Google Maps</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-bright-blue text-white py-4">
        <div class="text-center">
            <p>&copy; 2024 Lentera Jaya Travel. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
