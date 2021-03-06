<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Link
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Asl")
     * @ORM\OrderBy({"code" = "ASC"})
     * @ORM\JoinTable(name="links_asl",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="asl_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $asl;

    /**
     * @ORM\ManyToMany(targetEntity="Fachbezug")
     * @ORM\OrderBy({"code" = "ASC"})
     * @ORM\JoinTable(name="links_fachbezug",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fachbezug_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $fachbezug;

    /**
     * @ORM\ManyToMany(targetEntity="Fertigkeit")
     * @ORM\OrderBy({"code" = "ASC"})
     * @ORM\JoinTable(name="links_fertigkeit",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fertigkeit_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $fertigkeit;

    /**
     * @ORM\ManyToMany(targetEntity="Sprachniveau")
     * @ORM\OrderBy({"code" = "ASC"})
     * @ORM\JoinTable(name="links_sprachniveau",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sprachniveau_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $sprachniveau;

    /**
     * @ORM\ManyToMany(targetEntity="Sprache")
     * @ORM\OrderBy({"code" = "ASC"})
     * @ORM\JoinTable(name="links_ausgangssprache",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sprache_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $ausgangssprache;

    /**
     * @ORM\ManyToMany(targetEntity="Sprache")
     * @ORM\OrderBy({"code" = "ASC"})
     * @ORM\JoinTable(name="links_sprache",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sprache_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $sprache;

    /**
     * @ORM\ManyToMany(targetEntity="Lernmaterialformate")
     * @ORM\OrderBy({"de" = "ASC"})
     * @ORM\JoinTable(name="links_lernmaterialformate",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="lernmaterialformate_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $lernmaterialformate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt = null;


    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function update()
    {
        $this->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->asl = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     *
     * @return Link
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Link
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
     * Set description
     *
     * @param string $description
     *
     * @return Link
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add asl
     *
     * @param \AppBundle\Entity\Asl $asl
     *
     * @return Link
     */
    public function addAsl(\AppBundle\Entity\Asl $asl)
    {
        $this->asl[] = $asl;

        return $this;
    }

    /**
     * Remove asl
     *
     * @param \AppBundle\Entity\Asl $asl
     */
    public function removeAsl(\AppBundle\Entity\Asl $asl)
    {
        $this->asl->removeElement($asl);
    }

    /**
     * Get asl
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsl()
    {
        return $this->asl;
    }

    /**
     * Add fachbezug
     *
     * @param \AppBundle\Entity\Fachbezug $fachbezug
     *
     * @return Link
     */
    public function addFachbezug(\AppBundle\Entity\Fachbezug $fachbezug)
    {
        $this->fachbezug[] = $fachbezug;

        return $this;
    }

    /**
     * Remove fachbezug
     *
     * @param \AppBundle\Entity\Fachbezug $fachbezug
     */
    public function removeFachbezug(\AppBundle\Entity\Fachbezug $fachbezug)
    {
        $this->fachbezug->removeElement($fachbezug);
    }

    /**
     * Get fachbezug
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFachbezug()
    {
        return $this->fachbezug;
    }

    /**
     * Add fertigkeit
     *
     * @param \AppBundle\Entity\Fertigkeit $fertigkeit
     *
     * @return Link
     */
    public function addFertigkeit(\AppBundle\Entity\Fertigkeit $fertigkeit)
    {
        $this->fertigkeit[] = $fertigkeit;

        return $this;
    }

    /**
     * Remove fertigkeit
     *
     * @param \AppBundle\Entity\Fertigkeit $fertigkeit
     */
    public function removeFertigkeit(\AppBundle\Entity\Fertigkeit $fertigkeit)
    {
        $this->fertigkeit->removeElement($fertigkeit);
    }

    /**
     * Get fertigkeit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFertigkeit()
    {
        return $this->fertigkeit;
    }

    /**
     * Add sprachniveau
     *
     * @param \AppBundle\Entity\Sprachniveau $sprachniveau
     *
     * @return Link
     */
    public function addSprachniveau(\AppBundle\Entity\Sprachniveau $sprachniveau)
    {
        $this->sprachniveau[] = $sprachniveau;

        return $this;
    }

    /**
     * Remove sprachniveau
     *
     * @param \AppBundle\Entity\Sprachniveau $sprachniveau
     */
    public function removeSprachniveau(\AppBundle\Entity\Sprachniveau $sprachniveau)
    {
        $this->sprachniveau->removeElement($sprachniveau);
    }

    /**
     * Get sprachniveau
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSprachniveau()
    {
        return $this->sprachniveau;
    }

    /**
     * Add ausgangssprache
     *
     * @param \AppBundle\Entity\Sprache $ausgangssprache
     *
     * @return Link
     */
    public function addAusgangssprache(\AppBundle\Entity\Sprache $ausgangssprache)
    {
        $this->ausgangssprache[] = $ausgangssprache;

        return $this;
    }

    /**
     * Remove ausgangssprache
     *
     * @param \AppBundle\Entity\Sprache $ausgangssprache
     */
    public function removeAusgangssprache(\AppBundle\Entity\Sprache $ausgangssprache)
    {
        $this->ausgangssprache->removeElement($ausgangssprache);
    }

    /**
     * Get ausgangssprache
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAusgangssprache()
    {
        return $this->ausgangssprache;
    }

    /**
     * Add sprache
     *
     * @param \AppBundle\Entity\Sprache $sprache
     *
     * @return Link
     */
    public function addSprache(\AppBundle\Entity\Sprache $sprache)
    {
        $this->sprache[] = $sprache;

        return $this;
    }

    /**
     * Remove sprache
     *
     * @param \AppBundle\Entity\Sprache $sprache
     */
    public function removeSprache(\AppBundle\Entity\Sprache $sprache)
    {
        $this->sprache->removeElement($sprache);
    }

    /**
     * Get sprache
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSprache()
    {
        return $this->sprache;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Link
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add lernmaterialformate
     *
     * @param \AppBundle\Entity\Lernmaterialformate $lernmaterialformate
     *
     * @return Link
     */
    public function addLernmaterialformate(\AppBundle\Entity\Lernmaterialformate $lernmaterialformate)
    {
        $this->lernmaterialformate[] = $lernmaterialformate;

        return $this;
    }

    /**
     * Remove lernmaterialformate
     *
     * @param \AppBundle\Entity\Lernmaterialformate $lernmaterialformate
     */
    public function removeLernmaterialformate(\AppBundle\Entity\Lernmaterialformate $lernmaterialformate)
    {
        $this->lernmaterialformate->removeElement($lernmaterialformate);
    }

    /**
     * Get lernmaterialformate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLernmaterialformate()
    {
        return $this->lernmaterialformate;
    }
}
