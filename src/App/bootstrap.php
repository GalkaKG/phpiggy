<?php

declare(strict_types=1);

// include __DIR__ . "/../Framework/App.php";
require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;

use function App\Config\registerRoutes;

$app = new App();

registerRoutes($app);

return $app;