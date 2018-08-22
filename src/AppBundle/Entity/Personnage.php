<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 22/08/2018
 * Time: 14:48
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="personnage")
 */
class Personnage
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
    private $nomPersonnage;

    /**
     * @ORM\Column(type="string")
     */
    private $typePersonnage;

    /**
     * @ORM\Column(type="string")
     */
    private $imagePersonnage;

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
    public function getImagePersonnage()
    {
        return $this->imagePersonnage;
    }

    /**
     * @param mixed $imagePersonnage
     */
    public function setImagePersonnage($imagePersonnage)
    {
        $this->imagePersonnage = $imagePersonnage;
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
    public function getNomPersonnage()
    {
        return $this->nomPersonnage;
    }

    /**
     * @param mixed $nomPersonnage
     */
    public function setNomPersonnage($nomPersonnage)
    {
        $this->nomPersonnage = $nomPersonnage;
    }

    /**
     * @return mixed
     */
    public function getTypePersonnage()
    {
        return $this->typePersonnage;
    }

    /**
     * @param mixed $typePersonnage
     */
    public function setTypePersonnage($typePersonnage)
    {
        $this->typePersonnage = $typePersonnage;
    }



}