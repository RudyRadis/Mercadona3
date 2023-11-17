<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use App\Exception\CategoryNotFoundException;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function loadProducts(ManagerRegistry $doctrine): Response
{
    $repository = $doctrine->getRepository(Products::class);
    $products = $repository->findAll();
    return $this->render('default/index.html.twig', [
        'controller_name' => 'DefaultController',
        'showNavbar' => true,
        'products'=>$products,
    ]);
}   

#[Route('/filter/{categ}/{order}/{promo}', name: 'app_filter_sort', defaults: ['categ' => 'default', 'order' => 'default', 'promo' => 'false'])]
public function loadProductsFilter(ManagerRegistry $doctrine, $categ, $order, $promo): Response
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

    return $this->render('default/index.html.twig', [
        'controller_name' => 'ProductController',
        'showNavbar' => true,
        'products' => $products,
    ]);
}

#[Route('/product-not-found', name: 'app_product_not_found')]
public function index(): Response
{
    return $this->render('default/productNoExist.html.twig', [
        'controller_name' => 'ContactController',
        'showNavbar' => true,
    ]);
}



}

















