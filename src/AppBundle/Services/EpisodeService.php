<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 16/08/2018
 * Time: 13:26
 */

namespace AppBundle\Services;


use AppBundle\Entity\Episode;
use Doctrine\ORM\EntityManagerInterface;

class EpisodeService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAllEpisode()
    {
        return $this->em->getRepository("AppBundle:Episode")->findAll();
    }

    public function getEpisode($id)
    {

        return $this->em->getRepository("AppBundle:Episode")->find($id);
    }

    public function save(Episode $episode)
    {
        $this->em->persist($episode);
        $this->em->flush();
    }

    public function delete(Episode $episode)
    {
        $this->em->remove($episode);
        $this->em->flush();
    }
}