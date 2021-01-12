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
        $userAdmin->setEmail('bobo@orange.fr');
        $userAdmin->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $userAdmin->setPassword($this->passwordEncoder->encodePassword($userAdmin,'passadmin'
         ));
         $manager->persist($userAdmin);

       $user = new User();
       $user->setEmail('baba@orange.fr');
       $user->setRoles(["ROLE_USER"]);
       $user->setPassword($this->passwordEncoder->encodePassword(
            $user,'password'
        ));
         $manager->persist($user);

      $manager->flush();
    }
}
