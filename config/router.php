<?php

use Lyrathor\Router\Request;
use Lyrathor\Router\Router;

Router::setNamespace("Lyramaker\Meucms");

Router::get("/", function () {
    if (!isset($_SESSION['login'])) {
        header('Location:/login');
    }
    exit;
});

Router::get("/login", function () {
    view("pages/login",['title'=>'MeuCMS | Realize o Login']);
});

Router::post("/login",function(Request $req){
    var_dump($req);
});
