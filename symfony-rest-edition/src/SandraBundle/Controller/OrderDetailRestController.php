<?php

namespace SandraBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use SandraBundle\Entity\OrderDetail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * OrderDetail controller.
 */
class OrderDetailRestController extends Controller
{
    /**
     * @ApiDoc(
     *  description="Returns a list of orderDetails"
     * )
     */
    public function getOrderdetailsAction(){
        $orderDetail = $this->getDoctrine()->getRepository('SandraBundle:OrderDetail')->findAll();

        return $orderDetail;
    }

    /**
     * @ApiDoc(
     *  description="Returns a orderDetail by his id",
     * )
     *
     * @param $id
     * @return object
     */
    public function getOrderdetailAction($id){
        $orderDetail = $this->getDoctrine()->getRepository('SandraBundle:OrderDetail')->find($id);

        return $orderDetail;
    }

    /**
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new orderDetail from the submitted data.",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @param ParamFetcher $paramFetcher Paramfetcher
     *
     * @RequestParam(name="qty", nullable=false, strict=true, description="The quantity.")
     *
     * @return object
     */
    public function postOrderdetailAction(ParamFetcher $paramFetcher){
        $orderDetail = new OrderDetail();
        $orderDetail->setQty($paramFetcher->get('qty'));


        $view = View::create();
//        $errors = $this->get('validator')->validate($orderDetail, array('Registration'));
        $errors = 0;

//        if (count($errors) == 0) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($orderDetail);
            $manager->flush();

            $view->setData($orderDetail)->setStatusCode(200);
            return $view;
//        } else {
//            $view->setStatusCode(400);
//            return $view;
//        }

        //return $orderDetail;
    }
}
