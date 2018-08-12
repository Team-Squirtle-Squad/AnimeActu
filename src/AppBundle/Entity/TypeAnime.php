<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 12/08/2018
 * Time: 15:19
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="type_anime")
 */
class TypeAnime
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
    private $libelleTypeAnime;

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
     * Set libelleTypeAnime
     *
     * @param string $libelleTypeAnime
     *
     * @return TypeAnime
     */
    public function setLibelleTypeAnime($libelleTypeAnime)
    {
        $this->libelleTypeAnime = $libelleTypeAnime;

        return $this;
    }

    /**
     * Get libelleTypeAnime
     *
     * @return string
     */
    public function getLibelleTypeAnime()
    {
        return $this->libelleTypeAnime;
    }
}
