<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('registration_id')
                    ->relationship('registration', 'full_name')
                    ->required(),

                Forms\Components\TextInput::make('paid_amount')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->disabled(fn($record) => $record && $record->invoice_downloaded),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration.full_name')->label('Name')->sortable(),
                Tables\Columns\TextColumn::make('paid_amount')->label('Paid Amount')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->hidden(fn($record) => $record->invoice_downloaded),

                Tables\Actions\Action::make('sendData')
                    ->label('Download PDF')
                    ->action(function ($record) {
                        session()->flash('booking_id', $record->id);
                        return redirect()->route('download.booking.pdf');
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Confirm Action')
                    ->hidden(fn($record) => $record->invoice_downloaded),


                // Tables\Actions\Action::make('downloadInvoice')
                //     ->label('Download Invoice')
                //     ->icon(asset('icons/download.svg'))
                //     ->action(function ($record) {
                //         return static::downloadInvoice($record->id);
                //     })
                //     ->requiresConfirmation()
                //     ->hidden(fn($record) => $record->invoice_downloaded),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    // public static function downloadInvoice($bookingId)
    // {
    //     $booking = Booking::with('registration')->findOrFail($bookingId);

    //     // Log the booking data for debugging
    //     Log::info(json_encode($booking->toArray(), JSON_UNESCAPED_UNICODE));

    //     // Load the view with UTF-8 encoding for dompdf
    //     $pdf = Pdf::loadView('invoices.invoice', compact('booking'))
    //         ->setPaper('A4', 'portrait')
    //         ->setOptions(['isHtml5ParserEnabled' => true, 'isUnicode' => true]);

    //     // Update the booking to mark that the invoice has been downloaded
    //     $booking->update(['invoice_downloaded' => true]);

    //     return $pdf->download('invoice-' . $bookingId . '.pdf');
    // }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
