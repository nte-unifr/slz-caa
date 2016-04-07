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
     * @Route("/materials.{_format}", defaults={"_format" = "json"})
     */
    public function indexAction($_format)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Material");
        $materials = $repository->findAll();

        if ($_format == "json") {
            $response = new Response(json_encode(array("count" => count($materials), "data" => $materials)));
            return $response;
        }
        else {
            $yaml = new Parser();
            $spr = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/spr.yml'));
            $medium = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/medium.yml'));
            $ausgangssprache = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/ausgangssprache.yml'));
            $sprachniveau = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/sprachniveau.yml'));
            $fachbezug = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/fachbezug.yml'));
            $asl = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/asl.yml'));
            $jahr = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/jahr.yml'));
            $fertigkeit = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/fertigkeit.yml'));
            $fields = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/fields.yml'));
            return $this->render('materials/index.html.twig', array(
                'materials' => $materials,
                'spr' => $spr,
                'medium' => $medium,
                'ausgangssprache' => $ausgangssprache,
                'sprachniveau' => $sprachniveau,
                'fachbezug' => $fachbezug,
                'asl' => $asl,
                'jahr' => $jahr,
                'fertigkeit' => $fertigkeit,
                'fields' => $fields
            ));
        }
    }

    /**
     * @Route("/materials/{id}.{_format}", requirements={"id" = "\d+"}, defaults={"id" = 1, "_format" = "json"})
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
