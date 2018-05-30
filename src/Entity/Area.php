<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="area")
 * @Gedmo\TranslationEntity(class="App\Entity\AreaTranslation")
 */
class Area
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;
  
  /**
   * @ORM\Column(type="string", nullable=true)
   * @Gedmo\Translatable()
   */
  private $name;
  
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
  public function getName(): ?string
  {
    return $this->name;
  }
  
  /**
   * @param string $name
   * @return \App\Entity\Area
   */
  public function setName(string $name): self
  {
    $this->name = $name;
    
    return $this;
  }
  
  
}