<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;

$app = new App();

$app->GET('/');
$app->GET('about/team');
$app->GET('/about/team');
$app->GET('/about/team//');
dd($app);
return $app;
