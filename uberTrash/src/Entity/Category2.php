<?php

namespace App\Entity;

use App\Repository\Category2Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Category2Repository::class)
 */
class Category2
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $waste;

    /**
     * @ORM\OneToMany(targetEntity=Order2::class, mappedBy="category2")
     */
    private $order2s;

    public function __construct()
    {
        $this->order2s = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaste(): ?string
    {
        return $this->waste;
    }

    public function setWaste(string $waste): self
    {
        $this->waste = $waste;

        return $this;
    }

    /**
     * @return Collection<int, Order2>
     */
    public function getOrder2s(): Collection
    {
        return $this->order2s;
    }

    public function addOrder2(Order2 $order2): self
    {
        if (!$this->order2s->contains($order2)) {
            $this->order2s[] = $order2;
            $order2->setCategory2($this);
        }

        return $this;
    }

    public function removeOrder2(Order2 $order2): self
    {
        if ($this->order2s->removeElement($order2)) {
            // set the owning side to null (unless already changed)
            if ($order2->getCategory2() === $this) {
                $order2->setCategory2(null);
            }
        }

        return $this;
    }
}
