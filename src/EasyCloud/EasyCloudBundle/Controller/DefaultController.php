<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = "Poney";
        return $this->render('EasyCloudBundle:Default:index.html.twig', array('poney' => $name));
    }
}
