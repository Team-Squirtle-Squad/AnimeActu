<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 31/08/2018
 * Time: 12:51
 */

namespace AppBundle\Services;


use AppBundle\Entity\Note;
use Doctrine\ORM\EntityManagerInterface;

class NoteService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getNote($id)
    {
        return $this->em->getRepository("AppBundle:Note")->find($id);
    }

    public function getAllNote()
    {
        return $this->em->getRepository("AppBundle:Note")->findAll();
    }

    public function save(Note $note)
    {
        $this->em->persist($note);
        $this->em->flush();
    }

    public function delete(Note $note)
    {
        $this->em->remove($note);
        $this->em->flush();
    }
}