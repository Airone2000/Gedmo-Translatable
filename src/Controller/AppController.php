<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Gedmo\Translator\Entity\Translation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
  /**
   * @Route(path="/save-article")
   */
  public function saveArticle()
  {
    $em = $this->getDoctrine()->getManager();
    
    $article = new Article();
    $article->setTitle('This is an english title');
    $article->setContent('And this is an english content');
    $article->setLocale('en_UK');
    $em->persist($article);
    $em->flush();
    
    $article->setTitle('Ceci est un titre français');
    $article->setContent('Contenu en français');
    $article->setLocale('fr_FR');
    $em->flush();
    
    
    die('STOP');
  }
  
  /**
   * @Route(path="get-article/{id}")
   * @param \App\Entity\Article $article
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function getArticle(Article $article)
  {
    $em = $this->getDoctrine()->getRepository(\Gedmo\Translatable\Entity\Translation::class);
    $translations = $em->findTranslations($article);
    
    echo '<pre>';
    print_r($translations);
    echo '</pre>';
  
  
  
    dump($article);
    return new Response('<body></body>');
  }
}