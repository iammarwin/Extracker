<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Conrollers\HomeConroller;

$app = new App();

$app->get('/', [HomeConroller::class, 'home']);

return $app;
