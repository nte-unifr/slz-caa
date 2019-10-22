<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Parser;

class MaterialsController extends Controller
{

    /**
     * @Route("/materials/{id}.{_format}")
     */
    public function showAction($id, $_format)
    {
        if ($_format == "json") {
            $repository = $this->getDoctrine()->getRepository("AppBundle:Material");
            $material = $repository->find($id);
            $response = new Response(json_encode($material));
            return $response;
        }
    }

    /**
     * @Route("/", name="home", defaults={"_format" = "html"})
     * @Route("/materials.{_format}", defaults={"_format" = "json"})
     */
    public function indexAction($_format, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Material");
        $materials = $repository->findAll();

        if ($_format == "json") {
            $response = new Response(json_encode(array("count" => count($materials), "data" => $materials)));
            return $response;
        }
        else {
            // from yaml files
            $yaml = new Parser();
            $jahr = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/jahr.yml'));
            $fields = $yaml->parse(file_get_contents(__DIR__.'/../Resources/data/fields.yml'));

            // from DB
            $asl = $this->getDoctrine()->getRepository("AppBundle:Asl")->findBy([], [$this->getLocaleOrder($request) => 'ASC']);
            $fertigkeit = $this->getDoctrine()->getRepository("AppBundle:Fertigkeit")->findBy([], [$this->getLocaleOrder($request) => 'ASC']);
            $medium = $this->getDoctrine()->getRepository("AppBundle:Medium")->findBy([], [$this->getLocaleOrder($request) => 'ASC']);
            $sprachniveau = $this->getDoctrine()->getRepository("AppBundle:Sprachniveau")->findBy([], [$this->getLocaleOrder($request) => 'ASC']);
            $fachbezug_studiumberuf = $this->getDoctrine()->getRepository("AppBundle:Fachbezug")->findBy(['category' => 'studiumberuf'], [$this->getLocaleOrder($request) => 'ASC']);
            $fachbezug_alltag = $this->getDoctrine()->getRepository("AppBundle:Fachbezug")->findBy(['category' => 'alltag'], [$this->getLocaleOrder($request) => 'ASC']);
            $spr = $this->getDoctrine()->getRepository("AppBundle:Sprache")->findBy([], ['top' => 'DESC', $this->getLocaleOrder($request) => 'ASC']);
            $ausgangssprache = $this->getDoctrine()->getRepository("AppBundle:Sprache")->findBy(['top' => true], [$this->getLocaleOrder($request) => 'ASC']);

            return $this->render('materials/index.html.twig', array(
                'materials' => $materials,
                'spr' => $spr,
                'medium' => $medium,
                'ausgangssprache' => $ausgangssprache,
                'sprachniveau' => $sprachniveau,
                'asl' => $asl,
                'jahr' => $jahr,
                'fertigkeit' => $fertigkeit,
                'fields' => $fields,
                'fachbezug_studiumberuf' => $fachbezug_studiumberuf,
                'fachbezug_alltag' => $fachbezug_alltag
            ));
        }
    }

    private function getLocaleOrder(Request $request)
    {
        $lang = $request->getSession()->get('_locale');

        // no lang set in session, use default
        if ($lang == '') {
            $lang = $request->getDefaultLocale();
        }
        
        if (strpos($lang, 'fr') !== false) {
            return 'fr';
        } elseif (strpos($lang, 'en') !== false) {
            return 'en';
        } else {
            return 'de';
        }
    }
}
