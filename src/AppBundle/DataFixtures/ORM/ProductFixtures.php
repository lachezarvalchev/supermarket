<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class ProductFixtures implements FixtureInterface {

  public function load(ObjectManager $manager) {
    Fixtures::load(__DIR__ . '/fixtures.yml', $manager, ['providers' => [$this]]);
  }

  public function products() {
    $list = [
      'Ale',
      'Bouza',
      'Boza',
      'Bozo',
      'Cask ale',
      'Cauim',
      'Chhaang',
      'Chicha',
      'Fruit and vegetable beer',
      'Gotlandsdricka',
      'Gruit',
      'Herb and spiced beer',
      'Kellerbier',
      'Kvass',
      'Lager',
      'Oshikundu',
      'Pulque',
      'Purl',
      'Sahti[39]',
      'Smoked beer',
      'Strong ale',
      'Sour ale',
      'Sulima',
      'Wheat beer',
      'Zwickelbier',
    ];

    $picked_product = array_rand($list);

    return $list[$picked_product];
  }

  public function skus() {
    $list = [
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
    ];

    $picked_skus = array_rand($list);

    return $list[$picked_skus];
  }

}
