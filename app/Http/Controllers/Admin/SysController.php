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
        $process = Process::fromShellCommandline("git ls-remote | awk '{print $2}'");
        $process->run();
        $currentBranch = Process::fromShellCommandline("git branch | awk '/^\*/{print $2}' | tr -d '[:space:]' ");
        $currentBranch->run();
        $currentBranch = $currentBranch->getOutput();
        $filtered = array_filter(explode("\n", $process->getOutput()), function ($s) {
            return strripos($s, 'refs/heads/') === 0;
        });
        $branchList = array_map(fn ($s) =>mb_substr($s, 11), $filtered);

        return view('Admin.System', [
            'branchList' => $branchList,
            'currentBranch' => $currentBranch,
            ]);
    }

    public function action($action, Request $request)
    {
        echo $dir = config('app.dir');

        switch ($action) {
            case ('git'):
                $process = Process::fromShellCommandline('../bash/git.sh');
                session(['git' => 1]);
                break;
            case ('gitcheckout'):
                $branch = $request->input('branch');
                $process = Process::fromShellCommandline("git checkout ${branch}");
                return redirect()->back();

            case  ('migrate'):
                $process = Process::fromShellCommandline('../bash/migrate.sh');
                session(['migrate' => 1]);
                break;
            case  ('composer'):
                $process = Process::fromShellCommandline('../bash/composer.sh');
                session(['composer' => 1]);
                break;
            case  ('npmbuild'):
                $process = Process::fromShellCommandline('../bash/npmbuild.sh');
                break;
            case  ('maintenance'):
                $a = app()->isDownForMaintenance();
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
