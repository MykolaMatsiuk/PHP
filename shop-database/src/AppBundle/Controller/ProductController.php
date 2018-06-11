<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
}
