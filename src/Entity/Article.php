<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article implements Translatable
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;
  
  /**
   * @Gedmo\Translatable()
   * @ORM\Column(name="title", type="string")
   */
  private $title;
  
  /**
   * @Gedmo\Translatable()
   * @ORM\Column(name="content", type="string")
   */
  private $content;
  
  /**
   * @Gedmo\Locale()
   */
  private $locale;
  
  /**
   * @return int|null
   */
  public function getId(): ?int
  {
    return $this->id;
  }
  
  /**
   * @return null|string
   */
  public function getTitle(): ?string
  {
    return $this->title;
  }
  
  /**
   * @param string $title
   * @return \App\Entity\Article
   */
  public function setTitle(string $title): self
  {
    $this->title = $title;
    
    return $this;
  }
  
  /**
   * @return null|string
   */
  public function getContent(): ?string
  {
    return $this->content;
  }
  
  /**
   * @param string $content
   * @return \App\Entity\Article
   */
  public function setContent(string $content): self
  {
    $this->content = $content;
    
    return $this;
  }
  
  /**
   * @return null|string
   */
  public function getLocale(): ?string
  {
    return $this->locale;
  }
  
  /**
   * @param string $locale
   * @return \App\Entity\Article
   */
  public function setLocale(string $locale): self
  {
    $this->locale = $locale;
    
    return $this;
  }
  
}