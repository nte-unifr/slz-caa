<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Csv;
use AppBundle\Entity\Material;

class CsvController extends Controller
{
    /**
     * @Route("/import", name="csv")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $csv = new Csv();

        $form = $this->createFormBuilder($csv)
            ->add('uploadedFile', 'file', array('label' => false))
            ->add('save', 'submit', array('label' => 'Import CSV', 'attr' => array('class' => 'btn-info btn-sm')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $csv = $form->getData();
            $csv->setName($csv->getUploadedFile()->getClientOriginalName());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($csv);
            $entityManager->flush();

            if ($this->import($csv)) {
                $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Import succeed.')
                ;
            }
        }

        return $this->render('csvs/index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     *
     */
    protected function import(Csv $csv)
    {
        // Using service to convert CSV to PHP array
        $converter = $this->get('import.csvtoarray');
        $helper = $this->container->get('vich_uploader.templating.helper.uploader_helper');
        $path = $helper->asset($csv, 'uploadedFile');
        $data = $converter->convert($this->container->getParameter('kernel.root_dir').'/../web'.$path);

        // Turn off doctrine default logs queries to save memory
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->getConfiguration()->setSQLLogger(null);

        // Empty materials table first
        $em->getConnection()->prepare('DROP TABLE IF EXISTS materials_backup')->execute();
        $em->getConnection()->prepare('CREATE TABLE materials_backup LIKE materials')->execute();
        $em->getConnection()->prepare('INSERT materials_backup SELECT * FROM materials')->execute();
        $em->createQuery('DELETE FROM AppBundle\Entity\Material')->execute();

        // Define frequency of persisting and index
        $batchSize = 20;
        $i = 1;

        foreach($data as $row) {

            // we import only material actually received
            if (strpos($row['ZUSTAND'], 'd') !== false) {
                $material = new Material();
                $material->setTitel($row['TITEL']);
                $material->setSpr($row['SPR']);
                $material->setFachbezug($row['FACHBEZUG']);
                $material->setAsl($row['ASL']);
                $material->setSprachniveau($row['SPRACHNIVEAU']);
                $material->setFertigkeit($row['FERTIGKEIT']);
                $material->setAusgangssprache($row['AUSGANGSSPRACHE']);
                $material->setMedium($row['MEDIUM']);
                $material->setJahr($row['JAHR']);
                $material->setAutor($row['AUTOR']);
                $material->setKommentar($row['KOMMENTAR']);
                $material->setNrcdrom($row['NRCDROM']);
                $material->setSb($row['SB']);
                $material->setSm2($row['SM2']);
                $material->setBereich($row['BEREICH']);
                $material->setZustand($row['ZUSTAND']);

                $em->persist($material);

                // Each 20, we flush everything
                if (($i % $batchSize) === 0) {
                    $em->flush();
                    $em->clear(); // detach all obj from Doctrine to save memory
                }
                $i++;
            }
        }

        $em->flush();
        $em->clear();

        $csv = $em->merge($csv);
        $em->remove($csv);
        $em->flush();

        return true;
    }
}
