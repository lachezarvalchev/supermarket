<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart_item")
 */
class CartItem {

  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $product_sku;

  /**
   * @ORM\Column(type="integer")
   */
  private $product_id;

  /**
   * @ORM\Column(type="string")
   */
  private $product_regular_price;

  /**
   * @ORM\Column(type="string")
   */
  private $product_reduced_price;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return mixed
   */
  public function getProductSku() {
    return $this->product_sku;
  }

  /**
   * @param mixed $product_sku
   */
  public function setProductSku($product_sku) {
    $this->product_sku = $product_sku;
  }

  /**
   * @return mixed
   */
  public function getProductId() {
    return $this->product_id;
  }

  /**
   * @param mixed $product_id
   */
  public function setProductId($product_id) {
    $this->product_id = $product_id;
  }

  /**
   * @return mixed
   */
  public function getProductRegularPrice() {
    return $this->product_regular_price;
  }

  /**
   * @param mixed $product_regular_price
   */
  public function setProductRegularPrice($product_regular_price) {
    $this->product_regular_price = $product_regular_price;
  }

  /**
   * @return mixed
   */
  public function getProductReducedPrice() {
    return $this->product_reduced_price;
  }

  /**
   * @param mixed $product_reduced_price
   */
  public function setProductReducedPrice($product_reduced_price) {
    $this->product_reduced_price = $product_reduced_price;
  }

}
