<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $role_name = null;

    #[ORM\Column(length: 255)]
    private ?string $role_Description = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'Users_Roles')]
    private Collection $user_role;

    public function __construct()
    {
        $this->user_role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleName(): ?string
    {
        return $this->role_name;
    }

    public function setRoleName(string $role_name): self
    {
        $this->role_name = $role_name;

        return $this;
    }

    public function getRoleDescription(): ?string
    {
        return $this->role_Description;
    }

    public function setRoleDescription(string $role_Description): self
    {
        $this->role_Description = $role_Description;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserRole(): Collection
    {
        return $this->user_role;
    }

    public function addUserRole(User $userRole): self
    {
        if (!$this->user_role->contains($userRole)) {
            $this->user_role->add($userRole);
        }

        return $this;
    }

    public function removeUserRole(User $userRole): self
    {
        $this->user_role->removeElement($userRole);

        return $this;
    }
}
