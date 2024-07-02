<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require('../app/init.php');
require('../vendor/autoload.php');

$app = new App();
