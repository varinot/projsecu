<?php

namespace App\Controller;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Product; 

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @IsGranted("ROLE_ADMIN")
 */
  //   class AdminController extends EasyAdminController
class AdminController extends AbstractController
{
  

/**
     * @Route("/admin", name="admin")
     */
 public function index(): Response
    {
        $productRepository = $this->getdoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController', 'products'=>$products
        ]);
    }
    

    //    gestion des routes 

        /**
         * @Route("/produit/creation", name="app_produit_creation"), methods={"GET", "POST"})
         */
        public function creation(Request $request): Response
        {
        $product = new Product;
        $form = $this->createFormBuilder($product)
                
                ->add('name', TextType::class)
                ->add('price',Integer::class)
                
                ->getForm();  
        
        $form->handleRequest($request);        
           
        if($form->isSubmitted() && $form->isValid() ){
            //    $article = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();

                return $this->redirectToRoute('app_main');
        }
            return $this->render('produit/creation.html.twig', ['formulaireproduit' => $form->createView()]);
    }

     /**
     * @Route("/produit/montrer/{id}", name="app_produit_montrer")
     */
    public function montrer($id): Response

    {$productRepository = $this->getdoctrine()->getRepository(Product::class);
        $product = $productRepository->find($id);
      
        return $this->render('produit/montrer.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/produit/maj/{id}", name="app_produit_maj", methods={"GET", "POST"})
     */
    public function maj(Request $request, $id): Response
    
    {$productRepository = $this->getdoctrine()->getRepository(Product::class);
        $product = $productRepository->find($id);
           
        $form = $this->createFormBuilder($product)

                ->add('name', TextType::class)
                ->add('price',TextInteger::class)
                ->getForm(); 

                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid() )
                {
                        $em = $this->getDoctrine()->getManager();
                            $em->flush();

                return $this->redirectToRoute('app_home');
                }

                return $this->render('produit/maj.html.twig',  ['formulaireproduct' => $form->createView()]);
       } 
   }
