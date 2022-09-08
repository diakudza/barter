<?php

namespace App\Services;


use Symfony\Component\Process\Process;

class ProcessService
{

    public static function run($cmd, $dir)
    {
        $process = Process::fromShellCommandline($cmd, $dir);
        $process->run();
        return [$process->getOutput(), $process->getStatus(), $process->getErrorOutput()];
    }
}
