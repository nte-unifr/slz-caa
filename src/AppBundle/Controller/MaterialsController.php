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

    /**
     * @Route("/debug", name="debug", defaults={"_format" = "html"})
     * @Route("/materials.{_format}", defaults={"_format" = "json"})
     */
    public function debugAction($_format)
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

            // translate spr
            $sprTranslated = [];
            foreach ($spr as $el) {
                $sprTranslated[$el] = $this->get('translator')->trans($el, [], 'spr');
            }

            // sort by key
            asort($sprTranslated);

            // move main langs to top
            $sprTranslated = array('ESP' => $sprTranslated['ESP']) + $sprTranslated; // pos 4
            $sprTranslated = array('ILS' => $sprTranslated['ILS']) + $sprTranslated; // pos 3
            $sprTranslated = array('EFL' => $sprTranslated['EFL']) + $sprTranslated; // pos 2
            $sprTranslated = array('FLE' => $sprTranslated['FLE']) + $sprTranslated; // pos 1
            $sprTranslated = array('DAF' => $sprTranslated['DAF']) + $sprTranslated; // pos 0

            return $this->render('materials/index.html.twig', array(
                'materials' => $materials,
                'spr' => $sprTranslated,
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

    private function getLocaleOrder(Request $request)
    {
        $lang = $request->getSession()->get('_locale');
        
        if ($lang === 'fr_FR') {
            return 'fr';
        } elseif ($lang === 'en_EN') {
            return 'en';
        } else {
            return 'de';
        }
    }
}
