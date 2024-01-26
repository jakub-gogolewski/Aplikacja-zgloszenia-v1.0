<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class StateRelation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: State::class)]
    #[ORM\JoinColumn(nullable: true)]
    private $previousState;

    #[ORM\ManyToOne(targetEntity: State::class)]
    #[ORM\JoinColumn(nullable: true)]
    private $nextState;

    public function getId(): int
    {
        return $this->id;
    }

    // Gettery i settery
    public function getPreviousState(): ?State
    {
        return $this->previousState;
    }

    public function setPreviousState(?State $previousState): self
    {
        $this->previousState = $previousState;
        return $this;
    }

    public function getNextState(): ?State
    {
        return $this->nextState;
    }

    public function setNextState(?State $nextState): self
    {
        $this->nextState = $nextState;
        return $this;
    }
}
