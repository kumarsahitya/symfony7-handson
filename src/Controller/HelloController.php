<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        ['message' => 'Hello', 'created' => '2022/06/12'],
        ['message' => 'Hi', 'created' => '2022/04/12'],
        ['message' => 'Bye!', 'created' => '2021/05/12']
    ];

    /**
     * Handles the request and returns a greeting response.
     *
     * @return Response A response object containing a greeting message.
     */
    #[Route('/', name: 'app_index')]
    public function index(UserProfileRepository $profiles): Response
    {
//        $user = new User();
//        $user->setEmail('email@email.com');
//        $user->setPassword('12345678');
//
//        $profile = new UserProfile();
//        $profile->setUser($user);
//        $profiles->add($profile, true);
//
//        $profile = $profiles->find(1);
//        $profiles->remove($profile, true);

        return $this->render(
            'hello/index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => 3
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
                'message' => $this->messages[$id]
            ]
        );
    }
}