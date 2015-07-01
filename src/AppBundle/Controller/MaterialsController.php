<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MaterialsController extends Controller
{
    /**
     * @Route("/", name="materials")
     */
    public function indexAction()
    {
        return $this->render('materials/index.html.twig');
    }
}
