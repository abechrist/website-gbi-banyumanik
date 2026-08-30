<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = ['info_umum', 'jadwal_ibadah', 'pelayanan', 'pernikahan', 'baptisan', 'lainnya'];

        for ($i = 1; $i <= 5; $i++) {
            ContactMessage::create([
                'name' => "Test User {$i}",
                'email' => "test{$i}@example.com",
                'subject' => $subjects[array_rand($subjects)],
                'message' => "Ini adalah pesan test nomor {$i} untuk menguji fitur pesan masuk.",
                'is_read' => $i % 2 === 0,
                'created_at' => now()->subDays($i),
            ]);
        }
    }
}
