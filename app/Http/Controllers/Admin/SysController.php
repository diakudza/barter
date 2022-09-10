<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCommand;
use App\Services\ProcessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SysController extends Controller
{

    public function index(Request $request, AdminCommand $adminCommand)
    {
        $dir = config('app.dir');
        $allBranch = ProcessService::run("git branch -r", $dir);
        $currentBranch = ProcessService::run("git branch | awk '/^\*/{print $2}' | tr -d '[:space:]' ", $dir);
        $filtered = array_filter(explode("\n", $allBranch[0]), function ($s) {
            return strripos($s, '  origin/') === 0;
        });
        $branchList = array_map(fn($s) => mb_substr($s, 9), $filtered);
        return view('admin.system', [
            'consoleHistory' => $adminCommand->getLastCommands(),
            'branchList' => $branchList,
            'currentBranch' => $currentBranch[0],
        ]);
    }

    public function action($action, Request $request, AdminCommand $adminCommand)
    {
        $dir = config('app.dir');
        switch ($action) {
            case ('git'):
                $cmd = "git pull";
                break;
            case ('gitcheckout'):
                $branch = $request->input('branch');
                $cmd = "git checkout ${branch}";
                break;
            case ('gitreset'):
                $cmd = "git reset --hard HEAD";
                break;
            case ('migrate'):
                $cmd = "php artisan migrate";
                break;
            case ('composerinstall'):
                $cmd = "/usr/bin/composer install";
                break;
            case ('composerupdate'):
                $cmd = "/usr/bin/composer update";
                break;
            case ('npmbuild'):
                $cmd = "bash/npmbuild.sh";
                break;
            case ('npminstall'):
                $cmd = "bash/npminstall.sh";
                break;
            case ('maintenance'):
                $action = (app()->isDownForMaintenance()) ? 'up' : 'down';
                Artisan::call($action);
                return redirect()->back();
        }
        session([$action => 1]);
        $process = Process::fromShellCommandline($cmd, $dir);
        try {
            $process->mustRun();
            $output = $process->getOutput();

            $adminCommand->fill([
                'user_id' => Auth::user()->id,
                'command' => $cmd,
                'output' => $output,
                'status' => 1,
            ]);
            $adminCommand->save();

            return redirect()->back()->with('text', $output);

        } catch (ProcessFailedException $exception) {

            $adminCommand->fill([
                'user_id' => Auth::user()->id,
                'command' => $cmd,
                'output' => $exception->getMessage(),
                'status' => 0,
            ]);
            $adminCommand->save();
            return redirect()->back()->with('text', $exception->getMessage());;
        }
    }

}
