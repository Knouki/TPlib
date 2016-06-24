<?php

namespace SandraBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use SandraBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * Product controller.
 */
class ProductRestController extends Controller
{
    /**
     * @ApiDoc(
     *  description="Returns a list of products"
     * )
     */
    public function getProductsAction(){
        $product = $this->getDoctrine()->getRepository('SandraBundle:Product')->findAll();

        return $product;
    }

    /**
     * @ApiDoc(
     *  description="Returns a product by his id",
     * )
     *
     * @param $id
     * @return object
     */
    public function getProductAction($id){
        $product = $this->getDoctrine()->getRepository('SandraBundle:Product')->find($id);

        return $product;
    }

    /**
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new product from the submitted data.",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @param ParamFetcher $paramFetcher Paramfetcher
     *
     * @RequestParam(name="name", nullable=false, strict=true, description="The name.")
     * @RequestParam(name="description", nullable=false, strict=true, description="The description.")
     * @RequestParam(name="price", nullable=false, strict=true, description="The price.")
     *
     * @return object
     */
    public function postProductAction(ParamFetcher $paramFetcher){
        $product = new Product();
        $product->setName($paramFetcher->get('name'));
        $product->setDescription($paramFetcher->get('description'));
        $product->setPrice($paramFetcher->get('price'));


        $view = View::create();
//        $errors = $this->get('validator')->validate($product, array('Registration'));
        $errors = 0;

//        if (count($errors) == 0) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($product);
            $manager->flush();

            $view->setData($product)->setStatusCode(200);
            return $view;
//        } else {
//            $view->setStatusCode(400);
//            return $view;
//        }

        //return $product;
    }
}
