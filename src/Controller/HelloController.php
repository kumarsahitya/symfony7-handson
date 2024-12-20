<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
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
    #[Route('/{limit<\d+>?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render(
            'hello/index.html.twig',
            [
                'message' => implode(', ', array_slice($this->greetings, 0, $limit)),
            ]
        );
        // return new Response(implode(', ', array_slice($this->greetings, 0, $limit)));
    }

    /**
     * Handles the request and returns a response with a specific greeting message.
     *
     * @param int|string $id The identifier for the greeting message to be returned.
     * @return Response A response object containing the specified greeting message.
     */
    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->greetings[$id]
            ]
        );
    }
}