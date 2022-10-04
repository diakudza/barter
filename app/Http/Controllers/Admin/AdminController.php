<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdStatus;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function main()
    {
        return view('admin.adminMain');
    }
}
