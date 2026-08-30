<x-layouts.app
    :metaTitle="'Beranda - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="'Selamat datang di Gereja Baptis Indonesia Banyumanik. Lihat jadwal ibadah, berita, renungan, galeri, dan informasi kontak gereja. Melayani Tuhan, Memberkati Bangsa sejak 1975.'"
    :metaKeywords="'Gereja Baptis Indonesia Banyumanik, GBI Banyumanik, beranda gereja, jadwal ibadah, berita gereja, renungan harian, gereja di Semarang'"
    :ogType="'website'"
    :ogImage="asset('images/og-home.jpg')"
    :canonicalUrl="route('home')"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
        $nextService = null;
        if ($schedules->has('Minggu')) {
            $nextService = $schedules->get('Minggu')->first();
        }
    @endphp

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-mist via-white to-white" aria-labelledby="hero-heading">
        {{-- Ornamen cahaya --}}
        <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-[radial-gradient(60%_100%_at_50%_0%,rgba(147,195,253,0.35),transparent_70%)]" aria-hidden="true"></div>
        <div class="absolute -right-32 top-16 hidden h-[26rem] w-[26rem] opacity-60 lg:block" aria-hidden="true">
            <div class="ray-mark h-full w-full text-primary-200"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 pb-20 pt-14 sm:px-6 lg:px-8 lg:pb-28 lg:pt-24">
            <div class="grid items-center gap-14 lg:grid-cols-12">
                <div class="lg:col-span-6 hero-fade" style="animation-delay:0.05s">
                    <p class="section-eyebrow">
                        {!! $sunGlyph !!}
                        Gereja Baptis Indonesia · Sejak 1975
                    </p>
                    <h1 id="hero-heading" class="mt-5 font-display text-[2.6rem] font-bold leading-[1.08] tracking-tight text-ink sm:text-6xl">
                        Melayani Tuhan,
                        <span class="block text-primary-600">Memberkati Bangsa.</span>
                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-ink-soft">
                        Selamat datang di GBI Banyumanik — keluarga iman di Kota Semarang yang bertumbuh dalam kasih Kristus dan terbuka bagi siapa saja.
                    </p>

                    <blockquote class="mt-8 max-w-xl rounded-2xl border-l-2 border-gold bg-mist px-6 py-5">
                        <p class="text-base font-medium italic leading-relaxed text-ink">
                            "Di mana dua atau tiga orang berkumpul dalam nama-Ku, di situ Aku ada di tengah-tengah mereka."
                        </p>
                        <cite class="mt-2 block text-xs font-semibold not-italic uppercase tracking-wider text-primary-700">— Matius 18:20</cite>
                    </blockquote>

                    <div class="mt-9 flex flex-wrap items-center gap-4">
                        <a href="{{ route('schedule') }}" class="inline-flex items-center gap-2 rounded-full bg-primary-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-primary-600/25 transition-all hover:-translate-y-0.5 hover:bg-primary-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Jadwal Ibadah
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-7 py-3.5 text-sm font-semibold text-ink transition-all hover:border-primary-300 hover:text-primary-700">
                            Kunjungi Kami
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6 hero-fade" style="animation-delay:0.2s">
                    <div class="relative mx-auto max-w-xl lg:ml-auto">
                        <div class="absolute -inset-6 -z-10 rounded-[2rem] bg-gradient-to-br from-primary-200/50 via-primary-100/30 to-gold-soft/50 blur-2xl" aria-hidden="true"></div>

                        <figure class="relative overflow-hidden rounded-[1.75rem] shadow-2xl shadow-primary-900/20 ring-1 ring-line">
                            <img
                                src="{{ asset('images/hero.jpg') }}"
                                alt="Jemaat GBI Banyumanik beribadah bersama dengan sukacita"
                                class="aspect-[5/4] w-full object-cover"
                                width="1200"
                                height="800"
                                fetchpriority="high"
                                decoding="async"
                            >
                            <figcaption class="pointer-events-none absolute inset-x-0 bottom-0 bg-gradient-to-t from-ink/70 to-transparent px-6 pb-5 pt-16 text-white">
                                <p class="font-display text-sm font-semibold">Beribadah bersama sebagai keluarga</p>
                            </figcaption>
                        </figure>

                        @if($nextService)
                            <div class="absolute -bottom-6 -left-3 flex items-center gap-3 rounded-2xl bg-white p-4 pr-6 shadow-xl shadow-primary-900/10 ring-1 ring-line sm:-left-8">
                                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 text-primary-50">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-[0.7rem] font-semibold uppercase tracking-wider text-ink-soft">Ibadah Minggu</p>
                                    <p class="font-display text-base font-bold text-ink">07.00 &amp; 10.00 WIB</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JADWAL IBADAH SINGKAT --}}
    <section class="bg-white py-20 lg:py-24" aria-labelledby="home-schedule-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Ibadah Mingguan</p>
                <h2 id="home-schedule-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Jadwal Ibadah</h2>
                <p class="mt-4 text-lg text-ink-soft">Ikutlah beribadah dan bersekutu bersama kami</p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-3">
                @forelse($schedules as $day => $daySchedules)
                    <article class="reveal rounded-3xl bg-white p-7 ring-1 ring-line shadow-[0_18px_50px_-30px_rgba(14,42,78,0.4)]">
                        <div class="flex items-center justify-between gap-3 border-b border-line pb-4">
                            <h3 class="font-display text-xl font-bold text-ink">Hari {{ $day }}</h3>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold text-primary-700">
                                {{ $daySchedules->count() }} jadwal
                            </span>
                        </div>
                        <ul class="mt-4 space-y-4">
                            @foreach($daySchedules as $schedule)
                                <li class="flex items-start gap-4">
                                    <span class="mt-0.5 inline-flex w-16 flex-shrink-0 items-center justify-center rounded-xl bg-mist px-2 py-1.5 text-sm font-bold tabular-nums text-primary-700 ring-1 ring-line">
                                        {{ $schedule->start_time->format('H.i') }}
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold leading-snug text-ink">{{ $schedule->name }}</p>
                                        <p class="mt-0.5 text-xs text-ink-soft">{{ $schedule->location ?? 'Gedung Utama' }} · {{ $schedule->end_time?->format('H.i') }} WIB</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @empty
                    <div class="col-span-full rounded-3xl bg-white p-12 text-center ring-1 ring-line">
                        <p class="text-ink-soft">Belum ada jadwal ibadah yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 text-center reveal">
                <a href="{{ route('schedule') }}" class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-7 py-3.5 text-sm font-semibold text-ink transition-all hover:border-primary-300 hover:text-primary-700">
                    Lihat semua jadwal &amp; kegiatan
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- STRIP AYAT: signature --}}
    <section class="relative overflow-hidden bg-ink py-20 lg:py-24" aria-labelledby="verse-heading">
        <div class="ray-mark pointer-events-none absolute -left-28 -top-28 h-[24rem] w-[24rem] text-primary-900/50" aria-hidden="true"></div>
        <div class="absolute right-10 top-1/2 hidden -translate-y-1/2 lg:block" aria-hidden="true">
            <div class="ray-mark h-64 w-64 text-gold/20"></div>
        </div>
        <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <p class="section-eyebrow justify-center text-primary-300">{!! $sunGlyph !!} Firman bagi kita</p>
            <h2 id="verse-heading" class="mt-6 font-display text-3xl font-bold leading-snug text-white sm:text-4xl">
                "Kamu adalah terang dunia. Kota yang terletak di atas gunung tidak mungkin tersembunyi."
            </h2>
            <p class="mt-6 text-sm font-semibold uppercase tracking-[0.25em] text-gold">— Matius 5:14</p>
        </div>
    </section>

    {{-- BERITA & RENUNGAN --}}
    <section class="bg-mist py-20 lg:py-24" aria-labelledby="home-news-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between reveal">
                <div class="max-w-xl">
                    <p class="section-eyebrow">{!! $sunGlyph !!} Terbaru dari Gereja</p>
                    <h2 id="home-news-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Berita &amp; Renungan</h2>
                    <p class="mt-4 text-lg text-ink-soft">Pengumuman, refleksi, dan kabar dari keluarga jemaat</p>
                </div>
                <a href="{{ route('news.index') }}" class="inline-flex flex-shrink-0 items-center gap-2 rounded-full border border-line bg-white px-6 py-3 text-sm font-semibold text-ink transition-all hover:border-primary-300 hover:text-primary-700">
                    Lihat semua
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            @if($latestNews->isNotEmpty())
                <div class="mt-12 grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($latestNews as $item)
                        <article class="reveal group flex flex-col overflow-hidden rounded-3xl bg-white ring-1 ring-line transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-900/10">
                            <a href="{{ route('news.show', $item->slug) }}" class="block">
                                <div class="relative aspect-[4/3] overflow-hidden bg-primary-100">
                                    @if($item->image)
                                        <img
                                            src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item->title }}"
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            loading="lazy"
                                            width="800"
                                            height="600"
                                            decoding="async"
                                        >
                                    @else
                                        <svg class="absolute inset-0 m-auto h-16 w-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    @endif
                                    <span class="absolute left-3 top-3 rounded-full px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-wide backdrop-blur {{ $item->getTypeBadgeClass() }} text-white">{{ \Illuminate\Support\Str::title($item->type) }}</span>
                                </div>
                                <div class="flex flex-1 flex-col p-5">
                                    <time class="text-xs font-medium uppercase tracking-wider text-ink-soft" datetime="{{ $item->published_at?->format('Y-m-d') ?? $item->created_at->format('Y-m-d') }}">
                                        {{ ($item->published_at ?? $item->created_at)->format('d M Y') }}
                                    </time>
                                    <h3 class="mt-2.5 font-display text-base font-bold leading-snug text-ink line-clamp-2">{{ $item->title }}</h3>
                                    <p class="mt-2 flex-1 text-sm leading-relaxed text-ink-soft line-clamp-3">{{ $item->excerpt ?: Str::limit(strip_tags($item->content), 140) }}</p>
                                    <span class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-primary-700">
                                        Baca selengkapnya
                                        <svg class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="mt-12 rounded-3xl bg-white p-16 text-center ring-1 ring-line">
                    <p class="text-ink-soft">Belum ada berita atau renungan yang dipublikasikan.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA KUNJUNGI KAMI --}}
    <section class="bg-white pb-20 lg:pb-24" aria-labelledby="home-cta-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal relative overflow-hidden rounded-[2rem] bg-ink">
                <img
                    src="{{ asset('images/about.jpg') }}"
                    alt=""
                    aria-hidden="true"
                    class="absolute inset-0 h-full w-full object-cover opacity-25"
                    loading="lazy"
                    width="1280"
                    height="960"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-br from-ink/85 via-ink/70 to-primary-900/60" aria-hidden="true"></div>
                <div class="absolute -right-16 -top-16 h-64 w-64" aria-hidden="true">
                    <div class="ray-mark h-full w-full text-gold/15"></div>
                </div>

                <div class="relative px-8 py-16 text-center sm:px-16 lg:py-20">
                    <p class="section-eyebrow justify-center text-primary-200">{!! $sunGlyph !!} Kami menantikan Anda</p>
                    <h2 id="home-cta-heading" class="mt-5 font-display text-3xl font-bold tracking-tight text-white sm:text-4xl">Kunjungi Kami di Banyumanik</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-primary-100">
                        Ibadah Minggu pukul 07.00 dan 10.00 WIB. Kami siap menyambut Anda, baik sebagai tamu maupun jemaat yang kembali berikutnya.
                    </p>
                    <div class="mt-9 flex flex-wrap items-center justify-center gap-4">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-ink transition-all hover:-translate-y-0.5 hover:bg-primary-50">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Kirim Pesan
                        </a>
                        <a href="{{ route('contact') }}#map-heading" class="inline-flex items-center gap-2 rounded-full border border-white/30 px-7 py-3.5 text-sm font-semibold text-white transition-colors hover:bg-white/10">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Lihat Lokasi
                        </a>
                    </div>
                    <p class="mt-8 flex items-center justify-center gap-2 text-sm text-primary-100/90">
                        <svg class="h-4 w-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Jl. Raya Banyumanik No. 123, Banyumanik, Semarang, Jawa Tengah
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>