<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleController extends Controller
{
    /**
     * @Route("/fr", name="fr")
     */
    function frAction(Request $request)
    {
        $request->getSession()->set('_locale', 'fr_FR');
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/de", name="de")
     */
    function deAction(Request $request)
    {
        $request->getSession()->set('_locale', 'de_DE');
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/en", name="en")
     */
    function enAction(Request $request)
    {
        $request->getSession()->set('_locale', 'en_EN');
        return $this->redirectToRoute('home');
    }
}
