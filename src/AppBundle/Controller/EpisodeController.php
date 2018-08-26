<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use AppBundle\Form\EpisodeType;
use AppBundle\Services\EpisodeService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EpisodeController extends Controller
{
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
}
