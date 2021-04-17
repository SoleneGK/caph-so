<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{slug}", name="display_article")
     */
    public function index(Article $article, Request $request): Response
    {
        $newComment = new Comment();

        $form = $this->createForm(CommentType::class, $newComment);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $newComment = $form->getData();
            $newComment
                ->setPublicationDate(new \DateTime())
                ->setValidated(false)
                ->setArticle($article);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newComment);
            $entityManager->flush();
        }

        return $this->render('article/display.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }
}
