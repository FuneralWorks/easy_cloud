<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $nbClients = count($em->getRepository('EasyCloudBundle:Clients')->findAll());
        $nbProducts = count($em->getRepository('EasyCloudBundle:Products')->findAll());
        $nbLicences = count($em->getRepository('EasyCloudBundle:Licences')->findAll());
        $nbUser = count($em->getRepository('EasyCloudBundle:User')->findAll());


        
        return array('nbClients' => $nbClients,
                     'nbLicences' => $nbLicences,
                     'nbProducts' => $nbProducts,
                     'nbUser' => $nbUser);
    }
}

?>