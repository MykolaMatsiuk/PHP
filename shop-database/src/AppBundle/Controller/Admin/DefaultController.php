<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin_default")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/admin/something", name="admin_something")
     * @Template()
     */
    public function testAction()
    {
        return [];
    }
}
