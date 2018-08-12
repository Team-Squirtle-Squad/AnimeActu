<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 12/08/2018
 * Time: 15:06
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="theme")
 */
class Theme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $libelleTheme;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Anime", mappedBy="themes")
     */
    private $animes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->animes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleTheme
     *
     * @param string $libelleTheme
     *
     * @return Theme
     */
    public function setLibelleTheme($libelleTheme)
    {
        $this->libelleTheme = $libelleTheme;

        return $this;
    }

    /**
     * Get libelleTheme
     *
     * @return string
     */
    public function getLibelleTheme()
    {
        return $this->libelleTheme;
    }

    /**
     * Add anime
     *
     * @param \AppBundle\Entity\Anime $anime
     *
     * @return Theme
     */
    public function addAnime(\AppBundle\Entity\Anime $anime)
    {
        $this->animes[] = $anime;

        return $this;
    }

    /**
     * Remove anime
     *
     * @param \AppBundle\Entity\Anime $anime
     */
    public function removeAnime(\AppBundle\Entity\Anime $anime)
    {
        $this->animes->removeElement($anime);
    }

    /**
     * Get animes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimes()
    {
        return $this->animes;
    }
}
