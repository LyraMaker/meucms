<?php

$latte = new Latte\Engine;

$latte->setCacheDirectory(__DIR__ . "/../temp");

// Enable auto-refresh for development mode. It recompiles templates on every request.
$latte->setautoRefresh();

function view(string $view, string $path = "../resource/view/")
{
    global $latte;
    $latte->render($path . "/$view.latte");
}
