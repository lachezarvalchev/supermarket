<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 * @UniqueEntity(fields="sku", message="SKU is already in use")
 * @ORM\Table(name="product")
 */
class Product {
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @Assert\NotBlank()
   * @ORM\Column(type="string")
   */
  private $name;

  /**
   * @Assert\NotBlank()
   * @Assert\Choice(callback = "validSKU")
   * @ORM\Column(type="string")
   */
  private $sku;

  /**
   * @Assert\NotBlank()
   * @Assert\Range(min=0, minMessage="Price cannot be negative")
   * @ORM\Column(type="float")
   */
  private $price;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

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
   * @return mixed
   */
  public function getSku() {
    return $this->sku;
  }

  /**
   * @param mixed $sku
   */
  public function setSku($sku) {
    $this->sku = $sku;
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

  public static function validSKU() {
    return array(
      'A',
      'B',
      'C',
      'D',
      'E',
      'F',
      'G',
      'H',
      'I',
      'J',
      'K',
      'L',
      'M',
      'N',
      'O',
      'P',
      'Q',
      'R',
      'S',
      'T',
      'U',
      'V',
      'W',
      'X',
      'Y',
      'Z',
    );
  }

  public function __toString() {
    return $this->getSku();
  }

}
