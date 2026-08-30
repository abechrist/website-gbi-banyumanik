<x-layouts.app
    :metaTitle="'Tentang Kami - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="'Sejarah, visi, misi, dan struktur kepengurusan Gereja Baptis Indonesia Banyumanik. Melayani Tuhan, Memberkati Bangsa sejak 1975.'"
    :metaKeywords="'Gereja Baptis Indonesia Banyumanik, sejarah gereja, visi misi gereja, struktur kepengurusan, pendeta, majelis jemaat'"
    :ogType="'website'"
    :ogImage="asset('images/og-about.jpg')"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
    @endphp

    {{-- Page header --}}
    <section class="relative overflow-hidden border-b border-line bg-gradient-to-b from-mist to-white" aria-labelledby="about-heading">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-[radial-gradient(60%_100%_at_50%_0%,rgba(147,195,253,0.35),transparent_70%)]" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Profil Gereja</p>
            <h1 id="about-heading" class="mt-5 font-display text-4xl font-bold tracking-tight text-ink sm:text-5xl">Tentang Kami</h1>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-ink-soft">Mengenal lebih dekat perjalanan iman Gereja Baptis Indonesia Banyumanik sejak 1975.</p>
        </div>
    </section>

    {{-- Sejarah --}}
    <section class="bg-white py-20 lg:py-24" aria-labelledby="history-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-14 lg:grid-cols-2">
                <div class="reveal">
                    <p class="section-eyebrow">{!! $sunGlyph !!} Sejak 1975</p>
                    <h2 id="history-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Sejarah Singkat</h2>
                    <div class="mt-7 space-y-4">
                        @foreach($history as $index => $paragraph)
                            <p class="leading-relaxed text-ink-soft {{ $index !== 0 ? 'mt-4' : '' }}">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="reveal relative mx-auto max-w-xl">
                    <div class="absolute -inset-5 -z-10 rounded-[2rem] bg-gradient-to-br from-primary-200/50 to-gold-soft/40 blur-2xl" aria-hidden="true"></div>
                    <figure class="overflow-hidden rounded-[1.75rem] shadow-2xl shadow-primary-900/15 ring-1 ring-line">
                        <img
                            src="{{ asset('images/about.jpg') }}"
                            alt="Gedung gereja di bawah langit biru"
                            class="aspect-[4/3] w-full object-cover"
                            loading="lazy"
                            width="1280"
                            height="960"
                            decoding="async"
                        >
                    </figure>
                    <div class="absolute -bottom-6 -right-3 flex items-center gap-3 rounded-2xl bg-white p-4 pr-6 shadow-xl ring-1 ring-line sm:-right-6">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 font-display text-lg font-bold text-primary-50">75</span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-ink-soft">Sejak Tahun</p>
                            <p class="font-display text-base font-bold text-ink">1975</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Nilai / Visi Misi --}}
    <section class="bg-mist py-20 lg:py-24" aria-labelledby="vision-mission-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Arah Pelayanan</p>
                <h2 id="vision-mission-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Visi &amp; Misi</h2>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-3 reveal">
                @foreach($values as $value)
                    <div class="rounded-3xl bg-white p-7 ring-1 ring-line">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-primary-50 text-primary-700 ring-1 ring-primary-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </span>
                        <h3 class="mt-4 font-display text-lg font-bold text-ink">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-soft">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 grid gap-6 lg:grid-cols-2">
                <div class="reveal rounded-3xl bg-gradient-to-br from-primary-700 to-primary-900 p-8 text-primary-50 sm:p-10">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold">Visi</p>
                    <p class="mt-4 font-display text-xl font-bold leading-relaxed text-white sm:text-2xl">{{ $vision }}</p>
                </div>

                <div class="reveal rounded-3xl bg-white p-8 ring-1 ring-line sm:p-10">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold">Misi</p>
                    <ul class="mt-5 space-y-4">
                        @foreach($missions as $index => $mission)
                            <li class="flex items-start gap-4">
                                <span class="mt-0.5 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-primary-50 text-sm font-bold text-primary-700 ring-1 ring-primary-100">{{ $index + 1 }}</span>
                                <p class="leading-relaxed text-ink-soft">{{ $mission }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Kepengurusan --}}
    <section class="bg-white py-20 lg:py-24" aria-labelledby="leadership-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Kiranya Tuhan memakai</p>
                <h2 id="leadership-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Struktur Kepengurusan</h2>
                <p class="mt-4 text-lg text-ink-soft">Pendeta dan Majelis Jemaat Periode 2024–2026</p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($leaders as $leader)
                    <article class="reveal rounded-3xl bg-white p-8 text-center ring-1 ring-line transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-900/10">
                        <span class="relative mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-mist ring-1 ring-line">
                            <svg class="h-12 w-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <h3 class="mt-5 font-display text-lg font-bold text-ink">{{ $leader['name'] }}</h3>
                        <p class="mt-1 text-sm font-semibold text-primary-700">{{ $leader['role'] }}</p>
                        <p class="mt-2 text-xs text-ink-soft">{{ $leader['period'] }}</p>
                    </article>
                @endforeach
            </div>

            <p class="mx-auto mt-12 max-w-2xl text-center text-sm leading-relaxed text-ink-soft">
                Majelis Jemaat terdiri dari para Penatua, Pengurus Sekolah Minggu, Koordinator Persekutuan, dan Koordinator Pelayanan lainnya yang bekerja sama dalam memimpin jemaat.
            </p>
        </div>
    </section>
</x-layouts.app>