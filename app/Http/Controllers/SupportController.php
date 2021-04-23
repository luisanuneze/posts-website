<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportRequest;
use App\Mail\SupportMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function create()
    {
        return view('layouts.app.support');
    }

    public function store(StoreSupportRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Mail::to($data['email'])
            ->send(new SupportMail($data));

        return redirect()->action([SupportController::class, 'create'])->with('message', 'Email sent!');
    }

    public function show()
    {
        return view('layouts.app.support');
    }
}
