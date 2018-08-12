<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 12/08/2018
 * Time: 16:51
 */

namespace AppBundle\Services;

use AppBundle\Entity\Theme;
use Doctrine\ORM\EntityManagerInterface;


class ThemeService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getTheme($id) {

        return $this->em->getRepository("AppBundle:Theme")->find($id);
    }

    public function getAllTheme() {
        return $this->em->getRepository("AppBundle:Theme")->findAll();
    }

    public function save(Theme $theme) {
        $this->em->persist($theme);
        $this->em->flush();
    }

    public function delete(Theme $theme) {
        $this->em->remove($theme);
        $this->em->flush();
    }

}