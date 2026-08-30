<x-layouts.app
    :metaTitle="'Berita & Renungan - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="'Daftar berita, pengumuman, dan renungan terbaru dari Gereja Baptis Indonesia Banyumanik'"
    :ogType="'website'"
    :ogImage="asset('images/og-news.jpg')"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
    @endphp

    <section class="relative overflow-hidden border-b border-line bg-gradient-to-b from-mist to-white" aria-labelledby="news-heading">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-[radial-gradient(60%_100%_at_50%_0%,rgba(147,195,253,0.35),transparent_70%)]" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Kabar & Refleksi</p>
            <h1 id="news-heading" class="mt-5 font-display text-4xl font-bold tracking-tight text-ink sm:text-5xl">Berita &amp; Renungan</h1>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-ink-soft">Informasi terbaru, pengumuman gereja, dan renungan untuk menumbuhkan iman.</p>
        </div>
    </section>

    <section class="bg-white py-20 lg:py-24" aria-labelledby="news-list-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 id="news-list-heading" class="sr-only">Daftar berita dan renungan</h2>

            @if($news->isNotEmpty())
                <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($news as $item)
                        <article class="reveal group flex flex-col overflow-hidden rounded-3xl bg-white ring-1 ring-line transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-900/10">
                            <a href="{{ route('news.show', $item->slug) }}" class="flex flex-1 flex-col">
                                <div class="relative aspect-[16/9] overflow-hidden bg-primary-100">
                                    @if($item->image)
                                        <img
                                            src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item->title }}"
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            loading="lazy"
                                            width="800"
                                            height="450"
                                            decoding="async"
                                        >
                                    @else
                                        <svg class="absolute inset-0 m-auto h-16 w-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    @endif
                                    <span class="absolute left-3 top-3 rounded-full px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-wide backdrop-blur {{ $item->getTypeBadgeClass() }} text-white">{{ \Illuminate\Support\Str::title($item->type) }}</span>
                                </div>
                                <div class="flex flex-1 flex-col p-6">
                                    <time class="text-xs font-medium uppercase tracking-wider text-ink-soft" datetime="{{ $item->published_at?->format('Y-m-d') ?? $item->created_at->format('Y-m-d') }}">
                                        {{ ($item->published_at ?? $item->created_at)->format('d M Y') }}
                                    </time>
                                    <h3 class="mt-2.5 font-display text-lg font-bold leading-snug text-ink line-clamp-2">{{ $item->title }}</h3>
                                    <p class="mt-2 flex-1 text-sm leading-relaxed text-ink-soft line-clamp-3">{{ $item->excerpt ?: Str::limit(strip_tags($item->content), 150) }}</p>
                                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-primary-700">
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

                <div class="mt-14">
                    {{ $news->links() }}
                </div>
            @else
                <div class="mx-auto max-w-md rounded-3xl bg-mist p-16 text-center ring-1 ring-line">
                    <p class="font-display text-lg font-bold text-ink">Belum ada berita</p>
                    <p class="mt-2 text-sm text-ink-soft">Berita atau renungan akan muncul di sini setelah dipublikasikan melalui panel admin.</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>