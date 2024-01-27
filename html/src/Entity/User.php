<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Bridge\Doctrine\Types\UuidType;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'Adres email jest już w użyciu')]
#[ORM\HasLifecycleCallbacks()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\OneToMany(mappedBy: 'creator', targetEntity: Task::class)]
    private Collection $createdTasks;

    #[ORM\OneToMany(mappedBy: 'assigned', targetEntity: Task::class)]
    private Collection $assignedTasks;
    
    #[ORM\Column(length: 20, nullable: true)]
    private ?string $color = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'subordinates')]
    private ?self $supervisor = null;

    #[ORM\OneToMany(mappedBy: 'supervisor', targetEntity: self::class)]
    private Collection $subordinates;

    #[ORM\OneToMany(mappedBy: 'apiUser', targetEntity: ApiKeys::class)]
    private Collection $apiKeys;

    public function __construct()
    {
        $this->createdTasks = new ArrayCollection();
        $this->assignedTasks = new ArrayCollection();
        $this->subordinates = new ArrayCollection();
        $this->apiKeys = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function addRole(string $role): self
{
    if (!in_array($role, $this->roles, true)) {
        $this->roles[] = $role;
    }

    return $this;
}

    /**
     * @return Collection<int, Task>
     */
    public function getCreatedTasks(): Collection
    {
        return $this->createdTasks;
    }

    public function addCreatedTask(Task $createdTask): static
    {
        if (!$this->createdTasks->contains($createdTask)) {
            $this->createdTasks->add($createdTask);
            $createdTask->setCreator($this);
        }

        return $this;
    }

    public function removeCreatedTask(Task $createdTask): static
    {
        if ($this->createdTasks->removeElement($createdTask)) {
            // set the owning side to null (unless already changed)
            if ($createdTask->getCreator() === $this) {
                $createdTask->setCreator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Task>
     */
    public function getAssignedTasks(): Collection
    {
        return $this->assignedTasks;
    }

    public function addAssignedTask(Task $assignedTask): static
    {
        if (!$this->assignedTasks->contains($assignedTask)) {
            $this->assignedTasks->add($assignedTask);
            $assignedTask->setAssigned($this);
        }

        return $this;
    }

    public function removeAssignedTask(Task $assignedTask): static
    {
        if ($this->assignedTasks->removeElement($assignedTask)) {
            // set the owning side to null (unless already changed)
            if ($assignedTask->getAssigned() === $this) {
                $assignedTask->setAssigned(null);
            }
        }

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName() . ' ' . $this->getLastname();
    }

    public function getSupervisor(): ?self
    {
        return $this->supervisor;
    }

    public function setSupervisor(?self $supervisor): static
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubordinates(): Collection
    {
        return $this->subordinates;
    }

    public function addSubordinate(self $subordinate): static
    {
        if (!$this->subordinates->contains($subordinate)) {
            $this->subordinates->add($subordinate);
            $subordinate->setSupervisor($this);
        }

        return $this;
    }

    public function removeSubordinate(self $subordinate): static
    {
        if ($this->subordinates->removeElement($subordinate)) {
            // set the owning side to null (unless already changed)
            if ($subordinate->getSupervisor() === $this) {
                $subordinate->setSupervisor(null);
            }
        }

        return $this;
    }

    public function getAllRoles(array $allRoles): array
    {
        $this->checkedRoles = []; // Resetowanie sprawdzonych ról
        $userRoles = $this->getRoles(); // Pobieranie aktualnych ról użytkownika
        return $this->resolveRoles($userRoles, $allRoles);
    }

    private function resolveRoles(array $roles, array $allRoles): array
    {
        $result = [];

        foreach ($roles as $role) {
            if (!isset($this->checkedRoles[$role])) {
                $this->checkedRoles[$role] = true;
                $result[] = $role;

                if (isset($allRoles[$role])) {
                    $result = array_merge($result, $this->resolveRoles($allRoles[$role], $allRoles));
                }
            }
        }

        return array_values(array_unique($result));
    }

    /**
     * @return Collection<int, ApiKeys>
     */
    public function getApiKeys(): Collection
    {
        return $this->apiKeys;
    }

    public function addApiKey(ApiKeys $apiKey): static
    {
        if (!$this->apiKeys->contains($apiKey)) {
            $this->apiKeys->add($apiKey);
            $apiKey->setApiUser($this);
        }

        return $this;
    }

    public function removeApiKey(ApiKeys $apiKey): static
    {
        if ($this->apiKeys->removeElement($apiKey)) {
            // set the owning side to null (unless already changed)
            if ($apiKey->getApiUser() === $this) {
                $apiKey->setApiUser(null);
            }
        }

        return $this;
    }

        /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $creationDate;

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        if ($this->creationDate === null) {
            $this->creationDate = new \DateTime();
        }
    }
}
