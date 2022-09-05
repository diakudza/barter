<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SysController extends Controller
{


    public function index(Request $request)
    {
        return view('Admin.System');
    }

    public function action($action)
    {
        echo $dir = config('app.dir');

        switch ($action) {
            case ('git'):
                $process = Process::fromShellCommandline('/usr/bin/git pull');
                break;
            case  ('migrate'):
//                $process = Process::fromShellCommandline('/var/www/html/barter/vendor/bin/sail');
                $process = new Process(["whoami"]);
                // session(['migrate' => Artisan::call('migrate') ? 0 : 1]);
                break;
            case  ('composer'):
                $process = Process::fromShellCommandline('/usr/bin/composer');
//                session(['migrate' => Artisan::call('custom:composer') ? 0 : 1]);
                session(['migrate' => 1]);
                break;
            case  ('npmbuild'):
                session(['migrate' => Artisan::call('custom:npmbuild') ? 0 : 1]);
                break;
        }

        try {
            $process->mustRun();

            dd($process->getOutput());

        } catch (ProcessFailedException $exception) {
            dd($exception->getMessage());
        }

        return redirect()->back();
    }

}
