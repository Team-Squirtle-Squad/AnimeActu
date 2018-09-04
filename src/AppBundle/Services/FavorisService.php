<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 31/08/2018
 * Time: 12:50
 */

namespace AppBundle\Services;


use AppBundle\Entity\Favoris;
use Doctrine\ORM\EntityManagerInterface;

class FavorisService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFavoris($id)
    {
        return $this->em->getRepository("AppBundle:Favoris")->find($id);
    }

    public function getAllFavoris()
    {
        return $this->em->getRepository("AppBundle:Favoris")->findAll();
    }

    public function save(Favoris $favoris)
    {
        $this->em->persist($favoris);
        $this->em->flush();
    }

    public function delete(Favoris $favoris)
    {
        $this->em->remove($favoris);
        $this->em->flush();
    }
}