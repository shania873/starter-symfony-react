<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;

class MyLog
{
    function __construct(private Filesystem $fs, private $logFile, private $logger)
    {
    }

    public function writeLog(string $message)
    {
        $this->fs->appendToFile('logs/logs.txt', $message . PHP_EOL);
    }
}
