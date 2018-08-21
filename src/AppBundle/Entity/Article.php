<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 21/08/2018
 * Time: 13:56
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
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
    private $titreArticle;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateArticle;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $video;

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
    public function getTitreArticle()
    {
        return $this->titreArticle;
    }

    /**
     * @param mixed $titreArticle
     */
    public function setTitreArticle($titreArticle)
    {
        $this->titreArticle = $titreArticle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return mixed
     */
    public function getDateArticle()
    {
        return $this->dateArticle;
    }

    /**
     * @param mixed $dateArticle
     */
    public function setDateArticle($dateArticle)
    {
        $this->dateArticle = $dateArticle;
    }




}