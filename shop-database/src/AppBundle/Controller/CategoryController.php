<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}", name="category_page")
     * @Template()
     */
    public function showAction($id)
    {
        $category = $this->get('doctrine')
                        ->getRepository('AppBundle:Category')
                        ->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Category not found!');
        }

        return compact('category');
    }
}
