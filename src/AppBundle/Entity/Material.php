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
     * @ORM\Column(name="sb", type="string", length=255, nullable=false)
     */
    private $sb;

    /**
     * @var string
     *
     * @ORM\Column(name="s1", type="string", length=255, nullable=false)
     */
    private $s1;

    /**
     * @var string
     *
     * @ORM\Column(name="sk", type="string", length=255, nullable=false)
     */
    private $sk;

    /**
     * @var string
     *
     * @ORM\Column(name="sc", type="string", length=255, nullable=false)
     */
    private $sc;

    /**
     * @var string
     *
     * @ORM\Column(name="sv", type="string", length=255, nullable=false)
     */
    private $sv;

    /**
     * @var string
     *
     * @ORM\Column(name="s3", type="string", length=255, nullable=false)
     */
    private $s3;

    /**
     * @var string
     *
     * @ORM\Column(name="sm2", type="string", length=255, nullable=false)
     */
    private $sm2;

    /**
     * @var string
     *
     * @ORM\Column(name="nrcdrom", type="string", length=255, nullable=false)
     */
    private $nrcdrom;

    /**
     * @var string
     *
     * @ORM\Column(name="altsig", type="string", length=255, nullable=false)
     */
    private $altsig;

    /**
     * @var string
     *
     * @ORM\Column(name="original", type="string", length=255, nullable=false)
     */
    private $original;

    /**
     * @var string
     *
     * @ORM\Column(name="fi", type="string", length=255, nullable=false)
     */
    private $fi;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255, nullable=false)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="titel", type="string", length=255, nullable=false)
     */
    private $titel;

    /**
     * @var string
     *
     * @ORM\Column(name="in", type="string", length=255, nullable=false)
     */
    private $in;

    /**
     * @var string
     *
     * @ORM\Column(name="reihe", type="string", length=255, nullable=false)
     */
    private $reihe;

    /**
     * @var string
     *
     * @ORM\Column(name="verlag", type="string", length=255, nullable=false)
     */
    private $verlag;

    /**
     * @var string
     *
     * @ORM\Column(name="af", type="string", length=255, nullable=false)
     */
    private $af;

    /**
     * @var string
     *
     * @ORM\Column(name="ort", type="string", length=255, nullable=false)
     */
    private $ort;

    /**
     * @var string
     *
     * @ORM\Column(name="nr", type="string", length=255, nullable=false)
     */
    private $nr;

    /**
     * @var string
     *
     * @ORM\Column(name="jahr", type="string", length=255, nullable=false)
     */
    private $jahr;

    /**
     * @var string
     *
     * @ORM\Column(name="seiten", type="string", length=255, nullable=false)
     */
    private $seiten;

    /**
     * @var string
     *
     * @ORM\Column(name="adatum", type="string", length=255, nullable=false)
     */
    private $adatum;

    /**
     * @var string
     *
     * @ORM\Column(name="laenge", type="string", length=255, nullable=false)
     */
    private $laenge;

    /**
     * @var string
     *
     * @ORM\Column(name="sprache", type="string", length=255, nullable=false)
     */
    private $sprache;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="schlagwoerter", type="string", length=255, nullable=false)
     */
    private $schlagwoerter;

    /**
     * @var string
     *
     * @ORM\Column(name="zusatzmat", type="string", length=255, nullable=false)
     */
    private $zusatzmat;

    /**
     * @var string
     *
     * @ORM\Column(name="f3", type="string", length=255, nullable=false)
     */
    private $f3;

    /**
     * @var string
     *
     * @ORM\Column(name="feindeskriptoren", type="string", length=255, nullable=false)
     */
    private $feindeskriptoren;

    /**
     * @var string
     *
     * @ORM\Column(name="kommentar", type="string", length=255, nullable=false)
     */
    private $kommentar;

    /**
     * @var string
     *
     * @ORM\Column(name="bdatum", type="string", length=255, nullable=false)
     */
    private $bdatum;

    /**
     * @var string
     *
     * @ORM\Column(name="lieferant", type="string", length=255, nullable=false)
     */
    private $lieferant;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="string", length=255, nullable=false)
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="edatum", type="string", length=255, nullable=false)
     */
    private $edatum;

    /**
     * @var string
     *
     * @ORM\Column(name="zustand", type="string", length=255, nullable=false)
     */
    private $zustand;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=255, nullable=false)
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="meldung", type="string", length=255, nullable=false)
     */
    private $meldung;

    /**
     * @var string
     *
     * @ORM\Column(name="lizenz", type="string", length=255, nullable=false)
     */
    private $lizenz;

    /**
     * @var string
     *
     * @ORM\Column(name="preis", type="string", length=255, nullable=false)
     */
    private $preis;

    /**
     * @var string
     *
     * @ORM\Column(name="umfang", type="string", length=255, nullable=false)
     */
    private $umfang;

    /**
     * @var string
     *
     * @ORM\Column(name="bemerkungen", type="string", length=255, nullable=false)
     */
    private $bemerkungen;

    /**
     * @var string
     *
     * @ORM\Column(name="ausgeliehen", type="string", length=255, nullable=false)
     */
    private $ausgeliehen;

    /**
     * @var string
     *
     * @ORM\Column(name="bcu", type="string", length=255, nullable=false)
     */
    private $bcu;

    /**
     * @var string
     *
     * @ORM\Column(name="rv", type="string", length=255, nullable=false)
     */
    private $rv;

    /**
     * @var string
     *
     * @ORM\Column(name="zt", type="string", length=255, nullable=false)
     */
    private $zt;

    /**
     * @var string
     *
     * @ORM\Column(name="bereich", type="string", length=255, nullable=false)
     */
    private $bereich;

    /**
     * @var string
     *
     * @ORM\Column(name="zielsprache", type="string", length=255, nullable=false)
     */
    private $zielsprache;

    /**
     * @var string
     *
     * @ORM\Column(name="ausgangssprache", type="string", length=255, nullable=false)
     */
    private $ausgangssprache;

    /**
     * @var string
     *
     * @ORM\Column(name="sprachniveau", type="string", length=255, nullable=false)
     */
    private $sprachniveau;

    /**
     * @var string
     *
     * @ORM\Column(name="fertigkeit", type="string", length=255, nullable=false)
     */
    private $fertigkeit;

    /**
     * @var string
     *
     * @ORM\Column(name="fachbezug", type="string", length=255, nullable=false)
     */
    private $fachbezug;

    /**
     * @var string
     *
     * @ORM\Column(name="medium", type="string", length=255, nullable=false)
     */
    private $medium;

    /**
     * @var string
     *
     * @ORM\Column(name="standard", type="string", length=255, nullable=false)
     */
    private $standard;

    /**
     * @var string
     *
     * @ORM\Column(name="progkateg", type="string", length=255, nullable=false)
     */
    private $progkateg;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=false)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="anzahlkass", type="string", length=255, nullable=false)
     */
    private $anzahlkass;

    /**
     * @var string
     *
     * @ORM\Column(name="begleitmat", type="string", length=255, nullable=false)
     */
    private $begleitmat;

    /**
     * @var string
     *
     * @ORM\Column(name="spr", type="string", length=455, nullable=false)
     */
    private $spr;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_nr", type="string", length=255, nullable=false)
     */
    private $regNr;

    /**
     * @var string
     *
     * @ORM\Column(name="install", type="string", length=255, nullable=false)
     */
    private $install;

    /**
     * @var string
     *
     * @ORM\Column(name="asl", type="string", length=255, nullable=false)
     */
    private $asl;

    /**
     * @var string
     *
     * @ORM\Column(name="vcd", type="string", length=255, nullable=false)
     */
    private $vcd;

    /**
     * @var string
     *
     * @ORM\Column(name="auto_nr", type="string", length=255, nullable=false)
     */
    private $autoNr;

    /**
     * @var string
     *
     * @ORM\Column(name="setup", type="string", length=255, nullable=false)
     */
    private $setup;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="string", length=255, nullable=false)
     */
    private $remark;

    /**
     * @var string
     *
     * @ORM\Column(name="mdt_exp", type="string", length=255, nullable=false)
     */
    private $mdtExp;

    /**
     * @var string
     *
     * @ORM\Column(name="empty", type="string", length=255, nullable=false)
     */
    private $empty;



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
     * Set s1
     *
     * @param string $s1
     * @return Materials
     */
    public function setS1($s1)
    {
        $this->s1 = $s1;

        return $this;
    }

    /**
     * Get s1
     *
     * @return string
     */
    public function getS1()
    {
        return $this->s1;
    }

    /**
     * Set sk
     *
     * @param string $sk
     * @return Materials
     */
    public function setSk($sk)
    {
        $this->sk = $sk;

        return $this;
    }

    /**
     * Get sk
     *
     * @return string
     */
    public function getSk()
    {
        return $this->sk;
    }

    /**
     * Set sc
     *
     * @param string $sc
     * @return Materials
     */
    public function setSc($sc)
    {
        $this->sc = $sc;

        return $this;
    }

    /**
     * Get sc
     *
     * @return string
     */
    public function getSc()
    {
        return $this->sc;
    }

    /**
     * Set sv
     *
     * @param string $sv
     * @return Materials
     */
    public function setSv($sv)
    {
        $this->sv = $sv;

        return $this;
    }

    /**
     * Get sv
     *
     * @return string
     */
    public function getSv()
    {
        return $this->sv;
    }

    /**
     * Set s3
     *
     * @param string $s3
     * @return Materials
     */
    public function setS3($s3)
    {
        $this->s3 = $s3;

        return $this;
    }

    /**
     * Get s3
     *
     * @return string
     */
    public function getS3()
    {
        return $this->s3;
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
     * Set altsig
     *
     * @param string $altsig
     * @return Materials
     */
    public function setAltsig($altsig)
    {
        $this->altsig = $altsig;

        return $this;
    }

    /**
     * Get altsig
     *
     * @return string
     */
    public function getAltsig()
    {
        return $this->altsig;
    }

    /**
     * Set original
     *
     * @param string $original
     * @return Materials
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Get original
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set fi
     *
     * @param string $fi
     * @return Materials
     */
    public function setFi($fi)
    {
        $this->fi = $fi;

        return $this;
    }

    /**
     * Get fi
     *
     * @return string
     */
    public function getFi()
    {
        return $this->fi;
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
     * Set in
     *
     * @param string $in
     * @return Materials
     */
    public function setIn($in)
    {
        $this->in = $in;

        return $this;
    }

    /**
     * Get in
     *
     * @return string
     */
    public function getIn()
    {
        return $this->in;
    }

    /**
     * Set reihe
     *
     * @param string $reihe
     * @return Materials
     */
    public function setReihe($reihe)
    {
        $this->reihe = $reihe;

        return $this;
    }

    /**
     * Get reihe
     *
     * @return string
     */
    public function getReihe()
    {
        return $this->reihe;
    }

    /**
     * Set verlag
     *
     * @param string $verlag
     * @return Materials
     */
    public function setVerlag($verlag)
    {
        $this->verlag = $verlag;

        return $this;
    }

    /**
     * Get verlag
     *
     * @return string
     */
    public function getVerlag()
    {
        return $this->verlag;
    }

    /**
     * Set af
     *
     * @param string $af
     * @return Materials
     */
    public function setAf($af)
    {
        $this->af = $af;

        return $this;
    }

    /**
     * Get af
     *
     * @return string
     */
    public function getAf()
    {
        return $this->af;
    }

    /**
     * Set ort
     *
     * @param string $ort
     * @return Materials
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;

        return $this;
    }

    /**
     * Get ort
     *
     * @return string
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set nr
     *
     * @param string $nr
     * @return Materials
     */
    public function setNr($nr)
    {
        $this->nr = $nr;

        return $this;
    }

    /**
     * Get nr
     *
     * @return string
     */
    public function getNr()
    {
        return $this->nr;
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
     * Set seiten
     *
     * @param string $seiten
     * @return Materials
     */
    public function setSeiten($seiten)
    {
        $this->seiten = $seiten;

        return $this;
    }

    /**
     * Get seiten
     *
     * @return string
     */
    public function getSeiten()
    {
        return $this->seiten;
    }

    /**
     * Set adatum
     *
     * @param string $adatum
     * @return Materials
     */
    public function setAdatum($adatum)
    {
        $this->adatum = $adatum;

        return $this;
    }

    /**
     * Get adatum
     *
     * @return string
     */
    public function getAdatum()
    {
        return $this->adatum;
    }

    /**
     * Set laenge
     *
     * @param string $laenge
     * @return Materials
     */
    public function setLaenge($laenge)
    {
        $this->laenge = $laenge;

        return $this;
    }

    /**
     * Get laenge
     *
     * @return string
     */
    public function getLaenge()
    {
        return $this->laenge;
    }

    /**
     * Set sprache
     *
     * @param string $sprache
     * @return Materials
     */
    public function setSprache($sprache)
    {
        $this->sprache = $sprache;

        return $this;
    }

    /**
     * Get sprache
     *
     * @return string
     */
    public function getSprache()
    {
        return $this->sprache;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Materials
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set schlagwoerter
     *
     * @param string $schlagwoerter
     * @return Materials
     */
    public function setSchlagwoerter($schlagwoerter)
    {
        $this->schlagwoerter = $schlagwoerter;

        return $this;
    }

    /**
     * Get schlagwoerter
     *
     * @return string
     */
    public function getSchlagwoerter()
    {
        return $this->schlagwoerter;
    }

    /**
     * Set zusatzmat
     *
     * @param string $zusatzmat
     * @return Materials
     */
    public function setZusatzmat($zusatzmat)
    {
        $this->zusatzmat = $zusatzmat;

        return $this;
    }

    /**
     * Get zusatzmat
     *
     * @return string
     */
    public function getZusatzmat()
    {
        return $this->zusatzmat;
    }

    /**
     * Set f3
     *
     * @param string $f3
     * @return Materials
     */
    public function setF3($f3)
    {
        $this->f3 = $f3;

        return $this;
    }

    /**
     * Get f3
     *
     * @return string
     */
    public function getF3()
    {
        return $this->f3;
    }

    /**
     * Set feindeskriptoren
     *
     * @param string $feindeskriptoren
     * @return Materials
     */
    public function setFeindeskriptoren($feindeskriptoren)
    {
        $this->feindeskriptoren = $feindeskriptoren;

        return $this;
    }

    /**
     * Get feindeskriptoren
     *
     * @return string
     */
    public function getFeindeskriptoren()
    {
        return $this->feindeskriptoren;
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
     * Set bdatum
     *
     * @param string $bdatum
     * @return Materials
     */
    public function setBdatum($bdatum)
    {
        $this->bdatum = $bdatum;

        return $this;
    }

    /**
     * Get bdatum
     *
     * @return string
     */
    public function getBdatum()
    {
        return $this->bdatum;
    }

    /**
     * Set lieferant
     *
     * @param string $lieferant
     * @return Materials
     */
    public function setLieferant($lieferant)
    {
        $this->lieferant = $lieferant;

        return $this;
    }

    /**
     * Get lieferant
     *
     * @return string
     */
    public function getLieferant()
    {
        return $this->lieferant;
    }

    /**
     * Set budget
     *
     * @param string $budget
     * @return Materials
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return string
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set edatum
     *
     * @param string $edatum
     * @return Materials
     */
    public function setEdatum($edatum)
    {
        $this->edatum = $edatum;

        return $this;
    }

    /**
     * Get edatum
     *
     * @return string
     */
    public function getEdatum()
    {
        return $this->edatum;
    }

    /**
     * Set zustand
     *
     * @param string $zustand
     * @return Materials
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

    /**
     * Set isbn
     *
     * @param string $isbn
     * @return Materials
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set meldung
     *
     * @param string $meldung
     * @return Materials
     */
    public function setMeldung($meldung)
    {
        $this->meldung = $meldung;

        return $this;
    }

    /**
     * Get meldung
     *
     * @return string
     */
    public function getMeldung()
    {
        return $this->meldung;
    }

    /**
     * Set lizenz
     *
     * @param string $lizenz
     * @return Materials
     */
    public function setLizenz($lizenz)
    {
        $this->lizenz = $lizenz;

        return $this;
    }

    /**
     * Get lizenz
     *
     * @return string
     */
    public function getLizenz()
    {
        return $this->lizenz;
    }

    /**
     * Set preis
     *
     * @param string $preis
     * @return Materials
     */
    public function setPreis($preis)
    {
        $this->preis = $preis;

        return $this;
    }

    /**
     * Get preis
     *
     * @return string
     */
    public function getPreis()
    {
        return $this->preis;
    }

    /**
     * Set umfang
     *
     * @param string $umfang
     * @return Materials
     */
    public function setUmfang($umfang)
    {
        $this->umfang = $umfang;

        return $this;
    }

    /**
     * Get umfang
     *
     * @return string
     */
    public function getUmfang()
    {
        return $this->umfang;
    }

    /**
     * Set bemerkungen
     *
     * @param string $bemerkungen
     * @return Materials
     */
    public function setBemerkungen($bemerkungen)
    {
        $this->bemerkungen = $bemerkungen;

        return $this;
    }

    /**
     * Get bemerkungen
     *
     * @return string
     */
    public function getBemerkungen()
    {
        return $this->bemerkungen;
    }

    /**
     * Set ausgeliehen
     *
     * @param string $ausgeliehen
     * @return Materials
     */
    public function setAusgeliehen($ausgeliehen)
    {
        $this->ausgeliehen = $ausgeliehen;

        return $this;
    }

    /**
     * Get ausgeliehen
     *
     * @return string
     */
    public function getAusgeliehen()
    {
        return $this->ausgeliehen;
    }

    /**
     * Set bcu
     *
     * @param string $bcu
     * @return Materials
     */
    public function setBcu($bcu)
    {
        $this->bcu = $bcu;

        return $this;
    }

    /**
     * Get bcu
     *
     * @return string
     */
    public function getBcu()
    {
        return $this->bcu;
    }

    /**
     * Set rv
     *
     * @param string $rv
     * @return Materials
     */
    public function setRv($rv)
    {
        $this->rv = $rv;

        return $this;
    }

    /**
     * Get rv
     *
     * @return string
     */
    public function getRv()
    {
        return $this->rv;
    }

    /**
     * Set zt
     *
     * @param string $zt
     * @return Materials
     */
    public function setZt($zt)
    {
        $this->zt = $zt;

        return $this;
    }

    /**
     * Get zt
     *
     * @return string
     */
    public function getZt()
    {
        return $this->zt;
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
     * Set zielsprache
     *
     * @param string $zielsprache
     * @return Materials
     */
    public function setZielsprache($zielsprache)
    {
        $this->zielsprache = $zielsprache;

        return $this;
    }

    /**
     * Get zielsprache
     *
     * @return string
     */
    public function getZielsprache()
    {
        return $this->zielsprache;
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
     * Set standard
     *
     * @param string $standard
     * @return Materials
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;

        return $this;
    }

    /**
     * Get standard
     *
     * @return string
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * Set progkateg
     *
     * @param string $progkateg
     * @return Materials
     */
    public function setProgkateg($progkateg)
    {
        $this->progkateg = $progkateg;

        return $this;
    }

    /**
     * Get progkateg
     *
     * @return string
     */
    public function getProgkateg()
    {
        return $this->progkateg;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Materials
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set anzahlkass
     *
     * @param string $anzahlkass
     * @return Materials
     */
    public function setAnzahlkass($anzahlkass)
    {
        $this->anzahlkass = $anzahlkass;

        return $this;
    }

    /**
     * Get anzahlkass
     *
     * @return string
     */
    public function getAnzahlkass()
    {
        return $this->anzahlkass;
    }

    /**
     * Set begleitmat
     *
     * @param string $begleitmat
     * @return Materials
     */
    public function setBegleitmat($begleitmat)
    {
        $this->begleitmat = $begleitmat;

        return $this;
    }

    /**
     * Get begleitmat
     *
     * @return string
     */
    public function getBegleitmat()
    {
        return $this->begleitmat;
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
     * Set regNr
     *
     * @param string $regNr
     * @return Materials
     */
    public function setRegNr($regNr)
    {
        $this->regNr = $regNr;

        return $this;
    }

    /**
     * Get regNr
     *
     * @return string
     */
    public function getRegNr()
    {
        return $this->regNr;
    }

    /**
     * Set install
     *
     * @param string $install
     * @return Materials
     */
    public function setInstall($install)
    {
        $this->install = $install;

        return $this;
    }

    /**
     * Get install
     *
     * @return string
     */
    public function getInstall()
    {
        return $this->install;
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

    /**
     * Set vcd
     *
     * @param string $vcd
     * @return Materials
     */
    public function setVcd($vcd)
    {
        $this->vcd = $vcd;

        return $this;
    }

    /**
     * Get vcd
     *
     * @return string
     */
    public function getVcd()
    {
        return $this->vcd;
    }

    /**
     * Set autoNr
     *
     * @param string $autoNr
     * @return Materials
     */
    public function setAutoNr($autoNr)
    {
        $this->autoNr = $autoNr;

        return $this;
    }

    /**
     * Get autoNr
     *
     * @return string
     */
    public function getAutoNr()
    {
        return $this->autoNr;
    }

    /**
     * Set setup
     *
     * @param string $setup
     * @return Materials
     */
    public function setSetup($setup)
    {
        $this->setup = $setup;

        return $this;
    }

    /**
     * Get setup
     *
     * @return string
     */
    public function getSetup()
    {
        return $this->setup;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Materials
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set mdtExp
     *
     * @param string $mdtExp
     * @return Materials
     */
    public function setMdtExp($mdtExp)
    {
        $this->mdtExp = $mdtExp;

        return $this;
    }

    /**
     * Get mdtExp
     *
     * @return string
     */
    public function getMdtExp()
    {
        return $this->mdtExp;
    }

    /**
     * Set empty
     *
     * @param string $empty
     * @return Materials
     */
    public function setEmpty($empty)
    {
        $this->empty = $empty;

        return $this;
    }

    /**
     * Get empty
     *
     * @return string
     */
    public function getEmpty()
    {
        return $this->empty;
    }

    public function jsonSerialize()
    {
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
            'jahr' => $this->jahr,
            'autor' => $this->autor,
            'code' => $this->bereich."|".$this->spr."|".$this->sb."|".$this->sm2,
            'kommentar' => $this->kommentar,
            'nrcdrom' => explode(" ", $this->nrcdrom)
        );
    }

    // Utility

    public function sprachniveauDisplay($string)
    {
        $result = "";
        $sprachniveaux = explode(" ", $string);
        foreach ($sprachniveaux as $index => $sprachniveau) {
            $result .= '<span class="label label-default">' . $sprachniveau . '</span>';
            if ($index != count($sprachniveaux)-1) {
                $result .= '&nbsp;';
            }
        }
        return $result;
    }
}
