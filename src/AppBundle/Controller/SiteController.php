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

    public function newsAction()
    {
        return $this->render('@App/news.html.twig');
    }

    public function profilAction()
    {
        return $this->render('@App/profil.html.twig');
    }
}
