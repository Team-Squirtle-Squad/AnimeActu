<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 14/08/2018
 * Time: 14:00
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="episode")
 */
class Episode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numEpisode;


    /**
     * @ORM\Column(type="string")
     */
    private $titreEpisode;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Saison")
     */
    private $saisons;

    /**
     * @return mixed
     */
    public function getSaisons()
    {
        return $this->saisons;
    }

    /**
     * @param mixed $saisons
     */
    public function setSaisons($saisons)
    {
        $this->saisons = $saisons;
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
    public function getNumEpisode()
    {
        return $this->numEpisode;
    }

    /**
     * @param mixed $numEpisode
     */
    public function setNumEpisode($numEpisode)
    {
        $this->numEpisode = $numEpisode;
    }

    /**
     * @return mixed
     */
    public function getTitreEpisode()
    {
        return $this->titreEpisode;
    }

    /**
     * @param mixed $titreEpisode
     */
    public function setTitreEpisode($titreEpisode)
    {
        $this->titreEpisode = $titreEpisode;
    }

    
}
