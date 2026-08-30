<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'slug' => Str::slug(fake()->unique()->sentence(4)),
            'type' => fake()->randomElement(['berita', 'pengumuman', 'renungan']),
            'excerpt' => fake()->paragraph(),
            'content' => '<p>'.fake()->paragraphs(2, true).'</p>',
            'image' => null,
            'published_at' => now(),
            'is_published' => true,
        ];
    }
}