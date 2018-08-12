<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 12/08/2018
 * Time: 16:05
 */

namespace AppBundle\Services;


use AppBundle\Entity\Genre;
use Doctrine\ORM\EntityManagerInterface;

class GenreService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getGenre($id){
        return $this->em->getRepository("AppBundle:Genre")->find($id);
    }

    public function getAllGenre(){
        return $this->em->getRepository("AppBundle:Genre")->findAll();
    }

    public function save(Genre $genre)
{
    $this->em->persist($genre);
    $this->em->flush();
}

    public function delete(Genre $genre){
        $this->em->remove($genre);
        $this->em->flush();
    }
}