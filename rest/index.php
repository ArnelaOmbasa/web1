<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/services/MidtermService.php';

Flight::register('midtermService', 'MidtermService');

require 'routes/MidtermRoutes.php';

Flight::start();
