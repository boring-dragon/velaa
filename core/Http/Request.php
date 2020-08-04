<?php

namespace Velaa\Core\Http;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{
    public function uri()
    {
        parent::getRequestUri();
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
