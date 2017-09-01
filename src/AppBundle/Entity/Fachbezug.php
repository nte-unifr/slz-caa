<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fachbezug
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fachbezug
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="matching", type="string", length=500)
     */
    private $matching;

    /**
     * @var string
     *
     * @ORM\Column(name="de", type="string", length=255)
     */
    private $de;

    /**
     * @var string
     *
     * @ORM\Column(name="en", type="string", length=255)
     */
    private $en;

    /**
     * @var string
     *
     * @ORM\Column(name="fr", type="string", length=255)
     */
    private $fr;


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
     * Set code
     *
     * @param string $code
     *
     * @return Fachbezug
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Fachbezug
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set matching
     *
     * @param string $matching
     *
     * @return Fachbezug
     */
    public function setMatching($matching)
    {
        $this->matching = $matching;

        return $this;
    }

    /**
     * Get matching
     *
     * @return string
     */
    public function getMatching()
    {
        return $this->matching;
    }

    /**
     * Set de
     *
     * @param string $de
     *
     * @return Fachbezug
     */
    public function setDe($de)
    {
        $this->de = $de;

        return $this;
    }

    /**
     * Get de
     *
     * @return string
     */
    public function getDe()
    {
        return $this->de;
    }

    /**
     * Set en
     *
     * @param string $en
     *
     * @return Fachbezug
     */
    public function setEn($en)
    {
        $this->en = $en;

        return $this;
    }

    /**
     * Get en
     *
     * @return string
     */
    public function getEn()
    {
        return $this->en;
    }

    /**
     * Set fr
     *
     * @param string $fr
     *
     * @return Fachbezug
     */
    public function setFr($fr)
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * Get fr
     *
     * @return string
     */
    public function getFr()
    {
        return $this->fr;
    }
}

