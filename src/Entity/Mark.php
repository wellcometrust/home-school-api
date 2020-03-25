<?php


namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;

/**
 * @ORM\Table(name="mark")
 * @ORM\Entity
 * @ApiResource
 * @ApiFilter(DateFilter::class, properties={"date"})
 */
class Mark
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
     * @var Student
     *
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="marks")
     */
    private $student;

    /**
     * @var Expectation
     *
     * @ORM\ManyToOne(targetEntity="Expectation", inversedBy="marks")
     */
    private $expectation;

    /**
     * @var bool
     *
     * @ORM\Column(name="value", type="boolean")
     */
    private $value;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    public $date;

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
     * @return bool
     */
    public function getValue(): bool
    {
        return $this->value;
    }

    /**
     * @param bool $value
     */
    public function setValue(bool $value): void
    {
        $this->value = $value;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Student
     */
    public function getStudent(): Student
    {
        return $this->student;
    }

    /**
     * @param Student $student
     */
    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    /**
     * @return Expectation
     */
    public function getExpectation(): Expectation
    {
        return $this->expectation;
    }

    /**
     * @param Expectation $expectation
     */
    public function setExpectation(Expectation $expectation): void
    {
        $this->expectation = $expectation;
    }

}