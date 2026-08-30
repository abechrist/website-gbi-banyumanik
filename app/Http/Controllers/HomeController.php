<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('day');

        // Pre-sort days
        $dayOrder = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $schedules = $schedules->sortKeysUsing(function ($key1, $key2) use ($dayOrder) {
            $pos1 = array_search($key1, $dayOrder) ?? 99;
            $pos2 = array_search($key2, $dayOrder) ?? 99;
            return $pos1 <=> $pos2;
        });

        $latestNews = News::where('is_published', true)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('home', compact('schedules', 'latestNews'));
    }
}
