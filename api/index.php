<?php

// Redireciona os ficheiros compilados e estáticos diretamente
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|pdf|ico|svg)$/', $_SERVER['REQUEST_URI'])) {
    return false;
}

// Carrega o arranque normal do Laravel
require __DIR__ . '/../public/index.php';