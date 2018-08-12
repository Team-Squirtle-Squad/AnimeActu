<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 09/08/2018
 * Time: 20:08
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Genre;
use AppBundle\Form\GenreType;
use AppBundle\Services\GenreService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnimeController extends Controller
{
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


}