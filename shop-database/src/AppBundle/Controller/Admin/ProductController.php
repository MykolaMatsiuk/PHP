<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;

class ProductController extends Controller
{
    /**
     * @Route("/admin/products", name="admin_products_page")
     * @Template()
     */
    public function indexAction()
    {
        $repo = $this->get('doctrine')->getRepository('AppBundle:Product');
        $products = $repo->findAll();

        return compact('products');
    }

    /**
     * @Route("/admin/products/edit/{id}", name="admin_product_edit", requirements={"id" : "[1-9][0-9]*"})
     * @Template()
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $doctrine = $this->get('doctrine');

        $product = $doctrine->getRepository('AppBundle:Product')
                            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found!');
        }

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash('success', 'Product edited!');
            return $this->redirectToRoute('product_page', ['id' => $id]);
        }

        return ['product' => $product, 'form' => $form->createView()];
    }

}
