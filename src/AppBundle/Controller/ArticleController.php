<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use AppBundle\Services\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
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
}
