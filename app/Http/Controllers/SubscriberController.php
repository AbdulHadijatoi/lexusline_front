<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

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
            'email' => 'required|email'
        ]);
        $email = $request->email;
        Subscriber::create([
            'email' => $email
        ]);

        return redirect()->back()->with('success', 'Request submitted successfully!');
    }
}
