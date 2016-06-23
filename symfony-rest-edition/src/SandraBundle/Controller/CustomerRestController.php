<?php

namespace SandraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Customer controller.
 */
class CustomerRestController extends Controller
{
    /**
     * @ApiDoc(
     *  description="Returns a list of customers"
     * )
     */
    public function getCustomersAction(){
        $user = $this->getDoctrine()->getRepository('SandraBundle:Customer')->findAll();

        return $user;
    }

    /**
     * @ApiDoc(
     *  description="Returns a customer by his id",
     * )
     *
     * @param $id
     * @return object
     */
    public function getCustomerAction($id){
        $user = $this->getDoctrine()->getRepository('SandraBundle:Customer')->find($id);

        return $user;
    }
}
