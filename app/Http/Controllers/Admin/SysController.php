<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProcessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SysController extends Controller
{

    public function index(Request $request)
    {
        $dir = config('app.dir');
        $allBranch = ProcessService::run("git branch -r", $dir);
        $currentBranch = ProcessService::run("git branch | awk '/^\*/{print $2}' | tr -d '[:space:]' ", $dir);
        $filtered = array_filter(explode("\n", $allBranch[0]), function ($s) {
            return strripos($s, '  origin/') === 0;
        });
        $branchList = array_map(fn($s) => mb_substr($s, 9), $filtered);
        return view('Admin.System', [
            'branchList' => $branchList,
            'currentBranch' => $currentBranch[0],
        ]);
    }

    public function action($action, Request $request)
    {
        $dir = config('app.dir');
        switch ($action) {
            case ('git'):
                $process = Process::fromShellCommandline("git pull", $dir);
                session(['git' => 1]);
                break;
            case ('gitcheckout'):
                $branch = $request->input('branch');
                $process = Process::fromShellCommandline("git checkout ${branch}", $dir);
                break;
            case ('gitreset'):
                $process = Process::fromShellCommandline("git reset --hard HEAD", $dir);
                break;
            case  ('migrate'):
                $process = Process::fromShellCommandline("php artisan migrate", $dir);
                session(['migrate' => 1]);
                break;
            case  ('composerinstall'):
                $process = Process::fromShellCommandline("/usr/bin/composer install", $dir);
                session(['composerinstall' => 1]);
                break;
            case  ('composerupdate'):
                $process = Process::fromShellCommandline("/usr/bin/composer update", $dir);
                session(['composerupdate' => 1]);
                break;
            case  ('npmbuild'):
                $process = Process::fromShellCommandline("bash/npmbuild.sh", $dir);
                break;
            case  ('npminstall'):
                $process = Process::fromShellCommandline("bash/npminstall.sh", $dir);
                break;
            case  ('maintenance'):
                $action = (app()->isDownForMaintenance()) ? 'up' : 'down';
                Artisan::call($action);
                return redirect()->back();
        }

        try {
            $process->mustRun();
            return redirect()->back()->with('text', $process->getOutput());

        } catch (ProcessFailedException $exception) {
            return redirect()->back()->with('text', $exception->getMessage());;
        }
    }

}
