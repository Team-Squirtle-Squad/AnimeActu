<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 14/08/2018
 * Time: 14:18
 */

namespace AppBundle\Services;

use AppBundle\Entity\Anime;
use AppBundle\Entity\Saison;
use Doctrine\ORM\EntityManagerInterface;

class SaisonService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getSaison($id)
    {

        return $this->em->getRepository("AppBundle:Saison")->find($id);
    }

    public function getAllSaison()
    {
        return $this->em->getRepository("AppBundle:Saison")->findAll();
    }

    public function getAllAnime()
    {
        return $this->em->getRepository("AppBundle:Anime")->findAll();
    }

    public function save(Saison $saison)
    {
        $this->em->persist($saison);
        $this->em->flush();
    }

    public function delete(Saison $saison)
    {
        $this->em->remove($saison);
        $this->em->flush();
    }


}