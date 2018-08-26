<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 09/08/2018
 * Time: 20:08
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Anime;
use AppBundle\Entity\Article;
use AppBundle\Entity\Episode;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Personnage;
use AppBundle\Entity\Saison;
use AppBundle\Entity\Theme;
use AppBundle\Entity\TypeAnime;
use AppBundle\Form\AnimeType;
use AppBundle\Form\ArticleType;
use AppBundle\Form\EpisodeType;
use AppBundle\Form\GenreType;
use AppBundle\Form\PersonnageType;
use AppBundle\Form\SaisonType;
use AppBundle\Form\ThemeType;
use AppBundle\Form\TypeAnimeType;
use AppBundle\Services\AnimeService;
use AppBundle\Services\ArticleService;
use AppBundle\Services\EpisodeService;
use AppBundle\Services\GenreService;
use AppBundle\Services\PersonnageService;
use AppBundle\Services\SaisonService;
use AppBundle\Services\ThemeService;
use AppBundle\Services\TypeAnimeService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnimeController extends Controller
{
    public function listeAnimeAction(AnimeService $animeService)
    {
        return $this->render('@App/listeAnime.html.twig', array("animes" => $animeService->getAllAnime()));
    }

    public function addAndUpdateAnimeAction(Request $request, AnimeService $animeService, $id = null)
    {
        if ($id === null) {
            $anime = new Anime();
        } else {
            $anime = $animeService->getAnime($id);
        }
        $photoTmp = $anime->getCouverture();
        $anime->setCouverture(null);
        $form = $this->createForm(AnimeType::class, $anime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $anime->getCouverture();
            if ($file) {
                $anime->setCouverture($animeService->upload($file, $this->getParameter('images_directory')));
            } else {
                $anime->setCouverture($photoTmp);
            }
            $animeService->save($anime);
            $this->addFlash('info', 'L\'ajout de votre anime : "'.$anime->getTitre().'" à été validé');

            return $this->redirectToRoute('liste_anime');
        }

        return $this->render('@App/formulaireAnime.html.twig', array('form' => $form->createView()));
    }

    public function deleteAnimeAction(AnimeService $animeService, $id)
    {
        $anime = $animeService->getAnime($id);
        unlink($this->getParameter('images_directory') . "/" . $anime->getCouverture());
        $animeService->delete($animeService->getAnime($id));
        return $this->redirectToRoute('liste_anime');
    }

}