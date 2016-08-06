<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCartController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

  /**
   * @Route("/cart", name="view_shopping_cart")
   */
  public function showShoppingCart() {
    $em = $this->getDoctrine()->getManager();
    $items = $em->getRepository('AppBundle:Promotion:ShoppingCart')->find(1)->getContainProducts();
    return ['items' => $items];

    return $this->render('supermarket/front.html.twig');
  }

  /**
   * @Route("/add/{id}", name="add_product_cart")
   */
  public function addProductCart(Product $product) {

  }

  /**
   * @Route("/checkout", name="checkout_cart")
   */
  public function checkoutCart() {

  }

}
