<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Zend\Code\Generator\DocBlock\Tag\ReturnTag;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles'=>$articles
        ]);
    }

    /** 
     * @Route("/blog/nouveau", name="blog_nouveau")
    */
    public function create()
    {
        Return $this->render('blog/nouveau.html.twig');
    }
    
    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article= $repo->find($id);

        return $this->render('blog/show.html.twig', [
            'article'=>$article
        ]);
    }
}
