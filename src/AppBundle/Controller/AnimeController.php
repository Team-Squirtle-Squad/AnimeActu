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
    //Home
    public function homeAction()
    {
        return $this->render('@App/home.html.twig');
    }


    // Genre //
    public function listeGenreAction(GenreService $genreService)
    {
        return $this->render('@App/listeGenre.html.twig', array("genres" => $genreService->getAllGenre()));
    }

    public function addAndUpdateGenreAction(Request $request, GenreService $genreService, $id = null)
    {
        if ($id === null) {
            $genre = new Genre();
        } else {
            $genre = $genreService->getGenre($id);
        }
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $genreService->save($genre);
            $this->addFlash('info', 'L\'ajout de votre genre : "' . $genre->getLibelleGenre() . '" à été validé');

            return $this->redirectToRoute('liste_genre');
        }

        return $this->render('@App/formulaireGenreThemeType.html.twig', array('form' => $form->createView()));
    }

    public function deleteGenreAction(GenreService $genreService, $id)
    {
        $genreService->delete($genreService->getGenre($id));
        return $this->redirectToRoute('liste_genre');
    }
    // Fin Genre //

    // Type d'anime //
    public function listeTypeAnimeAction(TypeAnimeService $typeAnimeService)
    {
        return $this->render('@App/listeTypeAnime.html.twig', array("typesAnimes" => $typeAnimeService->getAllTypeAnime())
        );
    }

    public function addAndUpdateTypeAnimeAction(Request $request, TypeAnimeService $typeAnimeService, $id = null)
    {
        if ($id === null) {
            $typeAnime = new TypeAnime();
        } else {
            $typeAnime = $typeAnimeService->getTypeAnime($id);
        }
        $form = $this->createForm(TypeAnimeType::class, $typeAnime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $typeAnimeService->save($typeAnime);
            $this->addFlash('info', 'L\'ajout de votre genre : "' . $typeAnime->getLibelleTypeAnime() . '" à été validé');

            return $this->redirectToRoute('liste_type_anime');
        }

        return $this->render('@App/formulaireGenreThemeType.html.twig', array('form' => $form->createView()));
    }

    public function deleteTypeAnimeAction(TypeAnimeService $typeAnimeService, $id)
    {
        $typeAnimeService->delete($typeAnimeService->getTypeAnime($id));
        return $this->redirectToRoute('liste_type_anime');
    }
    // Fin Type d'anime //

    // Theme //

    public function listeThemeAction(ThemeService $themeService)
    {
        return $this->render('@App/listeTheme.html.twig', array("themes" => $themeService->getAllTheme()));
    }

    public function addAndUpdateThemeAction(Request $request, ThemeService $themeService, $id = null)
    {
        if ($id === null) {
            $theme = new Theme();
        } else {
            $theme = $themeService->getTheme($id);
        }
        $form = $this->createForm(ThemeType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themeService->save($theme);
            $this->addFlash('info', 'L\'ajout de votre Thème : "' . $theme->getLibelleTheme() . '" à été validé');

            return $this->redirectToRoute('liste_theme');
        }

        return $this->render('@App/formulaireGenreThemeType.html.twig', array('form' => $form->createView()));
    }

    public function deleteThemeAction(ThemeService $themeService, $id)
    {
        $themeService->delete($themeService->getTheme($id));
        return $this->redirectToRoute('liste_theme');
    }
    // Fin Thème //

    // Anime //
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
            $this->addFlash('info', 'L\'ajout de votre anime : "' . $anime->getTitre() . '" à été validé');

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
    // Fin Anime

    // Saison //
    public function listeSaisonAction(SaisonService $saisonService)
    {
        return $this->render('@App/listeSaison.html.twig', array("saisons" => $saisonService->getAllSaison()));
    }

    public function addAndUpdateSaisonAction(Request $request, SaisonService $saisonService, $id = null)
    {
        if ($id === null) {
            $saison = new Saison();
        } else {
            $saison = $saisonService->getSaison($id);
        }
        $form = $this->createForm(SaisonType::class, $saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $saisonService->save($saison);
            $this->addFlash('info', 'L\'ajout de votre saison : "' . $saison->getNbSaison() . '" à été validé');

            return $this->redirectToRoute('liste_saison');
        }

        return $this->render('@App/formulaireSaison.html.twig', array('form' => $form->createView()));
    }

    public function deleteSaisonAction(SaisonService $saisonService, $id)
    {
        $saisonService->delete($saisonService->getSaison($id));
        return $this->redirectToRoute('liste_saison');
    }
    // Fin Saison


    // Episode //
    public function listeEpisodeAction(EpisodeService $episodeService)
    {
        return $this->render('@App/listeEpisode.html.twig', array("episodes" => $episodeService->getAllEpisode()));
    }

    public function addAndUpdateEpisodeAction(Request $request, EpisodeService $episodeService, $id = null)
    {
        if ($id === null) {
            $episode = new Episode();
        } else {
            $episode = $episodeService->getEpisode($id);
        }
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeService->save($episode);
            $this->addFlash('info', 'L\'ajout de votre episode : "' . $episode->getNumEpisode() . '" à été validé');

            return $this->redirectToRoute('liste_episode');
        }

        return $this->render('@App/formulaireAnime.html.twig', array('form' => $form->createView()));
    }

    public function deleteEpisodeAction(EpisodeService $episodeService, $id)
    {
        $episodeService->delete($episodeService->getEpisode($id));
        return $this->redirectToRoute('liste_episode');
    }
    // Fin Episode //

    // Article //
    public function listeArticleAction(ArticleService $articleService)
    {
        return $this->render('@App/listeArticle.html.twig', array("articles" => $articleService->getAllArticle()));
    }

    public function addAndUpdateArticleAction(Request $request, ArticleService $articleService, $id = null)
    {
        if ($id === null) {
            $article = new Article();
        } else {
            $article = $articleService->getArticle($id);
        }
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleService->save($article);
            $this->addFlash('info', 'L\'ajout de votre article : "' . $article->getId() . '" à été validé');

            return $this->redirectToRoute('liste_article');
        }

        return $this->render('@App/formulaireArticle.html.twig', array('form' => $form->createView()));
    }

    public function deleteArticleAction(ArticleService $articleService, $id)
    {
        $articleService->delete($articleService->getArticle($id));
        return $this->redirectToRoute('liste_article');
    }
    // Fin Article //

    // Personnage //
    public function listePersonnageAction(PersonnageService $personnageService)
    {
        return $this->render('@App/listePersonnage.html.twig', array("personnages" => $personnageService->getAllPersonnage()));
    }

    public function addAndUpdatePersonnageAction(Request $request, PersonnageService $personnageService, $id = null)
    {
        if ($id === null) {
            $personnage = new Personnage();
        } else {
            $personnage = $personnageService->getPersonnage($id);
        }
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personnageService->save($personnage);
            $this->addFlash('info', 'L\'ajout de votre personnage : "' . $personnage->getNomPersonnage() . '" à été validé');

            return $this->redirectToRoute('liste_personnage');
        }

        return $this->render('@App/formulairePersonnage.html.twig', array('form' => $form->createView()));
    }

    public function deletePersonnageAction(PersonnageService $personnageService, $id)
    {
        $personnageService->delete($personnageService->getPersonnage($id));
        return $this->redirectToRoute('liste_personnage');
    }
    // Fin Personnage //
}