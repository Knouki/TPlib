<?php

namespace SandraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SandraBundle\Entity\Customer;
use SandraBundle\Form\CustomerType;

/**
 * Customer controller.
 */
class CustomerRestController extends Controller
{
    public function getUsersAction(){
        $user = $this->getDoctrine()->getRepository('SandraBundle:Customer')->findAll();
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }

        return $user;
    }
}
