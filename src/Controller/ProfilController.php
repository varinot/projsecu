<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Product; 

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @IsGranted("ROLE_USER")
 */

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {
        $productRepository = $this->getdoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    //    gestion des routes 

    // /**
    // * @Route("/produit/commenter/{id}", name="app_produit_commenter")
    // */
    //public function montrer($id): Response

    // {$productRepository = $this->getdoctrine()->getRepository(Product::class);
    //    $product = $productRepository->find($id);
      
    //    return $this->render('produit/commenter.html.twig', ['product' => $product]);
    //  }   

}
