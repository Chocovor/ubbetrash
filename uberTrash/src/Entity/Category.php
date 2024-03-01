<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=order::class, mappedBy="category")
     */
    private $waste;

    public function __construct()
    {
        $this->waste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, order>
     */
    public function getWaste(): Collection
    {
        return $this->waste;
    }

    public function addWaste(order $waste): self
    {
        if (!$this->waste->contains($waste)) {
            $this->waste[] = $waste;
            $waste->setCategory($this);
        }

        return $this;
    }

    public function removeWaste(order $waste): self
    {
        if ($this->waste->removeElement($waste)) {
            // set the owning side to null (unless already changed)
            if ($waste->getCategory() === $this) {
                $waste->setCategory(null);
            }
        }

        return $this;
    }
}
