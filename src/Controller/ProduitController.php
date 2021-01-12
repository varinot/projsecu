<?php

namespace App\Controller;
use App\Entity\Product; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        $productRepository = $this->getdoctrine()->getRepository(Product::class);
        $products = $productRepository->findBy([],['name' => 'ASC']);

        return $this->render('produit/index.html.twig', [
            'products' => $products]);
    }
}
