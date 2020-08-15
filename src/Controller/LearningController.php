<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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
        if ($session->get('fullname')) {
            $name = $session->get('fullname');
            return $this->render('learning/about-me.html.twig', ['name' => $name]);
        }
        return $this->forward('App\Controller\LearningController::showMyName');

    }

    /**
     * @Route("/", name="show-name")
     * @param SessionInterface $session
     * @return Response
     */
    public function showMyName(SessionInterface $session): Response
    {
        if ($session->get('fullname')) {
            $name = $session->get('fullname');
        } else {
            $name = 'unknown';
        }
        return $this->render('learning/show-myname.html.twig', ['name' => $name]);
    }

    /**
     * @Route("/changeName", name="change-name", methods={"POST"})
     * @param Request $request
     * @param SessionInterface $session
     */
    public function changeMyName(Request $request, SessionInterface $session): RedirectResponse
    {
        $name = $request->request->get('fullname');
        $session->set('fullname', $name);

        return $this->redirectToRoute('show-name');
    }
}