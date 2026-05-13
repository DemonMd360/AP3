<?php

use CodeIgniter\Boot;
use Config\Paths;

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

require FCPATH . '../app/Config/Paths.php';

$paths = new Paths();

define('ENVIRONMENT', $_SERVER['CI_ENVIRONMENT'] ?? 'production');


require $paths->systemDirectory . '/Boot.php';

exit(Boot::bootWeb($paths));
