<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;

class MaterialsController extends Controller
{
    /**
     * @Route("/", name="home", defaults={"_format" = "html"})
     * @Route("/materials.{_format}", defaults={"_format" = "html"})
     */
    public function indexAction($_format)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Material");
        $materials = $repository->findAll();

        if ($_format == "json") {
            $response = new Response(json_encode(array("data" => $materials)));
            return $response;
        }
        else {
            $yaml = new Parser();
            $languages = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/languages.yml'));
            $medias = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/medias.yml'));
            $languages_source = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/languages_source.yml'));
            $levels = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/levels.yml'));
            $themes = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/themes.yml'));
            return $this->render('materials/index.html.twig', array(
                'materials' => $materials,
                'languages' => $languages,
                'medias' => $medias,
                'languages_source' => $languages_source,
                'levels' => $levels,
                'themes' => $themes
            ));
        }
    }

    /**
     * @Route("/materials/{id}.{_format}", requirements={"id" = "\d+"}, defaults={"id" = 1, "_format" = "html"})
     */
    public function showAction($id, $_format) {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Material');
        $material = $repository->find($id);

        if ($_format == "json") {
            $response = new Response(json_encode($material));
            return $response;
        }
    }
}
