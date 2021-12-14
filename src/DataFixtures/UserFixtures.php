<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setEmail('user@local.test');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'123456'));
        $user->setRoles(['ROLE_ADMIN','ROLE_USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
