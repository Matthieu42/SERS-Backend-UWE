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
class Exam 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExam", mappedBy="exam")
     */
    private $noteExam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Date", inversedBy="exam")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Components")
     */
    private $component;

    public function __construct()
    {
        $this->noteExam = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    /**
     * @return Collection|NoteExam[]
     */
    public function getNoteExam(): Collection
    {
        return $this->noteExam;
    }

    public function addNoteExam(NoteExam $noteExam): self
    {
        if (!$this->noteExam->contains($noteExam)) {
            $this->noteExam[] = $noteExam;
            $noteExam->setExam($this);
        }

        return $this;
    }

    public function removeNoteExam(NoteExam $noteExam): self
    {
        if ($this->noteExam->contains($noteExam)) {
            $this->noteExam->removeElement($noteExam);
            // set the owning side to null (unless already changed)
            if ($noteExam->getExam() === $this) {
                $noteExam->setExam(null);
            }
        }

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

    public function getComponent(): ?Components
    {
        return $this->component;
    }

    public function setComponent(?Components $component): self
    {
        $this->component = $component;

        return $this;
    }

    
}
