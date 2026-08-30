<x-mail::message>
# Pesan Baru dari Website

Anda menerima pesan baru dari formulir kontak website GBI Banyumanik.

---

**Detail Pengirim:**

- **Nama:** {{ $message->name }}
- **Email:** {{ $message->email }}
- **Subjek:** {{ ucfirst(str_replace('_', ' ', $message->subject)) }}
- **Waktu:** {{ $message->created_at->format('d F Y H:i') }}

---

**Pesan:**

{{ $message->message }}

---

<x-mail::button :url="url('/admin/contact-messages/' . $message->id)">
Lihat di Admin Panel
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>