<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=order::class, mappedBy="payment")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $payment;

    public function __construct()
    {
        $this->status = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, order>
     */
    public function getStatus(): Collection
    {
        return $this->status;
    }

    public function addStatus(order $status): self
    {
        if (!$this->status->contains($status)) {
            $this->status[] = $status;
            $status->setPayment($this);
        }

        return $this;
    }

    public function removeStatus(order $status): self
    {
        if ($this->status->removeElement($status)) {
            // set the owning side to null (unless already changed)
            if ($status->getPayment() === $this) {
                $status->setPayment(null);
            }
        }

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }
}
