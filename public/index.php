<?php

use Lyrathor\Router\Request;
use Lyrathor\Router\Router;
use function Lyrathor\Router\csrf;
use function Lyrathor\Router\verifyCsrf;

require __DIR__ . "/../config/boot.php";

$request = new Request();
$url = $request->url();
$method = $request->method();

$ignored_files = [
    "/favicon.ico",
    "/favicon.png",
    "/robots.txt",
    "/sitemap.xml",
    "/browserconfig.xml",
    "/site.webmanifest",
    "/apple-touch-icon.png",
    "/apple-touch-icon-precomposed.png",
    "/ads.txt",
    "/humans.txt",
    "/.well-known/security.txt"
];

if (in_array($url, $ignored_files)) {
    http_response_code(404);
    exit;
}

csrf();

if ($method !== "GET") {
    $tokenInPost = $_POST['_csrf'] ?? null;

    if (!$tokenInPost) {
        http_response_code(403);
        throw new ErrorException('Segurança: Token CSRF ausente no formulário ou header.');
    }

    if (!verifyCsrf($tokenInPost)) {
        http_response_code(419);
        throw new ErrorException('Erro de validação CSRF: Token inválido ou expirado.');
    }
}

(new Router)->dispatch();
