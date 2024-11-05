<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function BookingPDF()
    {
        $bookingId = session('booking_id');
        $booking = Booking::with('registration')->findOrFail($bookingId);
        $pdf = Pdf::loadView('invoices.invoice', ['booking' => $booking], [], 'UTF-8')
            ->setPaper('A4', 'portrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isUnicode' => true]);
        $booking->update(['invoice_downloaded' => true]);
        return $pdf->download('invoice-' . $bookingId . '.pdf');
    }
}
