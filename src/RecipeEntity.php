<?php

namespace GRUB;

class RecipeEntity {
    private $title = "";
    private $link = "";
    private $imageURL = "";
    private $ingredients = "";

    public function __construct(string $title, string $link, string $imageURL, array $ingredients){
              $this->title = $title;
              $this->link = $link;
              $this->imageURL = $imageURL;
              $this->ingredients = $ingredients;
    }
 
    public function getTitle(): string{
        return $this->title;
    }
    public function getLink(): string{
        return $this->link;
    }
    public function getImageURL(): string{
        return $this->imageURL;
    }
    public function getIngredients(): array{
        return $this->ingredients;
    }
}