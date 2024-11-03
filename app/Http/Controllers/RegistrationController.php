<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function showHajjForm()
    {
        return view('registration-form', ['type' => 'hajj']);
    }

    public function showUmrahForm()
    {
        return view('registration-form', ['type' => 'umrah']);
    }

    public function showWorkForm()
    {
        return view('registration-form', ['type' => 'work']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'fathers_name' => 'required|string|max:255',
            'mothers_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'passport' => 'required|string|max:20',
            'type' => 'required|string|in:hajj,umrah,work',
        ]);

        Registration::create($validatedData);

        return redirect('/verification');
    }

    public function verify()
    {
        return view('verification');
    }
}
