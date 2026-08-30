<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Jadwal Ibadah & Kegiatan';
    protected static ?string $navigationGroup = 'Kelola Konten';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('day')
                ->options([
                    'Minggu' => 'Minggu',
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                ])
                ->required()
                ->native(false),

            Forms\Components\TimePicker::make('start_time')
                ->label('Jam Mulai')
                ->required()
                ->seconds(false),

            Forms\Components\TimePicker::make('end_time')
                ->label('Jam Selesai')
                ->required()
                ->seconds(false),

            Forms\Components\Select::make('type')
                ->label('Jenis')
                ->options([
                    'ibadah' => 'Ibadah',
                    'kegiatan' => 'Kegiatan',
                ])
                ->required()
                ->native(false),

            Forms\Components\TextInput::make('name')
                ->label('Nama Ibadah/Kegiatan')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('location')
                ->label('Tempat')
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Keterangan')
                ->columnSpanFull()
                ->rows(3),

            Forms\Components\TextInput::make('sort_order')
                ->label('Urutan Tampil')
                ->numeric()
                ->default(0)
                ->minValue(0),

            Forms\Components\Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->label('Hari')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Minggu' => 'danger',
                        'Sabtu' => 'warning',
                        default => 'primary',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_time')
                    ->label('Mulai')
                    ->time('H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_time')
                    ->label('Selesai')
                    ->time('H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ibadah' => 'success',
                        'kegiatan' => 'info',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Tempat')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('day')
                    ->options([
                        'Minggu' => 'Minggu',
                        'Senin' => 'Senin',
                        'Selasa' => 'Selasa',
                        'Rabu' => 'Rabu',
                        'Kamis' => 'Kamis',
                        'Jumat' => 'Jumat',
                        'Sabtu' => 'Sabtu',
                    ]),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'ibadah' => 'Ibadah',
                        'kegiatan' => 'Kegiatan',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Nonaktif'),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
