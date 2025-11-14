<?php

namespace Src;

class Router
{
    public static function route($method, $uri)
    {
        require_once __DIR__ . '/Controllers/UserController.php';
        $controller = new \Src\Controllers\UserController();

        // Route untuk semua users
        if ($method === 'GET' && $uri === '/api/v1/users') {
            $controller->index();
        }
        // Route untuk user berdasarkan ID
        elseif ($method === 'GET' && preg_match('#^/api/v1/users/(\d+)$#', $uri, $matches)) {
            $controller->show($matches[1]);
        }
        else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Route not found']);
        }
    }
}
