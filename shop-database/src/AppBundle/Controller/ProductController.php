<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;

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
        $product = $this->get('doctrine')
                        ->getRepository('AppBundle:Product')
                        ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found!');
        }

        return compact('product');
    }
}
