<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    /**
     * Handles the request and returns a greeting response.
     *
     * @return Response A response object containing a greeting message.
     */
    public function index(): Response
    {
        return new Response("Hello!");
    }
}