<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 22/08/2018
 * Time: 14:58
 */

namespace AppBundle\Services;


use AppBundle\Entity\Personnage;
use Doctrine\ORM\EntityManagerInterface;

class PersonnageService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getPersonnage($id) {

        return $this->em->getRepository("AppBundle:Personnage")->find($id);
    }

    public function getAllPersonnage(){
        return $this->em->getRepository("AppBundle:Personnage")->findAll();
    }

    public function save(Personnage $personnage)
    {
        $this->em->persist($personnage);
        $this->em->flush();
    }

    public function delete(Personnage $personnage)
    {
        $this->em->remove($personnage);
        $this->em->flush();
    }


}