<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use GuzzleHttp\Promise\Create;

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

        $Registration = Registration::create([
            'full_name' => $validatedData['full_name'],
            'fathers_name' => $validatedData['fathers_name'],
            'mothers_name' => $validatedData['mothers_name'],
            'phone' => $validatedData['phone'],
            'passport' => $validatedData['passport'],
            'type' => $validatedData['type'],
            // 'verification_code' => rand(100000, 999999),
            // 'verfication_status' => 0,
            // 'verfication_time' => now(),
            // 'verfication_code_expiry' => now()->addMinutes(10),
        ]);

        Registration::create($validatedData);
        //send otp sms


        return redirect('/verification');
    }

    public function verify()
    {

        return view('verification');
    }
}
