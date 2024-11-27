<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Registration;
use App\Models\User;
use App\Filament\Resources\ApplicationResource\RelationManagers;

use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApplicationResource extends Resource
{
    protected static ?string $model = Registration::class; // Set model to Registration
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Applications';




    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->label('Full Name'),

                Forms\Components\TextInput::make('fathers_name')
                    ->required()
                    ->label("Father's Name"),

                Forms\Components\TextInput::make('mothers_name')
                    ->required()
                    ->label("Mother's Name"),

                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->label("Phone Number"),

                Forms\Components\TextInput::make('passport')
                    ->required()
                    ->label("Passport Number"),

                Forms\Components\Select::make('type')
                    ->options([
                        'hajj' => 'Hajj',
                        'umrah' => 'Umrah',
                        'work' => 'Work',
                    ])
                    ->required()
                    ->label("Registration Type"),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'canceled' => 'Canceled',
                    ])
                    ->default('pending')
                    ->label("Status")
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->label('Amount'),
                // ->required()
                // ->visible(fn(callable $get) => $get('status') === 'approved') // Show only when status is approved
                // ->helperText('Provide the amount if approving the application.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('fathers_name')
                    ->label("Father's Name")
                    ->sortable(),

                Tables\Columns\TextColumn::make('mothers_name')
                    ->label("Mother's Name")
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone Number')
                    ->sortable(),

                Tables\Columns\TextColumn::make('passport')
                    ->label('Passport Number')
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Registration Type')
                    ->sortable(),


                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'yellow' => 'pending',
                        'green' => 'approved',
                        'red' => 'canceled',
                    ])
                    ->formatStateUsing(function (string $state): string {
                        return ucfirst($state);
                    }),



            ])
            ->filters([
                // Define filters if necessary
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add any relationships if necessary
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
