<?php

declare(strict_types=1);

// include __DIR__ . "/../Framework/App.php";
require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;

$app = new App();

$app->get('/');

dd($app);

return $app;