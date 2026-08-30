<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';
    protected static ?string $navigationLabel = 'Pesan Masuk';
    protected static ?string $navigationGroup = 'Kelola Konten';
    protected static ?int $navigationSort = 4;

    // Read-only: disable create and edit
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Pengirim')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama')
                        ->disabled(),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->disabled(),

                    Forms\Components\TextInput::make('subject')
                        ->label('Subjek')
                        ->disabled(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Pesan')
                ->schema([
                    Forms\Components\Textarea::make('message')
                        ->label('Isi Pesan')
                        ->disabled()
                        ->columnSpanFull()
                        ->rows(6),
                ]),

            Forms\Components\Section::make('Status')
                ->schema([
                    Forms\Components\Toggle::make('is_read')
                        ->label('Sudah Dibaca')
                        ->disabled(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\BadgeColumn::make('subject')
                    ->label('Subjek')
                    ->colors([
                        'primary' => 'info_umum',
                        'success' => 'jadwal_ibadah',
                        'warning' => 'pelayanan',
                        'danger' => 'pernikahan',
                        'info' => 'baptisan',
                        'gray' => 'lainnya',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'info_umum' => 'Informasi Umum',
                        'jadwal_ibadah' => 'Tanya Jadwal Ibadah',
                        'pelayanan' => 'Pelayanan & Kegiatan',
                        'pernikahan' => 'Pernikahan',
                        'baptisan' => 'Baptisan',
                        'lainnya' => 'Lainnya',
                        default => $state,
                    }),

                Tables\Columns\IconColumn::make('is_read')
                    ->label('Dibaca')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('warning')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-envelope-open')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diterima')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->since(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Status Baca')
                    ->placeholder('Semua')
                    ->trueLabel('Sudah Dibaca')
                    ->falseLabel('Belum Dibaca'),
                Tables\Filters\SelectFilter::make('subject')
                    ->options([
                        'info_umum' => 'Informasi Umum',
                        'jadwal_ibadah' => 'Tanya Jadwal Ibadah',
                        'pelayanan' => 'Pelayanan & Kegiatan',
                        'pernikahan' => 'Pernikahan',
                        'baptisan' => 'Baptisan',
                        'lainnya' => 'Lainnya',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('mark_as_read')
                    ->label('Tandai Dibaca')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => !$record->is_read)
                    ->action(function ($record) {
                        $record->update(['is_read' => true]);
                    })
                    ->requiresConfirmation(),
                Tables\Actions\Action::make('mark_as_unread')
                    ->label('Tandai Belum Dibaca')
                    ->icon('heroicon-o-envelope-open')
                    ->color('warning')
                    ->visible(fn ($record) => $record->is_read)
                    ->action(function ($record) {
                        $record->update(['is_read' => false]);
                    })
                    ->requiresConfirmation(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('mark_as_read')
                        ->label('Tandai Dibaca')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn ($records) => $records->each->update(['is_read' => true]))
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('mark_as_unread')
                        ->label('Tandai Belum Dibaca')
                        ->icon('heroicon-o-envelope-open')
                        ->color('warning')
                        ->action(fn ($records) => $records->each->update(['is_read' => false]))
                        ->requiresConfirmation(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
        ];
    }
}
