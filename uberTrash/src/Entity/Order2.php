<?php

namespace App\Entity;

use App\Repository\Order2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Order2Repository::class)
 */
class Order2
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $volum;

    /**
     * @ORM\ManyToOne(targetEntity=type2::class, inversedBy="order2s")
     */
    private $type2;

    /**
     * @ORM\ManyToOne(targetEntity=category2::class, inversedBy="order2s")
     */
    private $category2;

    /**
     * @ORM\ManyToOne(targetEntity=status2::class, inversedBy="order2s")
     */
    private $status2;

    /**
     * @ORM\ManyToOne(targetEntity=billing2::class, inversedBy="order2s")
     */
    private $billing2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getVolum(): ?string
    {
        return $this->volum;
    }

    public function setVolum(string $volum): self
    {
        $this->volum = $volum;

        return $this;
    }

    public function getType2(): ?type2
    {
        return $this->type2;
    }

    public function setType2(?type2 $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getCategory2(): ?category2
    {
        return $this->category2;
    }

    public function setCategory2(?category2 $category2): self
    {
        $this->category2 = $category2;

        return $this;
    }

    public function getStatus2(): ?status2
    {
        return $this->status2;
    }

    public function setStatus2(?status2 $status2): self
    {
        $this->status2 = $status2;

        return $this;
    }

    public function getBilling2(): ?billing2
    {
        return $this->billing2;
    }

    public function setBilling2(?billing2 $billing2): self
    {
        $this->billing2 = $billing2;

        return $this;
    }
}
