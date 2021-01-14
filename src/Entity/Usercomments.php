<?php

namespace App\Entity;

use App\Repository\UsercommentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsercommentsRepository::class)
 */
class Usercomments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;
       /**
     * Permet d'initialiser la date de création
     *@ORM\PrePersist
     *@ORM\PreUpdate
     * @return void
     */
    public function initialiazeCreatedAt()
    {
        $this->createdAt = new \DateTime('NOW');
    }  
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;
     /**
     * Permet d'initialiser la date de maj
     *@ORM\PrePersist
     *@ORM\PreUpdate
     * @return void
     */
    public function initialiazeUpdatedAt()
    {
        $this->updatedAt = new \DateTime('NOW');
    }
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="usercomments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
