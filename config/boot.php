<?php
require __DIR__."/../vendor/autoload.php";

use function Lyrathor\Router\csrf;

session_start();

csrf();

require __DIR__."/./template.php";
require __DIR__."/./router.php";
