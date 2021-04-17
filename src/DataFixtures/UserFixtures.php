<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setEmail('admin@test.fr')
            ->setRoles(["ROLE_ADMIN"])
            // Password: 123456
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$ZWVoNXVUVXRDLkRlYVpTcw$sZr1cGFcIHPktJjprILbAbNGtdpXXUiE0tqDfDXqbH0');
        $manager->persist($user);

        $manager->flush();
    }
}
