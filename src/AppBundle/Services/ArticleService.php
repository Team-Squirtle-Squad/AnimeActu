<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 21/08/2018
 * Time: 14:04
 */

namespace AppBundle\Services;


use AppBundle\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getArticle($id) {

        return $this->em->getRepository("AppBundle:Article")->find($id);
    }

    public function getAllArticle(){
        return $this->em->getRepository("AppBundle:Article")->findAll();
    }

    public function save(Article $article)
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    public function delete(Article $article)
    {
        $this->em->remove($article);
        $this->em->flush();
    }

}