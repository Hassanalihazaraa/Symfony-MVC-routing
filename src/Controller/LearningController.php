<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/about-becode", name="about")
     */
    public function aboutMe(): Response
    {
        return $this->render('learning/about-me.html.twig', ['name' => 'Becode']);
    }

    /**
     * @Route("/", name="show-name")
     */
    public function showMyName()
    {
        return $this->render('learning/show-myname.html.twig', ['showName' => 'Unknown']);
    }
}
