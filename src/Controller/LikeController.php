<?php

namespace App\Controller;

use App\Entity\MicroPost;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class LikeController extends AbstractController
{
    #[Route('/like/{id}', name: 'app_like')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function like(
        MicroPost              $post,
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $currentUser = $this->getUser();
        $post->addLikedBy($currentUser);
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->redirect($request->headers->get('referer'));
    }

    #[Route('/unlike/{id}', name: 'app_unlike')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function unlike(
        MicroPost              $post,
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $currentUser = $this->getUser();
        $post->removeLikedBy($currentUser);
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->redirect($request->headers->get('referer'));
    }
}