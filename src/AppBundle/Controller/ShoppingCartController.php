<?php

namespace AppBundle\Controller;

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
    return $this->render('supermarket/front.html.twig');
  }

  /**
   * @Route("/add/{productId}", name="add_product_cart")
   * @Method("GET")
   */
  public function addProductCart($productId) {

  }

  /**
   * @Route("/checkout", name="checkout_cart")
   */
  public function checkoutCart() {

  }

}
