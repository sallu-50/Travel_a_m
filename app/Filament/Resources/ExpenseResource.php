<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('registration_id')
                    ->label('Profile')
                    ->relationship('registration', 'name') // Assuming 'name' is in Profile model
                    ->required(),

                Forms\Components\TextInput::make('visa_cost')
                    ->label('Visa Cost')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('ticket_cost')
                    ->label('Ticket Cost')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('medical_cost')
                    ->label('Medical Cost')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('other_costs')
                    ->label('Other Costs')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration.name')->label('Client Name'),
                Tables\Columns\TextColumn::make('visa_cost')->label('Visa Cost'),
                Tables\Columns\TextColumn::make('ticket_cost')->label('Ticket Cost'),
                Tables\Columns\TextColumn::make('medical_cost')->label('Medical Cost'),
                Tables\Columns\TextColumn::make('other_costs')->label('Other Costs'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
