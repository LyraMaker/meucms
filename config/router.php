<?php

use Lyrathor\Router\Router;

Router::setNamespace("Lyramaker\Meucms");

Router::get("/", function(){
    view('pages/login');
});

