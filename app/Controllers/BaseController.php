<?php

abstract class BaseController
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        include __DIR__ . '/../Views/layouts/main.php';
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
