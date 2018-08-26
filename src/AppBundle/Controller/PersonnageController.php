<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
use AppBundle\Form\PersonnageType;
use AppBundle\Services\PersonnageService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PersonnageController extends Controller
{
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
}
