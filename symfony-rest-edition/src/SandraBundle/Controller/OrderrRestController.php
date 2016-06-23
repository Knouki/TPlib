<?php

namespace SandraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Orderr controller.
 */
class OrderrRestController extends Controller
{
    /**
     * @ApiDoc(
     *  description="Returns a list of orders"
     * )
     */
    public function getOrdersAction(){
        $orders = $this->getDoctrine()->getRepository('SandraBundle:Orderr')->findAll();

        return $orders;
    }

    /**
     * @ApiDoc(
     *  description="Returns an order by his id",
     * )
     *
     * @param $id
     * @return object
     */
    public function getOrderAction($id){
        $order = $this->getDoctrine()->getRepository('SandraBundle:Orderr')->find($id);

        return $order;
    }
}
