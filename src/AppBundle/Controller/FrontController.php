<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
  /**
   * @Route("/", name="homepage")
   *
   * @param $name
   *
   * @return \Symfony\Component\HttpFoundation\Response
   */
    public function indexAction()
    {
      return $this->render('supermarket/front.html.twig');
    }
}
