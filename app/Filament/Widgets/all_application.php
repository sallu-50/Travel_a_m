<?php

namespace App\Filament\Widgets;


use App\Models\Registration;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Forms;

class all_application extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        // Show pending and canceled registrations
        return $table
            ->query(Registration::whereIn('status', ['pending', 'canceled'])) // Fetch pending and canceled records
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
                        'warning' => 'pending', // Maps 'pending' to a yellow color
                        'danger' => 'canceled', // Maps 'canceled' to a red color                    
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',   // Clock icon for pending
                        'heroicon-o-x-circle' => 'canceled', // X-circle icon for canceled
                    ])
                    ->iconPosition('before') // Show the icon before the status text
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)) // Capitalize the status text
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registration Date')
                    ->date()
                    ->sortable(),
            ])

            ->actions([
                TableAction::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-s-check-circle')
                    ->requiresConfirmation()
                    ->visible(fn(Registration $record) => $record->status === 'pending')
                    ->form([
                        Forms\Components\TextInput::make('amount')
                            ->label('Amount')
                            ->required(),
                    ])
                    ->action(function (array $data, Registration $record) {
                        $record->update([
                            'status' => 'approved',
                            'amount' => $data['amount'],
                        ]);
                        Notification::make()
                            ->success()
                            ->title('Application Approved')
                            ->send();
                    }),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
