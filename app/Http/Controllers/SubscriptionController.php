<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'email' => 'required|email|min:10',
        ]);

        // Simpan data ke dalam tabel subscriptions
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->ip = $request->ip();
        $subscription->save();

        // Pesan sukses
        $message = "Subscribe successful! Thank you for subscribing.";

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', $message);
    }
}
