<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="products_page")
     */
    public function indexAction()
    {
        return $this->render('products/index.html.twig');
    }

    /**
     * @Route("/products/{id}{sl}", name="product_page", requirements={"id" : "[1-9][0-9]*", "sl" : "/?"})
     */
    public function showAction($id)
    {
        // $id = {id}
        return $this->render('products/show.html.twig', ['id' => $id]);
    }

    /**
     * @Route("/product-test", name="product_test")
     * @Template()
     */
    public function testAction()
    {
        $product = new Product();

        $product->setTitle('Shoe')
                ->setDescription('shoe <b>test</b> testing')
                ->setPrice('3200');

        return ['product' => $product];
    }

}
