<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index()
    {
        return view('layouts.partials.subscriptions', [
            'users' => User::paginate(20)
        ]);
    }
}
