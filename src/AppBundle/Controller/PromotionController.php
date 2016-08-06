<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\Promotion;
use AppBundle\Form\PromotionFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PromotionController extends Controller
{

  /**
   * @Route("/promotion/list", name="list_promotions")
   */
  public function showPromotions() {
    $em = $this->getDoctrine()->getManager();
    $promotions = $em->getRepository('AppBundle:Promotion')->findAll();

    if (!isset($promotions)) {
      throw $this->createNotFoundException('No promotions at the moment.');
    }
    return $this->render(
      'admin/promotion/list.promotion.html.twig', [
      'promotions' => $promotions,
    ]);
  }

  /**
   * @Route("/bundle/add", name="add_promotion")
   */
  public function addPromotion(Request $request) {
    $form = $this->createForm(PromotionFormType::class);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $promotion = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($promotion);
      $em->flush();

      $this->addFlash('success', 'Successfully added new promotion.');
      return $this->redirectToRoute('homepage');
    }

    return $this->render('admin/promotion/new.html.twig', [
      'promotionForm' => $form->createView()
    ]);
  }

  /**
   * @Route("/promotion/{id}/edit", name="edit_promotion")
   */
  public function editPromotion(Request $request, Promotion $promotion) {
    $form = $this->createForm(PromotionFormType::class, $promotion);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $promotion = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($promotion);
      $em->flush();

      $this->addFlash('success', 'Successfully edited the promotion.');
      return $this->redirectToRoute('homepage');
    }

    return $this->render('admin/promotion/edit.html.twig', [
      'promotionForm' => $form->createView()
    ]);
  }

  /**
   * @Route("/promotion/{id}/delete", name="remove_promotion")
   */
  public function removePromotion(Promotion $promotion) {
    $em = $this->getDoctrine()->getManager();

    if (!isset($promotion)) {
      throw $this->createNotFoundException('There is no such promotion');
    }
    else {
      $this->addFlash('success', 'Successfully removed promotion.');
      $em->remove($promotion);
      $em->flush();
    }

    return $this->redirectToRoute('homepage');
  }

}
