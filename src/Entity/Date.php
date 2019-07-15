<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DateRepository")
 */
class Date
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Exam", mappedBy="date")
     */
    private $exam;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResitExam", mappedBy="date")
     */
    private $resitExams;

    public function __construct()
    {
        $this->exam = new ArrayCollection();
        $this->resitExams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Exam[]
     */
    public function getExam(): Collection
    {
        return $this->exam;
    }

    public function addExam(Exam $exam): self
    {
        if (!$this->exam->contains($exam)) {
            $this->exam[] = $exam;
            $exam->setDate($this);
        }

        return $this;
    }

    public function removeExam(Exam $exam): self
    {
        if ($this->exam->contains($exam)) {
            $this->exam->removeElement($exam);
            // set the owning side to null (unless already changed)
            if ($exam->getDate() === $this) {
                $exam->setDate(null);
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
            $resitExam->setDate($this);
        }

        return $this;
    }

    public function removeResitExam(ResitExam $resitExam): self
    {
        if ($this->resitExams->contains($resitExam)) {
            $this->resitExams->removeElement($resitExam);
            // set the owning side to null (unless already changed)
            if ($resitExam->getDate() === $this) {
                $resitExam->setDate(null);
            }
        }

        return $this;
    }
}
