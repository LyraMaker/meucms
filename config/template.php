<?php

use Lyramaker\Meucms\extensions\Latte\MethodExtension;

use Latte\Engine;
use Lyramaker\Meucms\extensions\Latte\CsfrExtension;
use Lyramaker\Meucms\Latte\Extension\ExtensionMethod;

function latte(): Engine
{
    static $latte = null;

    if ($latte === null) {
        $latte = new Engine;

        $latte->setCacheDirectory(__DIR__ . "/../temp");
        $latte->setAutoRefresh(true);
    }

    $latte->addExtension(new ExtensionMethod);
    
    return $latte;
}


function view(string $view, array $params = [], string $path = __DIR__ . "/../resource/view/")
{
    $filePath = rtrim($path, DIRECTORY_SEPARATOR)
        . DIRECTORY_SEPARATOR
        . ltrim($view, DIRECTORY_SEPARATOR)
        . '.latte';

    latte()->render($filePath, $params);
}
