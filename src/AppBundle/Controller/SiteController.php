<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function homeAction()
    {
        return $this->render('@App/home.html.twig');
    }


    public function animeAction()
    {
        return $this->render('@App/anime.html.twig');
    }
}
