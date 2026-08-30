@php
    $items = [
        [
            'icon' => 'heroicon-o-calendar-days',
            'title' => 'Jadwal Ibadah & Kegiatan',
            'text' => 'Tambahkan atau ubah jadwal di menu <strong>Jadwal Ibadah & Kegiatan</strong>. Pastikan opsi <strong>Aktif</strong> dicentang agar tampil di halaman Jadwal dan Beranda. Pilih hari, jenis kegiatan, waktu, lokasi, dan catatan singkat.',
            'color' => 'text-primary-600 dark:text-primary-400',
        ],
        [
            'icon' => 'heroicon-o-newspaper',
            'title' => 'Berita & Renungan',
            'text' => 'Tulis judul, lalu slug URL terisi otomatis (boleh diedit). Gunakan editor untuk isi lengkap, unggah gambar sampul, pilih jenis (Berita/Pengumuman/Renungan), atur tanggal, dan nyalakan <strong>Dipublikasikan</strong> agar tampil di website.',
            'color' => 'text-primary-600 dark:text-primary-400',
        ],
        [
            'icon' => 'heroicon-o-photo',
            'title' => 'Galeri Foto',
            'text' => 'Unggah foto kegiatan jemaat beserta keterangan singkat di menu <strong>Galeri Foto</strong>. Foto yang <strong>Aktif</strong> akan tampil di halaman Galeri dengan tata letak yang rata & responsif.',
            'color' => 'text-primary-600 dark:text-primary-400',
        ],
        [
            'icon' => 'heroicon-o-chat-bubble-left-right',
            'title' => 'Pesan Masuk (Formulir Kontak)',
            'text' => 'Pesan dari formulir halaman Kontak masuk ke menu <strong>Pesan Masuk</strong>. Cek secara berkala dan balas melalui email yang tercantum pada pesan.',
            'color' => 'text-primary-600 dark:text-primary-400',
        ],
    ];
@endphp

<x-filament-widgets::widget class="fi-admin-guide-widget">
    <x-filament::section>
        <x-slot name="heading">
            Panduan Mengelola Website
        </x-slot>
        <x-slot name="description">
            Cara singkat mengelola konten halaman ini lewat panel admin — semua tersedia di menu grup "Kelola Konten"
        </x-slot>

        <div class="grid gap-4 sm:grid-cols-2">
            @foreach($items as $item)
                <div class="rounded-xl bg-gray-50 p-5 ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10">
                    <div class="flex items-center gap-3">
                        <x-filament::icon :icon="$item['icon']" class="h-6 w-6 {{ $item['color'] }}" />
                        <h3 class="text-sm font-semibold text-gray-950 dark:text-white">
                            {{ $item['title'] }}
                        </h3>
                    </div>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        {!! $item['text'] !!}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-4 flex flex-col gap-2 rounded-xl bg-primary-50 p-5 ring-1 ring-primary-100 dark:bg-primary-950/40 dark:ring-primary-700/40 sm:flex-row sm:items-start sm:gap-3">
            <x-filament::icon icon="heroicon-o-light-bulb" class="h-6 w-6 shrink-0 text-primary-600 dark:text-primary-400" />
            <div class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                <strong class="font-semibold text-gray-950 dark:text-white">Catatan:</strong>
                Halaman statis (Beranda, Tentang Kami, dan teks lainnya) dan tata letak website dikelola lewat kode aplikasi, bukan dari panel ini. Konten baru langsung tampil di halaman publik tanpa perlu merombak desain.
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>