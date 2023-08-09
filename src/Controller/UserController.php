<?php

namespace App\Controller;

use Routing\Domain\Method;
use Routing\Domain\Route;

class UserController
{
    #[Route(uri: '/users', method: Method::GET)]
    public function index(): string
    {
        return "ola mundo";
    }

    #[Route(uri: '/users/{id}', method: Method::GET)]
    public function show(): string
    {
        return "ola mundo";
    }

    #[Route(uri: '/users/{id}', method: Method::POST)]
    public function show1(): string
    {
        return "ola mundo";
    }
}