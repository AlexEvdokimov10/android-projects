<?php

require 'config.php';
require 'db.php';
require 'model.php';
require 'auth.php';
require 'controller.php';

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token,Authorization');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Toke, Authorization');

(new Controller())->run();