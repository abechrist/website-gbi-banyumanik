<x-layouts.app
    :metaTitle="$article->title . ' - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="$article->excerpt ?? Str::limit(strip_tags($article->content), 160)"
    :ogType="'article'"
    :ogImage="$article->image ? asset('storage/' . $article->image) : asset('images/og-news.jpg')"
    :canonicalUrl="route('news.show', $article->slug)"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
    @endphp

    <section class="bg-white py-16 lg:py-20" aria-labelledby="article-heading">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <nav class="mb-10" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-2 text-sm text-ink-soft">
                    <li><a href="{{ route('home') }}" class="transition-colors hover:text-primary-700">Beranda</a></li>
                    <li aria-hidden="true" class="text-line">/</li>
                    <li><a href="{{ route('news.index') }}" class="transition-colors hover:text-primary-700">Berita &amp; Renungan</a></li>
                    <li aria-hidden="true" class="text-line">/</li>
                    <li class="font-medium text-ink" aria-current="page">{{ Str::limit($article->title, 40) }}</li>
                </ol>
            </nav>

            <header class="mx-auto max-w-3xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-xs font-semibold uppercase tracking-wide {{ $article->getTypeBadgeClass() }} text-white">{{ \Illuminate\Support\Str::title($article->type) }}</span>
                <h1 id="article-heading" class="mt-5 font-display text-3xl font-bold leading-tight tracking-tight text-ink sm:text-[2.6rem] sm:leading-[1.15]">{{ $article->title }}</h1>
                <time class="mt-5 inline-flex items-center gap-2 text-sm text-ink-soft" datetime="{{ $article->published_at?->format('Y-m-d') ?? $article->created_at->format('Y-m-d') }}">
                    <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ ($article->published_at ?? $article->created_at)->format('d F Y') }}
                </time>
            </header>

            @if($article->image)
                <figure class="mt-10 overflow-hidden rounded-[1.75rem] shadow-2xl shadow-primary-900/10 ring-1 ring-line">
                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                        class="aspect-[16/9] w-full object-cover"
                        loading="eager"
                        width="1280"
                        height="720"
                        decoding="async"
                        fetchpriority="high"
                    >
                </figure>
            @endif

            <article class="mx-auto mt-10 max-w-3xl">
                <div class="prose prose-slate max-w-none
                            prose-headings:font-display prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-ink
                            prose-p:leading-relaxed prose-p:text-ink-soft
                            prose-a:text-primary-700 prose-a:no-underline hover:prose-a:underline
                            prose-strong:text-ink prose-blockquote:border-l-primary-600 prose-blockquote:font-medium prose-blockquote:text-ink
                            prose-hr:border-line">
                    {!! \App\Support\HtmlSanitizer::sanitize($article->content) !!}
                </div>
            </article>

            <footer class="mx-auto mt-14 max-w-3xl border-t border-line pt-8">
                <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-center">
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-ink-soft">Bagikan:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-full bg-mist text-ink-soft ring-1 ring-line transition-colors hover:bg-primary-600 hover:text-white" aria-label="Bagikan ke Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-full bg-mist text-ink-soft ring-1 ring-line transition-colors hover:bg-primary-600 hover:text-white" aria-label="Bagikan ke X (Twitter)">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" /></svg>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-full bg-mist text-ink-soft ring-1 ring-line transition-colors hover:bg-primary-600 hover:text-white" aria-label="Bagikan ke WhatsApp">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.472.099-.174.05-.372-.025-.52-.075-.148-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" /></svg>
                        </a>
                    </div>
                    <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-5 py-2.5 text-sm font-semibold text-ink transition-colors hover:border-primary-300 hover:text-primary-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Daftar Berita
                    </a>
                </div>
            </footer>
        </div>
    </section>

    {{-- Strip ayat --}}
    <section class="bg-ink py-16" aria-label="Ayat penutup">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6">
            <p class="section-eyebrow justify-center text-primary-300">{!! $sunGlyph !!} Terang bagi langkah kita</p>
            <p class="mt-5 font-display text-2xl font-bold leading-snug text-white sm:text-3xl">
                "Firman-Mu itu pelita bagi kakiku dan terang bagi jalanku."
            </p>
            <p class="mt-4 text-sm font-semibold uppercase tracking-[0.25em] text-gold">— Mazmur 119:105</p>
        </div>
    </section>
</x-layouts.app>