<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 12/08/2018
 * Time: 15:05
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="genre")
 */
class Genre
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
    private $libelleGenre;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Anime", mappedBy="genres")
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
     * Set libelleGenre
     *
     * @param string $libelleGenre
     *
     * @return Genre
     */
    public function setLibelleGenre($libelleGenre)
    {
        $this->libelleGenre = $libelleGenre;

        return $this;
    }

    /**
     * Get libelleGenre
     *
     * @return string
     */
    public function getLibelleGenre()
    {
        return $this->libelleGenre;
    }

    /**
     * Add anime
     *
     * @param \AppBundle\Entity\Anime $anime
     *
     * @return Genre
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
