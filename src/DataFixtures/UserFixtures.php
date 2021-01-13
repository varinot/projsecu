<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
   
        

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
   }

    public function load(ObjectManager $manager)
    {

        $userAdmin = new User();
        $userAdmin->setEmail('adbobo@example.com');
        $userAdmin->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $userAdmin->setPassword($this->passwordEncoder->encodePassword($userAdmin,'adminutil'
         ));
         $manager->persist($userAdmin);
         $manager->flush();

       $user1 = new User();
       $user1->setEmail('baba@example.fr');
       $user1->setRoles(["ROLE_USER"]);
       $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,'passutil'
        ));
        $manager->persist($user1);
        $manager->flush();
    }
}
