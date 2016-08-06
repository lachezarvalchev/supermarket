<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="promotion")
 */
class Promotion {

  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $code;

  /**
   * @ORM\Column(type="string")
   */
  private $name;

  /**
   * @ORM\Column(type="string")
   */
  protected $products;

  public function __construct() {
    $this->products = new ArrayCollection();
  }

  /**
   * @return mixed
   */
  public function getProducts() {
    return $this->products;
  }

  /**
   * @return mixed
   */
  public function getProduct() {
    return $this->product;
  }

  /**
   * @param mixed $product
   */
  public function setProduct(Product $product) {
    $this->product = $product;
  }

  /**
   * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Product")
   */
  private $product;

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @ORM\Column(type="string")
   */
  private $price;

  /**
   * @return mixed
   */
  public function getCode() {
    return $this->code;
  }

  /**
   * @param mixed $code
   */
  public function setCode($code) {
    $this->code = $code;
  }

  /**
   * @return mixed
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price) {
    $this->price = $price;
  }

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

}
