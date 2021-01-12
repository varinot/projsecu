<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main/{id}", name="main")
     */
    public function index($id): Response
    {
        $userRepository = $this->getdoctrine()->getRepository(User::class);
        $users = $userRepository->find($id);
       // return $this->$array[];
        //if(user.roles === ["ROLE_USER","ROLE_ADMIN"])

    return $this->render('main/index.html.twig', [
        'controller_name' => 'MainController',]);
    }  
}            