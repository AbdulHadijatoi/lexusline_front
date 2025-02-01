<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber deleted successfully.');
    }
    
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'nullable'
        ]);

        $email = $request->email;
        $messageBody = $request->message ?? 'No additional message provided.';

        Subscriber::create([
            'email' => $email
        ]);

        // Send email using the Mailable class
        Mail::to('info@lexusline.co.uk')->send(new ContactUsMail($email, $messageBody));
        // Mail::to('abdulhadijatoi@gmail.com')->send(new ContactUsMail($email, $messageBody));

        return redirect()->back()->with('success', 'Request submitted successfully!');
    }
    
}
