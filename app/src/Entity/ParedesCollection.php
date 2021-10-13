<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ParedesCollection
{
    protected $paredes;

    public function __construct()
    {
        $this->paredes = new ArrayCollection();
    }

    public function getParedes(): Collection {
        return $this->paredes;
    }

}