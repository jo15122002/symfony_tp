<?php

namespace App\Entity;

use App\Repository\ReactionRepository;
use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

enum ReactionType: string{
    case LIKE = 'LIKE';
    case DISLIKE = 'DISLIKE';
}

#[ORM\Entity(repositoryClass: ReactionRepository::class)]
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(enumType: ReactionType::class)]
    private ?ReactionType $type;

    #[ORM\ManyToOne(inversedBy: 'reactions')]
    private ?Link $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getType(): ?ReactionType
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $type = ReactionType::from($type);
        $this->type = $type;

        return $this;
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function setLink(?Link $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function __construct(){
        $this->setCreatedAt(new \DateTime());
    }
}
