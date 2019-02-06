<?php
$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/Auth.class.php';

Auth::logout();
exit(header("Location: /calendario/view/login.php"));