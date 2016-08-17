<?php

namespace AppBundle\Service;


use AppBundle\AppBundle;
use AppBundle\Entity\CartItem;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;

/**
 * Class ShoppingCart
 *
 * @package AppBundle\Service
 */
class ShoppingCart {

  /**
   * @var
   */
  private $items = array();

  /**
   * @var
   */
  private $em;

  /**
   * ShoppingCart constructor.
   */
  public function __construct(EntityManager $entity_manager) {
    $this->em = $entity_manager;
  }

  /**
   * @return mixed
   */
  public function getItems() {
    $items = $this->em->getRepository('AppBundle:CartItem')->findAll();
    return $items;
  }

  /**
   * @param array $items
   */
  private function setItems($items) {
    $this->items = $items;
  }

  public function addItem(CartItem $item, Product $product) {
    $promo_code = array();
    $cart_code = array();
    $full_code = '';

    $promotions = $this->em->getRepository('AppBundle:Promotion')->findOrderByCode();

    foreach ($promotions as $promotion) {
      $promo_code[$promotion->getId()] = $promotion->getCode();
    }

    $new_items = $this->getItems();
    foreach ($new_items as $new_item) {
      $cart_code[$new_item->getProductSku()][] = $new_item->getProductSku();
      $full_code .= $new_item->getProductSku();
    }
    $cart_code[$product->getSku()][] = $product->getSku();
    $full_code .= $product->getSku();
    ksort($cart_code);

    $reorder = str_split($full_code);
    asort($reorder);
    $full_code = implode("", $reorder);

    $flipped_promo = array_flip($promo_code);

    $item->setProductId($product->getId());
    $item->setProductSku($product->getSku());
    $item->setProductRegularPrice($product->getPrice());
    $item->setProductReducedPrice($product->getPrice());

    $this->em->persist($item);
    $this->em->flush();

    $items = $this->items;
    $items[] = $item->getId();

    $this->setItems($items);
  }
}
