<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ResitExam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $aPaye;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Date", inversedBy="resitExams")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="resitExams")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Modules", inversedBy="resitExam")
     */
    private $modules;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAPaye(): ?bool
    {
        return $this->aPaye;
    }

    public function setAPaye(bool $aPaye): self
    {
        $this->aPaye = $aPaye;

        return $this;
    }

    public function getDate(): ?Date
    {
        return $this->date;
    }

    public function setDate(?Date $date): self
    {
        $this->date = $date;

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

    public function getModules(): ?Modules
    {
        return $this->modules;
    }

    public function setModules(?Modules $modules): self
    {
        $this->modules = $modules;

        return $this;
    }
}
