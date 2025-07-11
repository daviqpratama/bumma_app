<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Selamat Datang di Dashboard User</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Daftar Usaha -->
        <a href="{{ route('daftar_usaha') }}" class="block p-6 bg-green-100 rounded-lg shadow hover:bg-green-200 transition">
            <h3 class="text-xl font-semibold mb-2">📋 Daftar Usaha</h3>
            <p>Lihat daftar usaha yang terdaftar dalam BUMMA.</p>
        </a>

        <!-- Riwayat Transaksi -->
        <a href="{{ route('riwayat_transaksi') }}" class="block p-6 bg-blue-100 rounded-lg shadow hover:bg-blue-200 transition">
            <h3 class="text-xl font-semibold mb-2">💳 Riwayat Transaksi</h3>
            <p>Lacak riwayat transaksi Anda dengan mudah.</p>
        </a>

        <!-- Distribusi Dana Sosial -->
        <a href="{{ route('distribusi_dana_sosial') }}" class="block p-6 bg-yellow-100 rounded-lg shadow hover:bg-yellow-200 transition">
            <h3 class="text-xl font-semibold mb-2">🤝 Distribusi Dana Sosial</h3>
            <p>Informasi seputar distribusi dana sosial yang telah dilakukan.</p>
        </a>

        <!-- Laporan Kinerja -->
        <a href="{{ route('laporan.kinerja') }}" class="block p-6 bg-purple-100 rounded-lg shadow hover:bg-purple-200 transition">
            <h3 class="text-xl font-semibold mb-2">📈 Laporan Kinerja</h3>
            <p>Lihat laporan kinerja unit usaha.</p>
        </a>
    </div>
</div>
