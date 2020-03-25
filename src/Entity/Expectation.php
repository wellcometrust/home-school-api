<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Table(name="expectation")
 * @ORM\Entity
 * @ApiResource
 */
class Expectation
{

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Mark", mappedBy="expecation", cascade="all")
     */
    private $marks;

    public function __construct()
    {
        $this->marks = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection
     */
    public function getMarks(): Collection
    {
        return $this->marks;
    }

    /**
     * @param Mark $mark
     *
     * @return Student
     */
    public function addMark(Mark $mark): Student
    {
        $this->marks->add($mark);
        return $this;
    }

}