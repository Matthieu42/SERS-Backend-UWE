<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation as Serializer;
/**
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("ALL")
 */
class Components 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     * @Serializer\Groups({"userData","userNoteExams","moduleNoteExams"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"userData","userNoteExams","moduleNoteExams"})
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     * @Serializer\Expose
     * @Serializer\Groups({"userData","userNoteExams","moduleNoteExams"})
     */
    private $percentage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Modules", inversedBy="components")
     * @Serializer\Expose
     * 
     * @Serializer\Groups({"userNoteExams"})
     * 
     */
    private $modules;

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
