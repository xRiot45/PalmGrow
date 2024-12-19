<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'role' => [
            \App\Http\Middleware\RoleMiddleware::class,
        ],
        'auth' => [
            \App\Http\Middleware\AuthMiddleware::class,
        ],
    ];
}
