<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita & Renungan';
    protected static ?string $navigationGroup = 'Kelola Konten';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),

            Forms\Components\TextInput::make('slug')
                ->label('Slug (URL)')
                ->required()
                ->maxLength(255)
                ->unique(News::class, 'slug', ignoreRecord: true)
                ->helperText('Otomatis terisi dari judul, bisa diedit manual'),

            Forms\Components\Select::make('type')
                ->label('Jenis')
                ->options([
                    'berita' => 'Berita',
                    'pengumuman' => 'Pengumuman',
                    'renungan' => 'Renungan',
                ])
                ->required()
                ->native(false)
                ->default('berita'),

            Forms\Components\Textarea::make('excerpt')
                ->label('Ringkasan')
                ->rows(3)
                ->columnSpanFull()
                ->helperText('Tampil di daftar berita (opsional)'),

            Forms\Components\RichEditor::make('content')
                ->label('Isi Lengkap')
                ->required()
                ->columnSpanFull()
                ->toolbarButtons([
                    'bold', 'italic', 'underline', 'strike',
                    'h2', 'h3',
                    'bulletList', 'orderedList',
                    'link', 'blockquote',
                    'undo', 'redo',
                ]),

            Forms\Components\FileUpload::make('image')
                ->label('Gambar Sampul')
                ->image()
                ->directory('news')
                ->maxSize(2048)
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '16:9',
                    '4:3',
                    '1:1',
                ])
                ->columnSpanFull(),

            Forms\Components\DatePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->default(now())
                ->native(false),

            Forms\Components\Toggle::make('is_published')
                ->label('Dipublikasikan')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular()
                    ->size(50),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Jenis')
                    ->colors([
                        'success' => 'berita',
                        'warning' => 'pengumuman',
                        'info' => 'renungan',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                        'renungan' => 'Renungan',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tgl Publikasi')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('Belum dipublikasikan'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                        'renungan' => 'Renungan',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi')
                    ->placeholder('Semua')
                    ->trueLabel('Dipublikasikan')
                    ->falseLabel('Draft'),
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')->label('Dari tanggal'),
                        Forms\Components\DatePicker::make('published_until')->label('Sampai tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['published_from'], fn ($q, $date) => $q->whereDate('published_at', '>=', $date))
                            ->when($data['published_until'], fn ($q, $date) => $q->whereDate('published_at', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
