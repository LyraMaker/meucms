<?php

$latte = new Latte\Engine;

$latte->setCacheDirectory(__DIR__ . "/../temp");

$latte->setAutoRefresh(true);

function view(string $view, array $params = [], string $path = __DIR__ . "/../resource/view/")
{
    global $latte;
    
    $filePath = rtrim($path, '/') . '/' . ltrim($view, '/') . '.latte';
    
    $latte->render($filePath, $params);
}
