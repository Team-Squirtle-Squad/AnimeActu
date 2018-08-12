<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 09/08/2018
 * Time: 20:08
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Genre;
use AppBundle\Entity\Theme;
use AppBundle\Entity\TypeAnime;
use AppBundle\Form\GenreType;
use AppBundle\Form\ThemeType;
use AppBundle\Form\TypeAnimeType;
use AppBundle\Services\GenreService;
use AppBundle\Services\ThemeService;
use AppBundle\Services\TypeAnimeService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnimeController extends Controller
{
    // Genre //
    public function listeGenreAction(GenreService $genreService){
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

        return $this->render('@App/formulaireGenre.html.twig', array('form' => $form->createView()));
    }
    // Fin Genre //

    // Type d'anime //
    public function listeTypeAnimeAction(TypeAnimeService $typeAnimeService){
        return $this->render('@App/listeTypeAnime.html.twig', array("typesAnimes" => $typeAnimeService->getAllTypeAnime()));
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

        return $this->render('@App/formulaireGenre.html.twig', array('form' => $form->createView()));
    }
    // Fin Type d'anime //

    // Theme //
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

        return $this->render('@App/formulaireGenre.html.twig', array('form' => $form->createView()));
    }
    // Fin Thème //



}