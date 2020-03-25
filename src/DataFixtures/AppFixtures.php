<?php

namespace App\DataFixtures;

use App\Entity\Expectation;
use App\Entity\Mark;
use App\Entity\Student;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    CONST EXPECTATION_DESCRIPTIONS = [
        'Love our family',
        'Listen to and respect each other',
        'Persevere and try hard - no excuses',
        'Do as we\'re told first time',
        'Use positive words and actions',
        'Playtime before screentime',
        'Help out around the house',
        'If we get it out, we put it away'
        ];

    CONST STUDENT_NAMES = [
        'Bob',
        'Katy',
        'Frank'
    ];

    CONST DATES = [
        '2020-03-25 09:00:00',
        '2020-03-26 09:00:00',
        '2020-03-27 09:00:00'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::STUDENT_NAMES as $name) {
            $student = new Student();
            $student->setName($name);
            $manager->persist($student);
        }

        foreach (self::EXPECTATION_DESCRIPTIONS as $description) {
            $expectation = new Expectation();
            $expectation->setDescription($description);
            $manager->persist($expectation);
        }

        $manager->flush();

        $allStudents = $manager->getRepository(Student::class)->findAll();
        $allExpectations = $manager->getRepository(Expectation::class)->findAll();

        foreach ($allStudents as $student) {
            foreach ($allExpectations as $expectation) {
                foreach (self::DATES as $date) {
                    $mark = new Mark();
                    $mark->setStudent($student);
                    $mark->setExpectation($expectation);
                    $dt = new DateTime($date);
                    $mark->setDate($dt);
                    $mark->setValue(true);
                    $manager->persist($mark);
                }
            }
        }

        $manager->flush();

    }
}
