<x-layouts.app
    :metaTitle="'Jadwal Ibadah & Kegiatan - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="'Jadwal lengkap ibadah mingguan dan kegiatan rutin Gereja Baptis Indonesia Banyumanik: Ibadah Pagi, Ibadah Siang, Sekolah Minggu, Persekutuan Doa, GEREP, dan kegiatan khusus.'"
    :metaKeywords="'jadwal ibadah gereja, ibadah minggu, sekolah minggu, persekutuan doa, GEREP, jadwal kegiatan gereja, GBI Banyumanik'"
    :ogType="'website'"
    :ogImage="asset('images/og-schedule.jpg')"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
        $eventIcons = [
            'calendar' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'gift' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8v13h18V8M3 4h18v4H3zM12 4v17M12 4a2 2 0 10-2-2M12 4a2 2 0 11 2-2" />',
            'sun' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v2m0 14v2m9-9h-2M5 12H3m14.4-5.4l-1.4 1.4M8 15.6l-1.4 1.4m0-10L8 8.4m8 7.2l1.4 1.4M12 8a4 4 0 100 8 4 4 0 000-8z" />',
            'sparkles' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3zm7 11l.9 2.1L22 17l-2.1.9L19 20l-.9-2.1L16 17l2.1-.9L19 14z" />',
        ];
    @endphp

    {{-- Page header --}}
    <section class="relative overflow-hidden border-b border-line bg-gradient-to-b from-mist to-white" aria-labelledby="schedule-heading">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-[radial-gradient(60%_100%_at_50%_0%,rgba(147,195,253,0.35),transparent_70%)]" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Mari Bersekutu</p>
            <h1 id="schedule-heading" class="mt-5 font-display text-4xl font-bold tracking-tight text-ink sm:text-5xl">Jadwal Ibadah &amp; Kegiatan</h1>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-ink-soft">Ibadah mingguan dan kegiatan rutin yang terbuka bagi jemaat maupun tamu.</p>
        </div>
    </section>

    {{-- Jadwal per hari --}}
    <section class="bg-white py-20 lg:py-24" aria-labelledby="weekly-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Rutin Mingguan</p>
                <h2 id="weekly-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Ibadah &amp; Kegiatan Rutin</h2>
            </div>

            <div class="mt-14 grid gap-6 lg:grid-cols-3">
                @forelse($schedules as $day => $daySchedules)
                    <article class="reveal overflow-hidden rounded-3xl bg-white ring-1 ring-line shadow-[0_18px_50px_-30px_rgba(14,42,78,0.4)] {{ $day === 'Minggu' ? 'lg:order-2' : ($day === 'Rabu' ? 'lg:order-1' : 'lg:order-3') }}">
                        @if($day === 'Minggu')
                            <div class="h-1 w-full bg-gradient-to-r from-gold via-gold-soft to-primary-600" aria-hidden="true"></div>
                        @endif
                        <header class="flex items-center justify-between gap-3 border-b border-line bg-mist px-7 py-5">
                            <h3 class="font-display text-xl font-bold text-ink">Hari {{ $day }}</h3>
                            <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold text-primary-700 ring-1 ring-primary-100">{{ $daySchedules->count() }} kegiatan</span>
                        </header>
                        <ul class="divide-y divide-line/70">
                            @foreach($daySchedules as $schedule)
                                <li class="flex items-start gap-4 px-7 py-5">
                                    <span class="mt-0.5 inline-flex flex-shrink-0 flex-col items-center rounded-xl bg-primary-600 px-3 py-2 text-primary-50">
                                        <span class="text-base font-bold leading-none tabular-nums">{{ $schedule->start_time->format('H.i') }}</span>
                                        <span class="mt-1 text-[0.65rem] font-medium uppercase tracking-wide opacity-80">{{ $schedule->end_time?->format('H.i') }}</span>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-ink">{{ $schedule->name }}</p>
                                        <p class="mt-1 flex items-center gap-1.5 text-xs text-ink-soft">
                                            <svg class="h-3.5 w-3.5 flex-shrink-0 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $schedule->location ?? 'Gedung Utama' }}
                                        </p>
                                        @if($schedule->description)
                                            <p class="mt-1.5 text-xs leading-relaxed text-ink-soft">{{ $schedule->description }}</p>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @empty
                    <div class="col-span-full rounded-3xl bg-white p-14 text-center ring-1 ring-line">
                        <p class="text-ink-soft">Belum ada jadwal yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            {{-- Catatan --}}
            <div class="reveal mt-12 space-y-3 rounded-3xl bg-mist p-8 ring-1 ring-line sm:p-10">
                @foreach([
                    'Jadwal dapat berubah sewaktu-waktu, silakan cek pengumuman terbaru di halaman Berita.',
                    'Untuk ibadah hari besar (Natal, Paskah), jadwal khusus akan diumumkan 2 minggu sebelumnya.',
                    'Sekolah Minggu anak & remaja berjalan bersamaan dengan Ibadah Siang (10.00 WIB).',
                ] as $note)
                    <p class="flex items-start gap-3 text-sm leading-relaxed text-ink-soft">
                        <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-primary-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ $note }}</span>
                    </p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Kegiatan khusus --}}
    <section class="bg-mist py-20 lg:py-24" aria-labelledby="special-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Sepanjang Tahun</p>
                <h2 id="special-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Kegiatan Khusus &amp; Musiman</h2>
                <p class="mt-4 text-lg text-ink-soft">Momen-momen istimewa yang kami rayakan bersama</p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2">
                @foreach($specialEvents as $event)
                    <article class="reveal group flex items-start gap-5 rounded-3xl bg-white p-7 ring-1 ring-line transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-900/10">
                        <span class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 text-primary-700 ring-1 ring-primary-100 transition-transform duration-300 group-hover:-rotate-6">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">{!! $eventIcons[$event['icon']] ?? $eventIcons['calendar'] !!}</svg>
                        </span>
                        <div>
                            <h3 class="font-display text-lg font-bold text-ink">{{ $event['title'] }}</h3>
                            <p class="mt-1.5 text-sm leading-relaxed text-ink-soft">{{ $event['description'] }}</p>
                            <p class="mt-3 inline-flex items-center gap-1.5 rounded-full bg-mist px-3 py-1 text-xs font-semibold text-primary-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $event['date'] }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>