<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AdminGuideWidget extends Widget
{
    protected static ?int $sort = -2;

    protected static bool $isLazy = false;

    protected static string $view = 'filament.widgets.admin-guide-widget';

    protected int | string | array $columnSpan = 2;

    protected int | string | array $columnStart = [];
}