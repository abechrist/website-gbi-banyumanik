<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Gallery;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml for the website';

    public function handle(): int
    {
        $this->info('Generating sitemap...');

        $sitemap = SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                if (str_starts_with($url->getUrl(), config('app.url') . '/admin')) {
                    return false;
                }
                if (str_starts_with($url->getUrl(), config('app.url') . '/api')) {
                    return false;
                }
                return true;
            })
            ->getSitemap();

        // Static pages
        $sitemap->add(Url::create(config('app.url'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        $sitemap->add(Url::create(route('about'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));
        $sitemap->add(Url::create(route('schedule'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9));
        $sitemap->add(Url::create(route('news.index'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.9));
        $sitemap->add(Url::create(route('gallery'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.7));
        $sitemap->add(Url::create(route('contact'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));

        // News articles
        $newsItems = News::query()
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->get()
            ->map(fn ($news) => Url::create(route('news.show', $news->slug))
                ->setLastModificationDate($news->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.6)
            );

        foreach ($newsItems as $item) {
            $sitemap->add($item);
        }

        // Gallery items
        $galleryItems = Gallery::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($gallery) => Url::create(route('gallery'))
                ->setLastModificationDate($gallery->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.5)
            );

        foreach ($galleryItems as $item) {
            $sitemap->add($item);
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at ' . public_path('sitemap.xml'));
        
        return Command::SUCCESS;
    }
}