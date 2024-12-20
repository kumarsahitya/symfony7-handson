<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController
{
    private array $greetings = [
        'Hello',
        'Hi',
        'Bye!',
    ];

    /**
     * Handles the request and returns a greeting response.
     *
     * @return Response A response object containing a greeting message.
     */
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return new Response(implode(', ', $this->greetings));
    }

    /**
     * Handles the request and returns a response with a specific greeting message.
     *
     * @param int|string $id The identifier for the greeting message to be returned.
     * @return Response A response object containing the specified greeting message.
     */
    #[Route('/messages/{id}', name: 'app_show_one')]
    public function showOne($id): Response
    {
        return new Response($this->greetings[$id]);
    }
}