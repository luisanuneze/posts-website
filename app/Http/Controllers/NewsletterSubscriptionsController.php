<?php

namespace App\Http\Controllers;

use App\Notifications\UserSubscribed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NewsletterSubscriptionsController extends Controller implements ShouldQueue
{

    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        Notification::send(Auth::user(), new UserSubscribed());

        return redirect()->action([PostController::class, 'index']);
    }
}
