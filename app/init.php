<?php

require_once 'core/app.php';
require_once 'core/config.php';
require_once 'libs/interfaces/app-interface.php';
require_once 'core/controller.php';
require_once 'libs/requirements.php';
require_once 'libs/response.php';
require_once 'libs/connection/pdo/model.php';
require_once 'libs/connection/pdo/pdo.php';

$app = new App();
$app->_init();
