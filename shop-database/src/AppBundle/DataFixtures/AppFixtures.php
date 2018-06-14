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
        $plainPassword = 'manager';

        $encoded = $this->encoder->encodePassword($user, $plainPassword);

        $user->setEmail('manager@products.com');
        $user->setRoles(['ROLE_SMTHNG']);
        $user->setPassword($encoded);

        $manager->persist($user);
        $manager->flush();
    }
}        
