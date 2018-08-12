<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 12/08/2018
 * Time: 16:51
 */

namespace AppBundle\Services;

use AppBundle\Entity\TypeAnime;
use Doctrine\ORM\EntityManagerInterface;

class TypeAnimeService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getTypeAnime($id){
        return $this->em->getRepository("AppBundle:TypeAnime")->find($id);
    }

    public function getAllTypeAnime(){
        return $this->em->getRepository("AppBundle:TypeAnime")->findAll();
    }

    public function save(TypeAnime $typeAnime) {
        $this->em->persist($typeAnime);
        $this->em->flush();
    }

    public function delete(TypeAnime $typeAnime){
        $this->em->remove($typeAnime);
        $this->em->flush();
    }
}