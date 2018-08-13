<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 13/08/2018
 * Time: 15:19
 */

namespace AppBundle\Services;

use AppBundle\Entity\Anime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AnimeService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAnime($id) {

        return $this->em->getRepository("AppBundle:Anime")->find($id);
    }

    public function getAllAnime(){
        return $this->em->getRepository("AppBundle:Anime")->findAll();
    }

    public function getAllGenre(){
        return $this->em->getRepository("AppBundle:Genre")->findAll();
    }

    public function getAllTheme() {
        return $this->em->getRepository("AppBundle:Theme")->findAll();
    }

    public function save(Anime $anime) {
        $this->em->persist($anime);
        $this->em->flush();
    }

    public function delete(Anime $anime) {
        $this->em->remove($anime);
        $this->em->flush();
    }

    public function upload(UploadedFile $file, $paramDir){
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($paramDir, $fileName);
        return $fileName;
    }
}