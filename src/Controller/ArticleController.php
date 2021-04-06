<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{slug}", name="display_article")
     */
    public function index(string $slug): Response
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneBy(['slug' => $slug]);

        return $this->render('article/display.html.twig', [
            'article' => $article,
        ]);
    }
}
