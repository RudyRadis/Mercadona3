<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Test;
use Faker\Factory;
use Faker;

class TestFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i<10; $i++){
            $test = new Test();
            $test->setMyName($faker->name);
            $test->setMyFirstName($faker->firstName);

            $manager->persist($test);
        }

        $manager->flush();
    }
}
