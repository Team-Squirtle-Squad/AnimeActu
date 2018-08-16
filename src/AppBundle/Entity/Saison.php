<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 14/08/2018
 * Time: 12:29
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="saison")
 */
class Saison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbSaison;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSortie;

    /**
     * @ORM\Column(type="date")
     */
    private $DateSortie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateFini;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Anime")
     */
    private $animes;

    /**
     * @return mixed
     */
    public function getAnimes()
    {
        return $this->animes;
    }

    /**
     * @param mixed $animes
     */
    public function setAnimes($animes)
    {
        $this->animes = $animes;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNbSaison()
    {
        return $this->nbSaison;
    }

    /**
     * @param mixed $nbSaison
     */
    public function setNbSaison($nbSaison)
    {
        $this->nbSaison = $nbSaison;
    }

    /**
     * @return mixed
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * @param mixed $sortie
     */
    public function setSortie($sortie)
    {
        $this->sortie = $sortie;
    }

    /**
     * @return mixed
     */
    public function getDateSortie()
    {
        return $this->DateSortie;
    }

    /**
     * @param mixed $DateSortie
     */
    public function setDateSortie($DateSortie)
    {
        $this->DateSortie = $DateSortie;
    }

    /**
     * @return mixed
     */
    public function getDateFini()
    {
        return $this->DateFini;
    }

    /**
     * @param mixed $DateFini
     */
    public function setDateFini($DateFini)
    {
        $this->DateFini = $DateFini;
    }


    /**
     * Set isSortie
     *
     * @param boolean $isSortie
     *
     * @return Saison
     */
    public function setIsSortie($isSortie)
    {
        $this->isSortie = $isSortie;

        return $this;
    }

    /**
     * Get isSortie
     *
     * @return boolean
     */
    public function getIsSortie()
    {
        return $this->isSortie;
    }
}
