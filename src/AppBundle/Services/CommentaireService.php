<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 30/08/2018
 * Time: 16:00
 */

namespace AppBundle\Services;


use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Favoris;
use AppBundle\Entity\Note;
use Doctrine\ORM\EntityManagerInterface;

class CommentaireService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getCommentaire($id)
    {
        return $this->em->getRepository("AppBundle:Commentaire")->find($id);
    }

    public function getAllCommentaire()
    {
        return $this->em->getRepository("AppBundle:Commentaire")->findAll();
    }

    public function save(Commentaire $commentaire) {
        $this->em->persist($commentaire);
        $this->em->flush();
    }

    public function delete(Commentaire $commentaire) {
        $this->em->remove($commentaire);
        $this->em->flush();
    }
}