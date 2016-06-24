<?php

namespace SandraBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use SandraBundle\Entity\Invoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * Invoice controller.
 */
class InvoiceRestController extends Controller
{
    /**
     * @ApiDoc(
     *  description="Returns a list of invoices"
     * )
     */
    public function getInvoicesAction(){
        $invoice = $this->getDoctrine()->getRepository('SandraBundle:Invoice')->findAll();

        return $invoice;
    }

    /**
     * @ApiDoc(
     *  description="Returns a invoice by his id",
     * )
     *
     * @param $id
     * @return object
     */
    public function getInvoiceAction($id){
        $invoice = $this->getDoctrine()->getRepository('SandraBundle:Invoice')->find($id);

        return $invoice;
    }

    /**
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new invoice from the submitted data.",
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
    public function postInvoiceAction(ParamFetcher $paramFetcher){
        $invoice = new Invoice();
        $invoice->setRef($paramFetcher->get('ref'));
        $invoice->setDateInvoice(new \DateTime());


        $view = View::create();
//        $errors = $this->get('validator')->validate($invoice, array('Registration'));
        $errors = 0;

//        if (count($errors) == 0) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($invoice);
            $manager->flush();

            $view->setData($invoice)->setStatusCode(200);
            return $view;
//        } else {
//            $view->setStatusCode(400);
//            return $view;
//        }

        //return $invoice;
    }
}
