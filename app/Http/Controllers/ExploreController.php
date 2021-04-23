<?php

namespace App\Http\Controllers;

use App\Models\User;

class ExploreController extends Controller
{
    public function index()
    {
        return view('layouts.partials.explore', [
            'users' => User::paginate(20)
        ]);
    }
}
