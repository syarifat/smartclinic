<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartKlinik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col">
            <div class="p-6 font-bold text-xl border-b border-blue-700">SmartKlinik</div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    Dashboard
                </a>
                <a href="{{ route('pasien.index') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M5.5 21h13a2.5 2.5 0 0 0 2.5 -2.5v-1a6.5 6.5 0 0 0 -13 0v1a2.5 2.5 0 0 0 2.5 2.5z" /></svg>
                    Pasien
                </a>
                <a href="{{ route('kunjungan.index') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /></svg>
                    Kunjungan
                </a>
                <a href="{{ route('pemeriksaan.index') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stethoscope" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 3v6a6 6 0 0 0 12 0V3" /><path d="M8 15a3 3 0 0 0 6 0" /><path d="M8 15v2a4 4 0 0 0 8 0v-2" /></svg>
                    Pemeriksaan
                </a>
                <a href="{{ route('resep.create', ['kunjungan' => 1]) }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-prescription" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 17v-10a4 4 0 0 1 8 0v10" /><path d="M8 17h8" /><path d="M8 21h8" /></svg>
                    Resep
                </a>
                <a href="{{ route('apotek.index') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="8" /><path d="M4 4l16 16" /></svg>
                    Apotek
                </a>
                <a href="{{ route('pembayaran.index') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="8" width="16" height="8" rx="2" /><circle cx="12" cy="12" r="2" /><path d="M4 12h.01" /><path d="M20 12h.01" /></svg>
                    Kasir
                </a>
                <a href="{{ route('kwitansi.riwayat') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="5" y="8" width="14" height="8" rx="2" /><rect x="7" y="16" width="10" height="4" rx="2" /><path d="M7 8V4a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4" /></svg>
                    Cetak Kwitansi
                </a>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
