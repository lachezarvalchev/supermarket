<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CartItem;
use AppBundle\Service\ShoppingCart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCartController extends Controller
{
  /**
   * @Route("/cart/view", name="view_shopping_cart")
   */
  public function showShoppingCart() {
    $entity_manager = $this->getDoctrine()->getManager();
    $shopping_cart = new ShoppingCart($entity_manager);
    $items = $shopping_cart->getItems();

    // TODO: Check if shopping cart exists
    // If yes - load it
    // If no - create it
    // Add product
    // Validate against price rules
    // Do necessary changes on prices
    // Redirect to shopping cart view

    return $this->render(
      'supermarket/shoppingcart.html.twig', [
      'items' => $items,
    ]);
  }

  /**
   * @Route("/checkout", name="checkout_cart")
   */
  public function checkoutCart() {

  }

  /**
   * @Route("/cart/{id}/delete", name="remove_item")
   */
  public function removeProduct(CartItem $item) {
    $em = $this->getDoctrine()->getManager();

    if (!isset($item)) {
      throw $this->createNotFoundException('There is no such product');
    }
    else {
      $this->addFlash('success', 'Successfully removed product.');
      $em->remove($item);
      $em->flush();
    }

    return $this->redirectToRoute('view_shopping_cart');
  }

}
