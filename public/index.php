<?php
    require '../autoload.php';
    $routes = new \Ijdb\Routes();
    $entryPoint = new \SE3\EntryPoint($routes);
    error_reporting(1);
    $entryPoint->run();