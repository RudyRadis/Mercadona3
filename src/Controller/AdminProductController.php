<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\DoctrineType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Form\ProductEditType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


class AdminProductController extends AbstractController
{
    #[Route('/admin-products', name: 'app_products')]
    public function loadProducts(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Products::class);
        $products = $repository->findAll();


        return $this->render('admin_product/products.html.twig', [
            'controller_name' => 'AdminProductController',
            'products'=>$products,
        ]);
    }

    #[Route('/admin-products/categ', name: 'app_categ')]
    public function loadCateg(): Response
    {
        return $this->render('admin_product/categ.html.twig', [
            'controller_name' => 'AdminProductController',
        ]);
    }

    #[Route('/admin-products/delete/{id}', name: 'app_delete_product')]
    public function deleteProducts(Products $products = null, ManagerRegistry $doctrine): RedirectResponse
    {        
        if ($products) {
            $imgPath = $products->getImgPath();
            if ($imgPath) {
                $fullPath = $this->getParameter('product_directory') . '/' . $imgPath;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }

            $manager = $doctrine->getManager();
            $manager->remove($products);
            $manager->flush();
            $this->addFlash('success', 'Le produit a été supprimé avec succès.');
        } else {
            $this->addFlash("error", "Le produit n'existe pas.");
        }

        return $this->redirectToRoute('app_products');
    }

    #[Route('/admin-products/add', name: 'app_add_product')]
    public function addProducts(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger): Response
    {

        

        $product = new Products();
        $form = $this->createForm(ProductEditType::class, $product);
        $form->remove('createAt');
        $form->remove('updateAt');

        $form->handleRequest($request);
       

        if ($form->isSubmitted()) {
            $brochureFile = $form->get('imgPath')->getData();

            if (!$product->isPromoBool()) {
                $product->setCreationDate(null);
                $product->setEndingDate(null);
            }

            if ($brochureFile) {


                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
            
                $oldFilename = $product->getImgPath();
                if ($oldFilename !== null) {
                    $oldFullPath = $this->getParameter('product_directory') . '/' . $oldFilename;
                    if (file_exists($oldFullPath)) {
                        unlink($oldFullPath);
                    }
                }

                
                try {
                    $brochureFile->move(
                        $this->getParameter('product_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {

                }
                $product->setImgPath($newFilename);
            }

            $manager = $doctrine->getManager();
            $manager->persist($product);
            $manager->flush();
            $this->addFlash('success', $product->getName(). ' a été ajouté avec succès.');
            return $this->redirectToRoute('app_products');
        } else {
            return $this->render('admin_product/add_product.html.twig', [
                'controller_name' => 'AdminProductController',
                'form' => $form->createView(),
                'product' => $product,
            ]);
        }
    }

    #[Route('/admin-products/update/{id?1}', name: 'app_update_product')]
    public function updatProducts(Products $product = null, ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger): Response
    {
        $new = false;
        if (!$product) {
            $new = true;
            $product = new Products();
        }

        $form = $this->createForm(ProductEditType::class, $product);
        $form->remove('createAt');
        $form->remove('updateAt');
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $removeImage = $form->get('remove_image')->getData();
            $brochureFile = $form->get('imgPath')->getData();

            if ($removeImage) {

                $oldFilename = $product->getImgPath();
                if ($oldFilename) {
                    $oldFullPath = $this->getParameter('product_directory') . '/' . $oldFilename;
                    if (file_exists($oldFullPath)) {
                        unlink($oldFullPath);
                    }
                    $product->setImgPath(null); 
                }
            } elseif ($brochureFile&& $brochureFile->getSize() > 0) {
                
                
                $oldFilename = $product->getImgPath();
                if ($oldFilename) {
                    $oldFullPath = $this->getParameter('product_directory') . '/' . $oldFilename;
                    if (file_exists($oldFullPath)) {
                        unlink($oldFullPath);
                    }
                }

                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
                try {
                   
                        $brochureFile->move(
                            $this->getParameter('product_directory'),
                            $newFilename
                        );

         
                } catch (FileException $e) {

                }
                $product->setImgPath($newFilename);
               
            } else {

            }


            $manager = $doctrine->getManager();
            $manager->persist($product);
            $manager->flush();
            if($new) {
                $message = " a été ajouté avec succès.";    
            } else {
                $message = " a été mis à jour avec succès.";    
            }
            $this->addFlash('success', $product->getName(). $message);
            return $this->redirectToRoute('app_products');
     
        } else {

            return $this->render('admin_product/update_product.html.twig', [
                'controller_name' => 'AdminProductController',
                'form' => $form->createView(),
                'product' => $product,
            ]);
        }
    }



    #[Route('/admin-products/filter/{categ}/{order}/{promo}', name: 'app_admin_filter_sort', defaults: ['categ' => 'default', 'order' => 'default', 'promo' => 'false'])]
    public function loadProductsFilter2(ManagerRegistry $doctrine, $categ, $order, $promo): Response
    {
        $repository = $doctrine->getRepository(Products::class);
        $categBy = [];

        if ($categ !== 'default') {
            $categBy['categ'] = $categ;
        }

        if ($promo === 'true') {
            $categBy['promoBool'] = true;
        }

        $orderBy = [];
        if ($order === 'asc' || $order === 'desc') {
            $orderBy['price'] = $order;
        }

        $products = $repository->findBy($categBy, $orderBy);

        return $this->render('admin_product/products.html.twig', [
            'controller_name' => 'ProductController',
            'showNavbar' => true,
            'products' => $products,
        ]);
    }


        
}
