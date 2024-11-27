<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Registration;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class approved_application extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        // Show pending and canceled registrations
        return $table
            ->query(Registration::whereIn('status', ['approved'])) // Fetch pending and canceled records
            ->defaultPaginationPageOption(5) // Set pagination
            ->defaultSort('created_at', 'desc') // Sort by creation date
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('fathers_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('mothers_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('passport')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Registration Type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'approved', // Maps 'approved' to a green color
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'approved', // Green check-circle icon
                    ])
                    ->iconPosition('before') // Show the icon before the status text
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)) // Capitalize the status text
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable(),

                Tables\Columns\TextColumn::make('fingerprint_date')
                    ->label('Fingerprint Date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('medical_date')
                    ->label('Medical Date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registration Date')
                    ->date()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-o-pencil')
                    ->url(fn(Registration $record): string => url('/admin/applications/' . $record->id . '/edit'))
                    ->openUrlInNewTab(false),
            ]);
        // ->actions([
        //     Tables\Actions\Action::make('edit')
        //         ->label('Edit')
        //         ->url(fn (Registration $record): string => route('filament.resources.applications.edit', $record)) // Update the route accordingly
        //         ->icon('heroicon-o-pencil-alt'),
        // ]);
    }
}
