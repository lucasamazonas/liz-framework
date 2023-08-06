<?php

namespace App\Controller;

use Routing\Domain\Method;
use Routing\Domain\Route;

class ProfileController
{
    #[Route(uri: '/profile', method: Method::GET)]
    public function getProfiles(): string
    {
        return "ola mundo";
    }
}