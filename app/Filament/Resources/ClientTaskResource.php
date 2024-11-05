<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientTaskResource\Pages;
use App\Models\ClientTask;
use App\Models\Registration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class ClientTaskResource extends Resource
{
    protected static ?string $model = ClientTask::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('registration_id')
                    ->label('Client Name')
                    ->options(fn() => Registration::query()->pluck('full_name', 'id'))
                    ->required()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $client = Registration::find($state);
                        $set('phone_number', $client->phone ?? '');
                        $set('passport', $client->passport ?? '');
                    }),
                //get the phone number of this client when select the client id in phone_number
                Forms\Components\TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->disabled()
                    ->reactive(),


                Forms\Components\TextInput::make('passport')
                    ->label('Passport Number')
                    ->disabled()
                    ->reactive(),




                Forms\Components\DatePicker::make('finger_print_date')
                    ->label('Fingerprint Date')
                    ->nullable(),

                Forms\Components\DatePicker::make('medical_date')
                    ->label('Medical Date')
                    ->nullable(),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->helperText('Write your message here'),

                Forms\Components\Toggle::make('is_done')
                    ->label('Done')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration.full_name')
                    ->label('Client Name')->sortable(),
                Tables\Columns\TextColumn::make('phone_number')->label('Phone Number')->sortable(),
                Tables\Columns\TextColumn::make('finger_print_date')->label('Fingerprint Date')->dateTime(),
                Tables\Columns\TextColumn::make('medical_date')->label('Medical Date')->dateTime(),
                Tables\Columns\TextColumn::make('message')->label('Message'),
                Tables\Columns\BooleanColumn::make('is_done')->label('Done'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('deleteFingerprint')
                    ->label('Delete Fingerprint Date')
                    ->action(fn(ClientTask $record) => $record->update(['finger_print_date' => null]))
                    ->requiresConfirmation(),
                Action::make('deleteMedical')
                    ->label('Delete Medical Date')
                    ->action(fn(ClientTask $record) => $record->update(['medical_date' => null]))
                    ->requiresConfirmation(),
                Action::make('markAsDone')
                    ->label('Mark as Done')
                    ->action(fn(ClientTask $record) => $record->update(['is_done' => true]))
                    ->requiresConfirmation(),
                Action::make('sendMessage')
                    ->label('Send Message')
                    ->action(function (ClientTask $record) {
                        return static::notifyClient($record->registration->phone_number, $record->message);
                    })
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function notifyClient($phone_number, $message)
    {
        dump($phone_number, $message);
    }
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClientTasks::route('/'),
            'create' => Pages\CreateClientTask::route('/create'),
            'edit' => Pages\EditClientTask::route('/{record}/edit'),
        ];
    }
}
