<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $code }} · GBI Banyumanik</title>
    <meta name="robots" content="noindex, nofollow">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-mist text-ink antialiased">
    <div class="flex min-h-screen items-center justify-center px-4 py-16">
        <div class="max-w-md text-center">
            <div class="mx-auto h-28 w-28">
                <div class="ray-mark h-full w-full text-primary-200"></div>
            </div>
            <p class="mt-8 font-display text-7xl font-bold tracking-tight text-primary-600">{{ $code }}</p>
            <h1 class="mt-4 font-display text-2xl font-bold text-ink">{{ $title }}</h1>
            <p class="mt-3 leading-relaxed text-ink-soft">{{ $message }}</p>
            <a href="{{ url('/') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-primary-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-primary-600/25 transition-all hover:-translate-y-0.5 hover:bg-primary-700">
                Kembali ke Beranda
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7-7" transform="rotate(180 12 12)" />
                </svg>
            </a>
        </div>
    </div>
</body>
</html>