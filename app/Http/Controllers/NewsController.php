<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        return view('news.index', compact('news'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->firstOrFail();

        return view('news.show', compact('article'));
    }
}
