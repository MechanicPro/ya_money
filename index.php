#!/usr/bin/php
<?php

include 'MsgRecognition.php';
try {
    if (isset($argv[1]))
        $file = $argv[1];
    else
        throw new Exception('no file name entered');
    if (!file_exists($file))
        throw new Exception('file already exists');
    $msgStr = file_get_contents($file);

    $msgRecognition = new MsgRecognition();
    $result = $msgRecognition->recognition($msgStr);

    foreach ($result as $keyItem => $resItem) {
        echo $keyItem . ' => ' . $resItem . "\n";
    }
} catch (Exception $e) {
    echo "\n Error: " . $e->getMessage() . "\n";
}