<x-layouts.app
    :metaTitle="'Galeri Foto - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="'Galeri foto kegiatan, ibadah, dan persekutuan Gereja Baptis Indonesia Banyumanik'"
    :ogType="'website'"
    :ogImage="asset('images/og-gallery.jpg')"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
    @endphp

    <section class="relative overflow-hidden border-b border-line bg-gradient-to-b from-mist to-white" aria-labelledby="gallery-heading">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-[radial-gradient(60%_100%_at_50%_0%,rgba(147,195,253,0.35),transparent_70%)]" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Kenangan Bersama</p>
            <h1 id="gallery-heading" class="mt-5 font-display text-4xl font-bold tracking-tight text-ink sm:text-5xl">Galeri Foto</h1>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-ink-soft">Momen ibadah, kegiatan, dan persekutuan di GBI Banyumanik.</p>
        </div>
    </section>

    <section class="bg-white py-20 lg:py-24" aria-labelledby="gallery-grid-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 id="gallery-grid-heading" class="sr-only">Koleksi foto galeri</h2>

            @if($galleries->isNotEmpty())
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3" data-gallery>
                    @foreach($galleries as $gallery)
                        <figure
                            class="reveal group relative overflow-hidden rounded-3xl bg-mist ring-1 ring-line cursor-zoom-in"
                            role="button"
                            tabindex="0"
                            data-lightbox-trigger
                            data-src="{{ asset('storage/' . $gallery->image) }}"
                            data-alt="{{ $gallery->title }}"
                            data-title="{{ $gallery->title }}"
                            data-meta="{{ $gallery->event_date?->format('d F Y') }}"
                            aria-label="Perbesar foto: {{ $gallery->title }}"
                        >
                            <img
                                src="{{ asset('storage/' . $gallery->image) }}"
                                alt="{{ $gallery->title }}"
                                class="aspect-square h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                                width="900"
                                height="900"
                                decoding="async"
                            >
                            <figcaption class="pointer-events-none absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-ink/75 via-ink/10 to-transparent p-6 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <p class="font-display text-base font-bold text-white">{{ $gallery->title }}</p>
                                @if($gallery->event_date)
                                    <p class="mt-0.5 text-xs text-white/85">{{ $gallery->event_date->format('d M Y') }}</p>
                                @endif
                            </figcaption>
                            <span class="pointer-events-none absolute right-4 top-4 flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white opacity-0 backdrop-blur transition-all duration-300 group-hover:opacity-100">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 8v6M8 11h6M16 11a5 5 0 11-10 0 5 5 0 0110 0z" />
                                </svg>
                            </span>
                        </figure>
                    @endforeach
                </div>
            @else
                <div class="mx-auto max-w-md rounded-3xl bg-mist p-16 text-center ring-1 ring-line">
                    <p class="font-display text-lg font-bold text-ink">Belum ada foto</p>
                    <p class="mt-2 text-sm text-ink-soft">Foto akan ditampilkan setelah diunggah melalui panel admin.</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>