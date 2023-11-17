<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class UserFixture extends Fixture implements FixtureGroupInterface
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ) {}
    public function load(ObjectManager $manager): void
    {
        $admin1 = new User();
        $admin1->setUsername('Admin');
        $admin1->setPassword($this->hasher->hashPassword($admin1, '12345'));
        $admin1->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin1);


        $manager->flush();
    }

    public static function getGroups() : array {
        return ['user'];
    }
}
