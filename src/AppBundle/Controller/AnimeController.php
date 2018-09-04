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
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Episode;
use AppBundle\Entity\Favoris;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Note;
use AppBundle\Entity\Personnage;
use AppBundle\Entity\Saison;
use AppBundle\Entity\Theme;
use AppBundle\Entity\TypeAnime;
use AppBundle\Form\AnimeType;
use AppBundle\Form\ArticleType;
use AppBundle\Form\CommentaireType;
use AppBundle\Form\EpisodeType;
use AppBundle\Form\FavorisType;
use AppBundle\Form\GenreType;
use AppBundle\Form\NoteType;
use AppBundle\Form\PersonnageType;
use AppBundle\Form\SaisonType;
use AppBundle\Form\ThemeType;
use AppBundle\Form\TypeAnimeType;
use AppBundle\Services\AnimeService;
use AppBundle\Services\ArticleService;
use AppBundle\Services\CommentaireService;
use AppBundle\Services\EpisodeService;
use AppBundle\Services\FavorisService;
use AppBundle\Services\GenreService;
use AppBundle\Services\NoteService;
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

    // Par anime // Commentaire //
    public function descriptionAnimeAction(AnimeService $animeService, CommentaireService $commentaireService, Request $request, $id)
    {
        if ($id === null) {
            $commentaire = new Commentaire();

        } else {
            $commentaire = $commentaireService->getCommentaire($id);
        }
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireService->save($commentaire);
            $this->addFlash('info', 'L\'ajout de votre commentaire à été validé');

            return $this->redirectToRoute('description_anime'); }

        return $this->render('@App/anime.html.twig', array("animes" => $animeService->getAnime($id), "commentaires" => $commentaireService->getAllCommentaire(), "form" => $form->createView()));
    }
    // Fin //

    // Favoris //
    public function listeFavorisAction(FavorisService $favorisService)
    {
        return $this->render('@App/listeFavoris.html.twig', array("favoriss" => $favorisService->getAllFavoris()));
    }

    public function addAndUpdateFavorisAction(FavorisService $favorisService, Request $request, $id = null)
    {
        if ($id === null) {
            $favoris = new Favoris();

        } else {
            $favoris = $favorisService->getFavoris($id);
        }
        $form = $this->createForm(FavorisType::class, $favoris);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $favorisService->save($favoris);
            $this->addFlash('info', 'L\'ajout de votre farovis à été validé');

            return $this->redirectToRoute('liste_favoris');
        }

        return $this->render('@App/formulaireAnime.html.twig', array("form" => $form->createView()));
    }
    public function deleteFavorisAction(FavorisService $favorisService, $id)
    {
        $favorisService->delete($favorisService->getFavoris($id));
        return $this->redirectToRoute('liste_favoris');
    }
    // FIN //

    // Note //
    public function listeNoteAction(NoteService $noteService)
    {
        return $this->render('@App/listeNote.html.twig', array("notes" => $noteService->getAllNote()));
    }

    public function addAndUpdateNoteAction(NoteService $noteService, Request $request, $id = null)
    {
        if ($id === null) {
            $note = new Note();

        } else {
            $note = $noteService->getNote($id);
        }
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $noteService->save($note);
            $this->addFlash('info', 'L\'ajout de votre note à été validé');

            return $this->redirectToRoute('liste_note');
        }

        return $this->render('@App/formulaireAnime.html.twig', array("form" => $form->createView()));
    }
    public function deleteNoteAction(NoteService $noteService, $id)
    {
        $noteService->delete($noteService->getNote($id));
        return $this->redirectToRoute('liste_note');
    }



}