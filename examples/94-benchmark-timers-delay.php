<?php

use React\EventLoop\Factory;

require __DIR__ . '/../vendor/autoload.php';

$loop = Factory::create();

$ticks = isset($argv[1]) ? (int)$argv[1] : 1000 * 100;
$tick = function () use (&$tick, &$ticks, $loop) {
    if ($ticks > 0) {
        --$ticks;
        //$loop->nextTick($tick);
        $loop->addTimer(0, $tick);
    } else {
        echo 'done';
    }
};

$tick();

$loop->run();