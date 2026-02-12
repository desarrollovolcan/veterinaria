<?php

class BaseController
{
    protected function render(string $view, array $data = []): void
    {
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            http_response_code(404);
            echo 'Vista no encontrada';
            return;
        }

        extract($data, EXTR_SKIP);
        include __DIR__ . '/../Views/layout.php';
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
