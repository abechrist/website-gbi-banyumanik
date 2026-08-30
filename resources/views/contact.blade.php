<x-layouts.app
    :metaTitle="'Kontak & Lokasi - Gereja Baptis Indonesia Banyumanik'"
    :metaDescription="'Hubungi Gereja Baptis Indonesia Banyumanik: alamat, telepon, email, lokasi peta, dan formulir pesan.'"
    :metaKeywords="'kontak gereja, alamat gereja banyumanik, lokasi GBI banyumanik, semarang, email gereja'"
    :ogType="'website'"
    :ogImage="asset('images/og-contact.jpg')"
>
    @php
        $sunGlyph = '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><g stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><line x1="12" y1="1.6" x2="12" y2="4.6"/><line x1="12" y1="19.4" x2="12" y2="22.4"/><line x1="1.6" y1="12" x2="4.6" y2="12"/><line x1="19.4" y1="12" x2="22.4" y2="12"/><line x1="4.4" y1="4.4" x2="6.6" y2="6.6"/><line x1="17.4" y1="17.4" x2="19.6" y2="19.6"/><line x1="19.6" y1="4.4" x2="17.4" y2="6.6"/><line x1="6.6" y1="17.4" x2="4.4" y2="19.6"/></g></svg>';
        $subjects = [
            'info_umum' => 'Informasi Umum',
            'jadwal_ibadah' => 'Tanya Jadwal Ibadah',
            'pelayanan' => 'Pelayanan & Kegiatan',
            'pernikahan' => 'Pernikahan',
            'baptisan' => 'Baptisan',
            'lainnya' => 'Lainnya',
        ];
        $fieldClass = 'w-full rounded-2xl border px-4 py-3 text-sm text-ink placeholder:text-ink-soft/70 transition-shadow focus:border-primary-500 focus:ring-2 focus:ring-primary-500/30 outline-none';
        $fieldOk = 'border-line bg-white';
        $fieldErr = 'border-red-300 bg-red-50/40';
    @endphp

    <section class="relative overflow-hidden border-b border-line bg-gradient-to-b from-mist to-white" aria-labelledby="contact-heading">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-[radial-gradient(60%_100%_at_50%_0%,rgba(147,195,253,0.35),transparent_70%)]" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Kami Siap Menyambut Anda</p>
            <h1 id="contact-heading" class="mt-5 font-display text-4xl font-bold tracking-tight text-ink sm:text-5xl">Kontak &amp; Lokasi</h1>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-ink-soft">Punya pertanyaan, permohonan doa, atau sekadar ingin mengenal kami? Sampaikan lewat formulir di bawah ini.</p>
        </div>
    </section>

    <section class="bg-white py-20 lg:py-24" aria-labelledby="contact-body-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 id="contact-body-heading" class="sr-only">Informasi kontak dan formulir pesan</h2>

            <div class="grid gap-10 lg:grid-cols-5">
                {{-- Info kontak --}}
                <div class="space-y-5 lg:col-span-2">
                    @foreach([
                        [
                            'kind' => 'alamat',
                            'title' => 'Alamat',
                            'lines' => ['Jl. Raya Banyumanik No. 123, Banyumanik, Semarang 50266, Jawa Tengah'],
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />',
                        ],
                        [
                            'kind' => 'telepon',
                            'title' => 'Telepon / WhatsApp',
                            'lines' => ['+62 24 1234567', 'WhatsApp admin jemaat: 0812-3456-7890'],
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />',
                        ],
                        [
                            'kind' => 'email',
                            'title' => 'Email',
                            'lines' => ['info@gbibanyumanik.org'],
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />',
                        ],
                        [
                            'kind' => 'jadwal',
                            'title' => 'Jam Ibadah',
                            'lines' => ['Ibadah Minggu: 07.00 & 10.00 WIB', 'Persekutuan Doa: Rabu 19.00 WIB'],
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />',
                        ],
                    ] as $info)
                        <div class="reveal flex items-start gap-4 rounded-3xl bg-mist p-6 ring-1 ring-line">
                            <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 text-primary-50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">{!! $info['icon'] !!}</svg>
                            </span>
                            <div class="min-w-0">
                                <h3 class="font-display text-base font-bold text-ink">{{ $info['title'] }}</h3>
                                <p class="mt-1.5 whitespace-pre-line text-sm leading-relaxed text-ink-soft">{{ implode("\n", $info['lines']) }}</p>
                            </div>
                        </div>
                    @endforeach

                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="reveal inline-flex items-center gap-2 rounded-full bg-ink px-6 py-3 text-sm font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-primary-700">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.472.099-.174.05-.372-.025-.52-.075-.148-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" /></svg>
                        Chat WhatsApp
                    </a>
                </div>

                {{-- Formulir --}}
                <div class="lg:col-span-3">
                    <div class="reveal rounded-[2rem] bg-white p-8 ring-1 ring-line shadow-[0_24px_60px_-30px_rgba(14,42,78,0.45)] sm:p-10">
                        @if(session('success'))
                            <div class="mb-8 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-5 text-sm text-green-800" role="alert">
                                <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-green-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-8 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-5 text-sm text-red-800" role="alert">
                                <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                                <ul class="list-none space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h3 class="font-display text-xl font-bold text-ink">Kirim Pesan</h3>
                        <p class="mt-2 text-sm text-ink-soft">Kami akan merespons secepatnya, umumnya dalam 1–2 hari kerja.</p>

                        <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-5" novalidate>
                            @csrf

                            {{-- Honeypot anti-spam --}}
                            <div class="hidden" aria-hidden="true">
                                <label for="website">Website</label>
                                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="mb-1.5 block text-sm font-semibold text-ink">
                                        Nama Lengkap <span class="text-gold" aria-hidden="true">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="Masukkan nama Anda"
                                        @class([$fieldClass, $fieldErr => $errors->has('name'), $fieldOk => !$errors->has('name')])
                                        aria-describedby="name-error" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">
                                    @error('name')
                                        <p id="name-error" class="mt-1.5 text-xs text-red-600" role="alert">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="mb-1.5 block text-sm font-semibold text-ink">
                                        Alamat Email <span class="text-gold" aria-hidden="true">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="contoh@email.com"
                                        @class([$fieldClass, $fieldErr => $errors->has('email'), $fieldOk => !$errors->has('email')])
                                        aria-describedby="email-error" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}">
                                    @error('email')
                                        <p id="email-error" class="mt-1.5 text-xs text-red-600" role="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="mb-1.5 block text-sm font-semibold text-ink">
                                    Subjek Pesan <span class="text-gold" aria-hidden="true">*</span>
                                </label>
                                <select id="subject" name="subject" required
                                    @class([$fieldClass, $fieldErr => $errors->has('subject'), $fieldOk => !$errors->has('subject')])
                                    aria-describedby="subject-error" aria-invalid="{{ $errors->has('subject') ? 'true' : 'false' }}">
                                    <option value="" {{ old('subject') === '' ? 'selected' : '' }}>-- Pilih Subjek --</option>
                                    @foreach($subjects as $value => $label)
                                        <option value="{{ $value }}" {{ old('subject') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('subject')
                                    <p id="subject-error" class="mt-1.5 text-xs text-red-600" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="mb-1.5 block text-sm font-semibold text-ink">
                                    Pesan <span class="text-gold" aria-hidden="true">*</span>
                                </label>
                                <textarea id="message" name="message" rows="5" required
                                    @class([$fieldClass, 'resize-y min-h-[120px]', $fieldErr => $errors->has('message'), $fieldOk => !$errors->has('message')])
                                    placeholder="Tulis pesan Anda di sini..." aria-describedby="message-error" aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <p id="message-error" class="mt-1.5 text-xs text-red-600" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <div class="flex items-start gap-3">
                                    <input type="checkbox" id="consent" name="consent" value="1" required
                                        @class(['mt-1 h-4 w-4 shrink-0 rounded border-line text-primary-600 focus:ring-primary-500', 'border-red-300' => $errors->has('consent')])
                                        {{ old('consent') ? 'checked' : '' }}
                                        aria-describedby="consent-error">
                                    <label for="consent" class="text-sm leading-relaxed text-ink-soft">
                                        Saya menyetujui bahwa data yang saya isi hanya digunakan oleh GBI Banyumanik untuk merespons pesan ini dan tidak dibagikan kepada pihak lain. <span class="text-gold" aria-hidden="true">*</span>
                                    </label>
                                </div>
                                @error('consent')
                                    <p id="consent-error" class="mt-1.5 text-xs text-red-600" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-primary-600 px-8 py-3.5 text-sm font-semibold text-white shadow-lg shadow-primary-600/25 transition-all hover:-translate-y-0.5 hover:bg-primary-700">
                                Kirim Pesan
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Peta lokasi --}}
    <section class="bg-mist py-20 lg:py-24" aria-labelledby="map-heading">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="section-eyebrow justify-center">{!! $sunGlyph !!} Di mana kami berada</p>
                <h2 id="map-heading" class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Lokasi Gereja</h2>
                <p class="mt-4 text-lg text-ink-soft">Banyumanik, Semarang · mudah diakses dari arah Tembalang dan Srondol</p>
            </div>

            <div class="reveal mt-12 overflow-hidden rounded-[2rem] ring-1 ring-line shadow-[0_24px_60px_-35px_rgba(14,42,78,0.5)]">
                <iframe
                    src="https://www.google.com/maps?q=-7.0927,110.4149&hl=id&z=15&output=embed"
                    title="Peta lokasi GBI Banyumanik, Semarang"
                    class="h-[28rem] w-full border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </section>
</x-layouts.app>