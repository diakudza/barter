<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function createAdComplain(Request $request)
    {
        return view('user.chat.complainAd', ['id' => $request->route('id')]);
    }

    public function createUserComplain(Request $request)
    {
        return view('user.chat.complainUser', ['id' => $request->route('id')]);
    }

    public function createSupportTicket()
    {
        return view('user.chat.getSupport');
    }
}
