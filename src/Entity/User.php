<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $user_password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_Email = null;

    #[ORM\Column(length: 255)]
    private ?string $user_login = null;

    #[ORM\ManyToMany(targetEntity: Role::class, mappedBy: 'user_role')]
    private Collection $Users_Roles;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_ImagePath = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    public function __construct()
    {
        $this->Users_Roles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_Email;
    }

    public function setUserEmail(?string $user_Email): self
    {
        $this->user_Email = $user_Email;

        return $this;
    }

    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    public function setUserLogin(string $user_login): self
    {
        $this->user_login = $user_login;

        return $this;
    }

    /**
     * @return Collection<int, Role>
     */
    public function getUsersRoles(): Collection
    {
        return $this->Users_Roles;
    }

    public function addUsersRole(Role $usersRole): self
    {
        if (!$this->Users_Roles->contains($usersRole)) {
            $this->Users_Roles->add($usersRole);
            $usersRole->addUserRole($this);
        }

        return $this;
    }

    public function removeUsersRole(Role $usersRole): self
    {
        if ($this->Users_Roles->removeElement($usersRole)) {
            $usersRole->removeUserRole($this);
        }

        return $this;
    }

    public function getUserImagePath(): ?string
    {
        return $this->user_ImagePath;
    }

    public function setUserImagePath(?string $user_ImagePath): self
    {
        $this->user_ImagePath = $user_ImagePath;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
