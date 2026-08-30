<div class="dawn-band h-1" aria-hidden="true"></div>

{{-- Info bar (desktop) --}}
<div class="hidden bg-mist text-ink-soft md:block">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-2 text-xs sm:px-6 lg:px-8">
        <p class="flex items-center gap-2">
            <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Ibadah Minggu: 07.00 &amp; 10.00 WIB · Persekutuan Doa: Rabu 19.00 WIB
        </p>
        <div class="flex items-center gap-6">
            <a href="{{ route('contact') }}" class="flex items-center gap-2 transition-colors hover:text-primary-700">
                <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                info@gbibanyumanik.org
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-2 transition-colors hover:text-primary-700">
                <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                +62 24 1234567
            </a>
        </div>
    </div>
</div>

<header class="sticky top-0 z-50 border-b border-line/70 bg-white/85 transition-shadow backdrop-blur-md supports-[backdrop-filter]:bg-white/75" data-header>
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Navigasi utama">
        <div class="flex h-[4.5rem] items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="group flex min-w-0 items-center gap-3" aria-label="Gereja Baptis Indonesia Banyumanik - Beranda">
                <span class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 shadow-sm ring-1 ring-primary-700/20 transition-transform duration-200 group-hover:-rotate-6" aria-hidden="true">
                    <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3.2" fill="#fff" />
                        <g stroke="#fff" stroke-width="1.7" stroke-linecap="round">
                            <line x1="12" y1="3.4" x2="12" y2="6.5" />
                            <line x1="12" y1="17.5" x2="12" y2="20.6" />
                            <line x1="3.4" y1="12" x2="6.5" y2="12" />
                            <line x1="17.5" y1="12" x2="20.6" y2="12" />
                            <line x1="5.9" y1="5.9" x2="8.2" y2="8.2" />
                            <line x1="15.8" y1="15.8" x2="18.1" y2="18.1" />
                            <line x1="18.1" y1="5.9" x2="15.8" y2="8.2" />
                            <line x1="8.2" y1="15.8" x2="5.9" y2="18.1" />
                        </g>
                    </svg>
                </span>
                <span class="min-w-0">
                    <span class="block truncate font-display text-lg font-bold leading-tight tracking-tight text-ink">GBI Banyumanik</span>
                    <span class="block text-[0.7rem] font-medium uppercase tracking-[0.14em] text-primary-600">Gereja Baptis Indonesia</span>
                </span>
            </a>

            <div class="hidden items-center gap-1 lg:flex">
                @php
                    $navLinks = [
                        ['label' => 'Beranda', 'route' => 'home'],
                        ['label' => 'Tentang Kami', 'route' => 'about'],
                        ['label' => 'Jadwal Ibadah', 'route' => 'schedule'],
                        ['label' => 'Berita & Renungan', 'route' => 'news.index'],
                        ['label' => 'Galeri', 'route' => 'gallery'],
                    ];
                    $active = fn ($route) => request()->routeIs($route);
                @endphp
                @foreach ($navLinks as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        @class([
                            'relative rounded-full px-4 py-2 text-sm font-medium transition-colors',
                            'text-primary-700' => $active($link['route']),
                            'text-ink-soft hover:text-primary-700' => !$active($link['route']),
                        ])
                        {{ $active($link['route']) ? 'aria-current="page"' : '' }}
                    >
                        {{ $link['label'] }}
                        @if ($active($link['route']))
                            <span class="absolute inset-x-4 -bottom-px h-0.5 rounded-full bg-gold" aria-hidden="true"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}" class="hidden items-center gap-2 rounded-full bg-primary-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-primary-600/20 transition-all hover:-translate-y-px hover:bg-primary-700 lg:inline-flex">
                    Hubungi Kami
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <button id="mobile-menu-button" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-xl text-ink-soft transition-colors hover:bg-primary-50 hover:text-primary-700 lg:hidden" aria-controls="mobile-menu" aria-expanded="false" aria-label="Buka menu navigasi">
                    <svg id="mobile-menu-icon-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="mobile-menu-icon-close" class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden border-t border-line/70 bg-white lg:hidden">
        <div class="mx-auto max-w-7xl space-y-1 px-4 py-4 sm:px-6">
            @foreach ($navLinks as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'block rounded-xl px-4 py-3 text-base font-medium transition-colors',
                        'bg-primary-50 text-primary-700' => $active($link['route']),
                        'text-ink-soft hover:bg-primary-50 hover:text-primary-700' => !$active($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('contact') }}" class="mt-3 block rounded-full bg-primary-600 px-6 py-3 text-center text-base font-semibold text-white transition-colors hover:bg-primary-700">
                Hubungi Kami
            </a>
        </div>
    </div>
</header>