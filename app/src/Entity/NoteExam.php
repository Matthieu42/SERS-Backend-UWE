<?php

namespace App\Entity;
use JMS\Serializer\Annotation\Exclude;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
/**
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("ALL") 
 */
class NoteExam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     */
    private $note;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="noteExams")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Exam", inversedBy="noteExam")
     */
    private $exam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

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

    public function getExam(): ?Exam
    {
        return $this->exam;
    }

    public function setExam(?Exam $exam): self
    {
        $this->exam = $exam;

        return $this;
    }

}
