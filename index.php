<?php

$autoloadPath = __DIR__ . '/vendor/autoload.php';
require_once $autoloadPath;

use function Hexlet\Phpunit\Candidates\calcSum;

echo calcSum() . "\n";


