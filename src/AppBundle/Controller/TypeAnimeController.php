<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 26/08/2018
 * Time: 11:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\TypeAnime;
use AppBundle\Form\TypeAnimeType;
use AppBundle\Services\TypeAnimeService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeAnimeController extends Controller
{
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
}