<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    
    <!-- Primary Meta Tags -->
    <title>{{ $metaTitle ?? 'Gereja Baptis Indonesia Banyumanik' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Website resmi Gereja Baptis Indonesia Banyumanik - Informasi jadwal ibadah, berita, renungan, galeri, dan kontak.' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'Gereja Baptis Indonesia Banyumanik, GBI Banyumanik, jadwal ibadah, berita gereja, renungan harian, galeri kegiatan, kontak gereja' }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $canonicalUrl ?? url()->current() }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ $canonicalUrl ?? url()->current() }}">
    <meta property="og:title" content="{{ $metaTitle ?? 'Gereja Baptis Indonesia Banyumanik' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Website resmi Gereja Baptis Indonesia Banyumanik' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">
    <meta property="og:site_name" content="Gereja Baptis Indonesia Banyumanik">
    <meta property="og:locale" content="id_ID">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonicalUrl ?? url()->current() }}">
    <meta name="twitter:title" content="{{ $metaTitle ?? 'Gereja Baptis Indonesia Banyumanik' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Website resmi Gereja Baptis Indonesia Banyumanik' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#2563eb">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.bunny.net">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    @include('partials.header')
    
    <main class="min-h-screen">
        {{ $slot }}
    </main>
    
    @include('partials.footer')
</body>
</html>