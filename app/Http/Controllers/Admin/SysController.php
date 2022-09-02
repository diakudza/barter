<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SysController extends Controller
{

    public function index(Request $request)
    {
         return view('Admin.System');
    }

    public function git()
    {
       exec('pwd',$output, $retval);
       print_r($output);
       // return redirect()->back();
    }

}
