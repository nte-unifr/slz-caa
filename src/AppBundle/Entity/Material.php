<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Materials
 *
 * @ORM\Table(name="materials")
 * @ORM\Entity
 */
class Material implements JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sb", type="string", length=500, nullable=false)
     */
    private $sb;

    /**
     * @var string
     *
     * @ORM\Column(name="sm2", type="string", length=500, nullable=false)
     */
    private $sm2;

    /**
     * @var string
     *
     * @ORM\Column(name="nrcdrom", type="string", length=500, nullable=false)
     */
    private $nrcdrom;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=500, nullable=false)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="titel", type="string", length=500, nullable=false)
     */
    private $titel;

    /**
     * @var string
     *
     * @ORM\Column(name="jahr", type="string", length=500, nullable=false)
     */
    private $jahr;

    /**
     * @var text
     *
     * @ORM\Column(name="kommentar", type="text", nullable=false)
     */
    private $kommentar;

    /**
     * @var string
     *
     * @ORM\Column(name="bereich", type="string", length=500, nullable=false)
     */
    private $bereich;

    /**
     * @var string
     *
     * @ORM\Column(name="ausgangssprache", type="text", nullable=false)
     */
    private $ausgangssprache;

    /**
     * @var string
     *
     * @ORM\Column(name="sprachniveau", type="string", length=500, nullable=false)
     */
    private $sprachniveau;

    /**
     * @var string
     *
     * @ORM\Column(name="fertigkeit", type="string", length=500, nullable=false)
     */
    private $fertigkeit;

    /**
     * @var string
     *
     * @ORM\Column(name="fachbezug", type="string", length=500, nullable=false)
     */
    private $fachbezug;

    /**
     * @var string
     *
     * @ORM\Column(name="medium", type="string", length=500, nullable=false)
     */
    private $medium;

    /**
     * @var string
     *
     * @ORM\Column(name="spr", type="string", length=500, nullable=false)
     */
    private $spr;

    /**
     * @var string
     *
     * @ORM\Column(name="asl", type="string", length=500, nullable=false)
     */
    private $asl;

    /**
     * @var string
     *
     * @ORM\Column(name="zustand", type="string", length=100)
     */
    private $zustand;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sb
     *
     * @param string $sb
     * @return Materials
     */
    public function setSb($sb)
    {
        $this->sb = $sb;

        return $this;
    }

    /**
     * Get sb
     *
     * @return string
     */
    public function getSb()
    {
        return $this->sb;
    }

    /**
     * Set sm2
     *
     * @param string $sm2
     * @return Materials
     */
    public function setSm2($sm2)
    {
        $this->sm2 = $sm2;

        return $this;
    }

    /**
     * Get sm2
     *
     * @return string
     */
    public function getSm2()
    {
        return $this->sm2;
    }

    /**
     * Set nrcdrom
     *
     * @param string $nrcdrom
     * @return Materials
     */
    public function setNrcdrom($nrcdrom)
    {
        $this->nrcdrom = $nrcdrom;

        return $this;
    }

    /**
     * Get nrcdrom
     *
     * @return string
     */
    public function getNrcdrom()
    {
        return $this->nrcdrom;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Materials
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set titel
     *
     * @param string $titel
     * @return Materials
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;

        return $this;
    }

    /**
     * Get titel
     *
     * @return string
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Set jahr
     *
     * @param string $jahr
     * @return Materials
     */
    public function setJahr($jahr)
    {
        $this->jahr = $jahr;

        return $this;
    }

    /**
     * Get jahr
     *
     * @return string
     */
    public function getJahr()
    {
        return $this->jahr;
    }

    /**
     * Set kommentar
     *
     * @param string $kommentar
     * @return Materials
     */
    public function setKommentar($kommentar)
    {
        $this->kommentar = $kommentar;

        return $this;
    }

    /**
     * Get kommentar
     *
     * @return string
     */
    public function getKommentar()
    {
        return $this->kommentar;
    }

    /**
     * Set bereich
     *
     * @param string $bereich
     * @return Materials
     */
    public function setBereich($bereich)
    {
        $this->bereich = $bereich;

        return $this;
    }

    /**
     * Get bereich
     *
     * @return string
     */
    public function getBereich()
    {
        return $this->bereich;
    }

    /**
     * Set ausgangssprache
     *
     * @param string $ausgangssprache
     * @return Materials
     */
    public function setAusgangssprache($ausgangssprache)
    {
        $this->ausgangssprache = $ausgangssprache;

        return $this;
    }

    /**
     * Get ausgangssprache
     *
     * @return string
     */
    public function getAusgangssprache()
    {
        return $this->ausgangssprache;
    }

    /**
     * Set sprachniveau
     *
     * @param string $sprachniveau
     * @return Materials
     */
    public function setSprachniveau($sprachniveau)
    {
        $this->sprachniveau = $sprachniveau;

        return $this;
    }

    /**
     * Get sprachniveau
     *
     * @return string
     */
    public function getSprachniveau()
    {
        return $this->sprachniveau;
    }

    /**
     * Set fertigkeit
     *
     * @param string $fertigkeit
     * @return Materials
     */
    public function setFertigkeit($fertigkeit)
    {
        $this->fertigkeit = $fertigkeit;

        return $this;
    }

    /**
     * Get fertigkeit
     *
     * @return string
     */
    public function getFertigkeit()
    {
        return $this->fertigkeit;
    }

    /**
     * Set fachbezug
     *
     * @param string $fachbezug
     * @return Materials
     */
    public function setFachbezug($fachbezug)
    {
        $this->fachbezug = $fachbezug;

        return $this;
    }

    /**
     * Get fachbezug
     *
     * @return string
     */
    public function getFachbezug()
    {
        return $this->fachbezug;
    }

    /**
     * Set medium
     *
     * @param string $medium
     * @return Materials
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;

        return $this;
    }

    /**
     * Get medium
     *
     * @return string
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Set spr
     *
     * @param string $spr
     * @return Materials
     */
    public function setSpr($spr)
    {
        $this->spr = $spr;

        return $this;
    }

    /**
     * Get spr
     *
     * @return string
     */
    public function getSpr()
    {
        return $this->spr;
    }

    /**
     * Set asl
     *
     * @param string $asl
     * @return Materials
     */
    public function setAsl($asl)
    {
        $this->asl = $asl;

        return $this;
    }

    /**
     * Get asl
     *
     * @return string
     */
    public function getAsl()
    {
        return $this->asl;
    }

    public function jsonSerialize()
    {
        $jahr = is_numeric($this->jahr) ? $this->jahr : '';
        return array(
            'id' => $this->id,
            'titel' => $this->titel,
            'spr' => explode(" ", $this->spr),
            'fachbezug' => explode(" ", $this->fachbezug),
            'asl' => explode(" ", $this->asl),
            'sprachniveau' => explode(" ", $this->sprachniveau),
            'fertigkeit' => explode(" ", $this->fertigkeit),
            'ausgangssprache' => explode(" ", $this->ausgangssprache),
            'medium' => explode(" ", $this->medium),
            'jahr' => $jahr,
            'autor' => $this->autor,
            'code' => $this->bereich."|".$this->spr."|".$this->sb."|".$this->sm2,
            'kommentar' => $this->kommentar,
            'nrcdrom' => explode(" ", $this->nrcdrom)
        );
    }

    /**
     * Set zustand
     *
     * @param string $zustand
     *
     * @return Material
     */
    public function setZustand($zustand)
    {
        $this->zustand = $zustand;

        return $this;
    }

    /**
     * Get zustand
     *
     * @return string
     */
    public function getZustand()
    {
        return $this->zustand;
    }
}
