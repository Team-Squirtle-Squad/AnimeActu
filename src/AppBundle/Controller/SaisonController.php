<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Saison;
use AppBundle\Form\SaisonType;
use AppBundle\Services\SaisonService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SaisonController extends Controller
{
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
}
