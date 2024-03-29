<?php

declare(strict_types=1);

// include __DIR__ . "/../Framework/App.php";
require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Config\Paths;
use Dotenv\Dotenv;

use function App\Config\{registerRoutes, registerMiddleware};

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$app = new App(Paths::SOURCE . "App/container-definitions.php");

registerRoutes($app);
registerMiddleware($app);

return $app;
