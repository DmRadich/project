<?php

function view(string $view_path, array $params = []): void
{
    extract($params, EXTR_SKIP);

    include $view_path . '.php';
}