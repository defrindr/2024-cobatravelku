<!-- resources/views/halamandepan/profil.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil - Lentera Jaya Travel</title>

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
    <header class="fixed-header flex justify-between items-center p-4">
        <h1 class="text-3xl font-bold underline">
            <a href="/" class="text-white hover:text-gray-300">Lentera Jaya Travel</a>
        </h1>
        <nav class="space-x-4">
        <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="text-center">
            <h2 class="text-4xl font-semibold mb-4">Profil</h2>
            <p class="text-lg mb-8">Informasi tentang profil perusahaan Lentera Jaya Travel.</p>
            <a href="/" class="bg-white text-black px-4 py-2 rounded-full hover-bg-darker-blue">Kembali ke Beranda</a>
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
