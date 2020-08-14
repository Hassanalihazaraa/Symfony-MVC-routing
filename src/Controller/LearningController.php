<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/about-becode", name="about")
     * @param SessionInterface $session
     * @return Response
     */
    public function aboutMe(SessionInterface $session): Response
    {
        if ($session->get('name')) {
            return $this->render('learning/about-me.html.twig', ['name' => $session->get('name')]);
        } else {
            return $this->forward('App\Controller\LearningController::showMyName');
        }
    }

    /**
     * @Route("/", name="show-name")
     */
    public function showMyName(): Response
    {

        return $this->render('learning/show-myname.html.twig', ['showName' => 'Unknown']);
    }
}
