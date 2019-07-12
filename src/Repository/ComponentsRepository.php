<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComponentsRepository")
 */
class ComponentsRepository
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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $percentage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Modules", inversedBy="components")
     */
    private $modules;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Exam", cascade={"persist", "remove"})
     */
    private $exam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeComponent", inversedBy="components")
     */
    private $typeComponent;

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

    public function getPercentage(): ?float
    {
        return $this->percentage;
    }

    public function setPercentage(float $percentage): self
    {
        $this->percentage = $percentage;

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

    public function getExam(): ?Exam
    {
        return $this->exam;
    }

    public function setExam(?Exam $exam): self
    {
        $this->exam = $exam;

        return $this;
    }

    public function getTypeComponent(): ?TypeComponent
    {
        return $this->typeComponent;
    }

    public function setTypeComponent(?TypeComponent $typeComponent): self
    {
        $this->typeComponent = $typeComponent;

        return $this;
    }
}
