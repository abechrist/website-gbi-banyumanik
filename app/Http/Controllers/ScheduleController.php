<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $dayOrder = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $schedules = Schedule::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('day')
            ->sortKeysUsing(function ($key1, $key2) use ($dayOrder) {
                $pos1 = array_search($key1, $dayOrder) ?? 99;
                $pos2 = array_search($key2, $dayOrder) ?? 99;

                return $pos1 <=> $pos2;
            });

        $specialEvents = [
            [
                'title' => 'Pekan Paskah',
                'description' => 'Ibadah Minggu Palma, Kamis Suci, Jumat Agung, dan Minggu Paskah.',
                'date' => 'Maret/April · mengikuti kalender gerejawi',
                'icon' => 'calendar',
            ],
            [
                'title' => 'Natal & Tahun Baru',
                'description' => 'Ibadah Malam Natal, Ibadah Natal, dan Ibadah Tahun Baru.',
                'date' => '24–25 Desember & 31 Desember – 1 Januari',
                'icon' => 'gift',
            ],
            [
                'title' => 'VBS (Vacation Bible School)',
                'description' => 'Pelayanan anak-anak selama libur sekolah (3–5 hari).',
                'date' => 'Juni/Juli',
                'icon' => 'sun',
            ],
            [
                'title' => 'Retreat Tahunan',
                'description' => 'Retreat jemaat, retreat pemuda, dan retreat keluarga.',
                'date' => 'Agustus/September',
                'icon' => 'sparkles',
            ],
        ];

        return view('schedule', compact('schedules', 'specialEvents'));
    }
}