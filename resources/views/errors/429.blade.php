@include('errors.minimal', [
    'code' => 429,
    'title' => 'Terlalu Banyak Permintaan',
    'message' => 'Anda mengirim terlalu banyak permintaan dalam waktu singkat. Silakan coba lagi beberapa saat lagi.',
])