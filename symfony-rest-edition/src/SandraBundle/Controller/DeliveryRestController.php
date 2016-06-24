<?php

namespace SandraBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use SandraBundle\Entity\Delivery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * Delivery controller.
 */
class DeliveryRestController extends Controller
{
    /**
     * @ApiDoc(
     *  description="Returns a list of deliveries"
     * )
     */
    public function getDeliveriesAction(){
        $delivery = $this->getDoctrine()->getRepository('SandraBundle:Delivery')->findAll();

        return $delivery;
    }

    /**
     * @ApiDoc(
     *  description="Returns a delivery by his id",
     * )
     *
     * @param $id
     * @return object
     */
    public function getDeliveryAction($id){
        $delivery = $this->getDoctrine()->getRepository('SandraBundle:Delivery')->find($id);

        return $delivery;
    }

    /**
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new delivery from the submitted data.",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @param ParamFetcher $paramFetcher Paramfetcher
     *
     * @RequestParam(name="ref", nullable=false, strict=true, description="The ref.")
     *
     * @return object
     */
    public function postDeliveryAction(ParamFetcher $paramFetcher){
        $delivery = new Delivery();
        $delivery->setRef($paramFetcher->get('ref'));
        $delivery->setDateDelivery(new \DateTime());


        $view = View::create();
//        $errors = $this->get('validator')->validate($delivery, array('Registration'));
        $errors = 0;

//        if (count($errors) == 0) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($delivery);
            $manager->flush();

            $view->setData($delivery)->setStatusCode(200);
            return $view;
//        } else {
//            $view->setStatusCode(400);
//            return $view;
//        }

        //return $delivery;
    }
}
