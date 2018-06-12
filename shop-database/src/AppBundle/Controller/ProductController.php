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
     * @Template()
     */
    public function indexAction()
    {
        $repo = $this->get('doctrine')->getRepository('AppBundle:Product');
        $products = $repo->findAll();

        return compact('products');
    }

    /**
     * @Route("/products/{id}{sl}", name="product_page", defaults={"sl" : ""}, requirements={"id" : "[1-9][0-9]*", "sl" : "/?"})
     * @Template()
     */
    public function showAction($id)
    {
        // $id = {id}
        $repo = $this->get('doctrine')->getRepository('AppBundle:Product');
        $product = $repo->find($id);
        return compact('product');
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

        $em = $this->get('doctrine')->getManager();
        $em->persist($product);
        $em->flush();

        return ['product' => $product];
    }

}
