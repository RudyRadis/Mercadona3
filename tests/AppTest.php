<?php

namespace App\Tests;
use App\Controller\DefaultController;
use App\Controller\AdminProductController;
use App\Entity\Products;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityRepository;



class AppTest extends KernelTestCase {

    // DefaultController

    public function testLoadProductsReturns200()
{
    // Simuler le ManagerRegistry et le repository
    $productRepository = $this->createMock(EntityRepository::class);
    $managerRegistry = $this->createMock(ManagerRegistry::class);
    
    // Configurer le ManagerRegistry pour retourner le mock repository
    $managerRegistry->method('getRepository')->willReturn($productRepository);
    
    // Simuler un tableau de produits à retourner
    $productRepository->method('findAll')->willReturn([]);

    // Créer le contrôleur avec le ManagerRegistry mocké
    $controller = new DefaultController();
    $controller->setContainer($this->getContainer()); // Vous devez créer une méthode pour simuler le container si nécessaire

    // Appeler la méthode du contrôleur
    $response = $controller->loadProducts($managerRegistry);
    
    // Assert que le statut de la réponse est 200
    $this->assertEquals(200, $response->getStatusCode());
    
    // Assert que la vue attendue est rendue
    // Note: Vous aurez besoin de vérifier la réponse plus en détail pour cela.
}


public function testLoadProductsFilterReturnsCorrectData()
{
    // Simuler le ManagerRegistry et le repository
    $productRepository = $this->createMock(EntityRepository::class);
    $managerRegistry = $this->createMock(ManagerRegistry::class);
    
    // Configurer le ManagerRegistry pour retourner le mock repository
    $managerRegistry->method('getRepository')->willReturn($productRepository);
    
    // Définir les paramètres de la requête
    $categ = 'electronics';
    $order = 'asc';
    $promo = 'true';
    
    // Simuler les données retournées par le repository
    $mockProducts = [
        // Simuler des objets produits ou des tableaux qui représentent des produits
    ];
    $productRepository->expects($this->once())
                      ->method('findBy')
                      ->with(
                          $this->equalTo(['categ' => $categ, 'promoBool' => true]),
                          $this->equalTo(['price' => $order])
                      )
                      ->willReturn($mockProducts);

    // Créer le contrôleur avec le ManagerRegistry mocké
    $controller = new DefaultController();
    self::bootKernel();
    $container = static::getContainer();
    $controller->setContainer($container);

    // Appeler la méthode du contrôleur avec des arguments simulés
    $response = $controller->loadProductsFilter($managerRegistry, $categ, $order, $promo);
    
    // Vérifier que le statut de la réponse est 200
    $this->assertEquals(200, $response->getStatusCode());
}

// AdminProdcutController

public function testLoadProductsReturnsCorrectResponse() {
    // Simuler le ManagerRegistry et le repository
    $productRepository = $this->createMock(EntityRepository::class);
    $managerRegistry = $this->createMock(ManagerRegistry::class);
    
    // Configurer le ManagerRegistry pour retourner le mock repository
    $managerRegistry->method('getRepository')->willReturn($productRepository);
    
    // Simuler un tableau de produits à retourner par le repository
    $productRepository->method('findAll')->willReturn([
        // ... vous pouvez simuler des données de produits ici ...
    ]);

    // Initialiser le kernel de test
    self::bootKernel();
    $container = static::getContainer();

    // Créer le contrôleur et définir son conteneur
    $controller = new AdminProductController();
    $controller->setContainer($container);

    // Appeler la méthode loadProducts du contrôleur
    $response = $controller->loadProducts($managerRegistry);

    // Vérifier que le statut de la réponse est 200
    $this->assertEquals(200, $response->getStatusCode());

    // Vérifier que le bon template est utilisé
    // Note: Vous devrez peut-être utiliser des méthodes spécifiques de WebTestCase ou de votre framework pour tester cela
}



}