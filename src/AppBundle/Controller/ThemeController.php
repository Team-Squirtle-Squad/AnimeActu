<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Theme;
use AppBundle\Form\ThemeType;
use AppBundle\Services\ThemeService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ThemeController extends Controller
{
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
}
