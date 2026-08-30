<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Honeypot check - if filled, it's likely spam
        if ($request->filled('website')) {
            return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
            'consent' => 'required|accepted',
        ]);

        $payload = array_diff_key($validated, array_flip(['consent']));
        $contactMessage = ContactMessage::create($payload);

        $adminEmail = config('mail.admin_address', 'admin@gbibanyumanik.org');

        try {
            Mail::to($adminEmail)->queue(new ContactMessageReceived($contactMessage));
        } catch (\Exception $e) {
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Pesan berhasil dikirim! Kami akan segera merespons.');
    }
}
