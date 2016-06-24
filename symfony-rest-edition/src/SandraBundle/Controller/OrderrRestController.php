<?php

namespace SandraBundle\Controller;

use DateTime;
use FOS\RestBundle\View\View;
use SandraBundle\Entity\Orderr;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\RequestParam;

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

    /**
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new user from the submitted data.",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @param ParamFetcher $paramFetcher Paramfetcher
     *
     * @RequestParam(name="ref", nullable=false, strict=true, description="The reference.")
     *
     * @return object
     */
    public function postOrderAction(ParamFetcher $paramFetcher){
        $orderr = new Orderr();
        $orderr->setRef($paramFetcher->get('ref'));
        $orderr->setDateCreated(new DateTime());
        

        $view = View::create();
//        $errors = $this->get('validator')->validate($orderr, array('Registration'));
        $errors = 0;

//        if (count($errors) == 0) {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($orderr);
        $manager->flush();

        $view->setData($orderr)->setStatusCode(200);
        return $view;
//        } else {
//            $view->setStatusCode(400);
//            return $view;
//        }

        //return $orderr;
    }
}
