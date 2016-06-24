<?php

namespace SandraBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use SandraBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\RequestParam;

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
     * @RequestParam(name="ref", nullable=false, strict=true, description="ref.")
     * @RequestParam(name="name", nullable=false, strict=true, description="Name.")
     * @RequestParam(name="address", nullable=false, strict=true, description="Address.")
     * @RequestParam(name="postalCode", nullable=false, strict=true, description="PostalCode.")
     * @RequestParam(name="city", nullable=false, strict=true, description="City.")
     * @RequestParam(name="phone", nullable=false, strict=true, description="Phone.")
     * @RequestParam(name="mail", nullable=false, strict=true, description="Mail.")
     *
     * @return object
     */
    public function postCustomerAction(ParamFetcher $paramFetcher){
        $user = new Customer();
        $user->setRef($paramFetcher->get('ref'));
        $user->setName($paramFetcher->get('name'));
        $user->setAddress($paramFetcher->get('address'));
        $user->setPostalCode($paramFetcher->get('postalCode'));
        $user->setCity($paramFetcher->get('city'));
        $user->setPhone($paramFetcher->get('phone'));
        $user->setMail($paramFetcher->get('mail'));


        $view = View::create();
//        $errors = $this->get('validator')->validate($user, array('Registration'));
        $errors = 0;

//        if (count($errors) == 0) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();

            $view->setData($user)->setStatusCode(200);
            return $view;
//        } else {
//            $view->setStatusCode(400);
//            return $view;
//        }

        //return $user;
    }
}
