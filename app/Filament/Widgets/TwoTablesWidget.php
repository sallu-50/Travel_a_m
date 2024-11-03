<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Registration;

class TwoTablesWidget extends Widget
{
    protected static string $view = 'filament.widgets.two-tables-widget';


    public function getTableOneData(): array
    {
        // Retrieve records with 'approved' status
        return Registration::where('status', 'approved')
            ->get(['full_name', 'fathers_name', 'mothers_name', 'passport', 'type', 'phone'])
            ->toArray();
    }

    public function getTableTwoData(): array
    {
        // Retrieve records with 'canceled' status
        return Registration::where('status', 'canceled')
            ->get(['full_name', 'fathers_name', 'mothers_name', 'passport', 'type', 'phone'])
            ->toArray();
    }
}
