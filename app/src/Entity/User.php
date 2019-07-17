<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
/**
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("ALL")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    private $saltKey;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $isAdmin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExam", mappedBy="user")
     * @Serializer\Expose
     * @Serializer\Groups({"userNoteExams"})
     */
    private $noteExams;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResitExam", mappedBy="user")
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $resitExams;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Modules", mappedBy="user")
     * @Serializer\Expose
     * @Serializer\Groups({"userData"})
     */
    private $modules;

    public function __construct()
    {
        $this->noteExams = new ArrayCollection();
        $this->resitExams = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getSaltKey(): ?string
    {
        return $this->saltKey;
    }

    public function setSaltKey(string $saltKey): self
    {
        $this->saltKey = $saltKey;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * @return Collection|NoteExam[]
     */
    public function getNoteExams(): Collection
    {
        return $this->noteExams;
    }

    public function addNoteExam(NoteExam $noteExam): self
    {
        if (!$this->noteExams->contains($noteExam)) {
            $this->noteExams[] = $noteExam;
            $noteExam->setUser($this);
        }

        return $this;
    }

    public function removeNoteExam(NoteExam $noteExam): self
    {
        if ($this->noteExams->contains($noteExam)) {
            $this->noteExams->removeElement($noteExam);
            // set the owning side to null (unless already changed)
            if ($noteExam->getUser() === $this) {
                $noteExam->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ResitExam[]
     */
    public function getResitExams(): Collection
    {
        return $this->resitExams;
    }

    public function addResitExam(ResitExam $resitExam): self
    {
        if (!$this->resitExams->contains($resitExam)) {
            $this->resitExams[] = $resitExam;
            $resitExam->setUser($this);
        }

        return $this;
    }

    public function removeResitExam(ResitExam $resitExam): self
    {
        if ($this->resitExams->contains($resitExam)) {
            $this->resitExams->removeElement($resitExam);
            // set the owning side to null (unless already changed)
            if ($resitExam->getUser() === $this) {
                $resitExam->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Modules[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Modules $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->addUser($this);
        }

        return $this;
    }

    public function removeModule(Modules $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            $module->removeUser($this);
        }

        return $this;
    }

}
