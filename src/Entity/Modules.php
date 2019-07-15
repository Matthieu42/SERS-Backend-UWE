<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Modules
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $acronym;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="modules")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ModulesNotation", mappedBy="modules")
     */
    private $modulesNotation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResitExam", mappedBy="modules")
     */
    private $resitExam;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Components", mappedBy="modules")
     */
    private $components;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->modulesNotation = new ArrayCollection();
        $this->resitExam = new ArrayCollection();
        $this->components = new ArrayCollection();
    }

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

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|ModulesNotation[]
     */
    public function getModulesNotation(): Collection
    {
        return $this->modulesNotation;
    }

    public function addModulesNotation(ModulesNotation $modulesNotation): self
    {
        if (!$this->modulesNotation->contains($modulesNotation)) {
            $this->modulesNotation[] = $modulesNotation;
            $modulesNotation->setModules($this);
        }

        return $this;
    }

    public function removeModulesNotation(ModulesNotation $modulesNotation): self
    {
        if ($this->modulesNotation->contains($modulesNotation)) {
            $this->modulesNotation->removeElement($modulesNotation);
            // set the owning side to null (unless already changed)
            if ($modulesNotation->getModules() === $this) {
                $modulesNotation->setModules(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ResitExam[]
     */
    public function getResitExam(): Collection
    {
        return $this->resitExam;
    }

    public function addResitExam(ResitExam $resitExam): self
    {
        if (!$this->resitExam->contains($resitExam)) {
            $this->resitExam[] = $resitExam;
            $resitExam->setModules($this);
        }

        return $this;
    }

    public function removeResitExam(ResitExam $resitExam): self
    {
        if ($this->resitExam->contains($resitExam)) {
            $this->resitExam->removeElement($resitExam);
            // set the owning side to null (unless already changed)
            if ($resitExam->getModules() === $this) {
                $resitExam->setModules(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Components[]
     */
    public function getComponents(): Collection
    {
        return $this->components;
    }

    public function addComponent(Components $component): self
    {
        if (!$this->components->contains($component)) {
            $this->components[] = $component;
            $component->setModules($this);
        }

        return $this;
    }

    public function removeComponent(Components $component): self
    {
        if ($this->components->contains($component)) {
            $this->components->removeElement($component);
            // set the owning side to null (unless already changed)
            if ($component->getModules() === $this) {
                $component->setModules(null);
            }
        }

        return $this;
    }
}
