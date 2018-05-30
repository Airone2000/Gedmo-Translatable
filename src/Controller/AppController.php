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
    $repository = $em->getRepository(\Gedmo\Translatable\Entity\Translation::class);
    
    $article = new Article();
    $article->setTitle('This is an english title');
    $article->setContent('And this is an english content');
    
    $repository
      ->translate($article, 'title', 'fr_FR', 'Titre en français')
      ->translate($article, 'content', 'fr_FR', 'Contenu en français')
      ->translate($article, 'title', 'en_UK', 'Title in english')
      ->translate($article, 'content', 'en_UK', 'Content in english')
    ;
    
 
    $em->persist($article);
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