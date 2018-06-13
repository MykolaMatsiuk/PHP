<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $plainPassword = 'admin';

        $encoded = $this->encoder->encodePassword($user, $plainPassword);

        $user->setEmail('admin@products.com');
        $user->setPassword($encoded);

        $manager->persist($user);
        $manager->flush();
    }
}        
