<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CartItem;
use AppBundle\Entity\Product;
use AppBundle\Service\ShoppingCart;
use AppBundle\Form\ProductFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller {

  /**
   * @Route("/product/list", name="list_products")
   */
  public function showProducts() {
    $em = $this->getDoctrine()->getManager();
    $products = $em->getRepository('AppBundle:Product')->findOrderBySKU();

    if (!isset($products)) {
      throw $this->createNotFoundException('No products at the moment.');
    }
    return $this->render(
      'admin/product/list.product.html.twig', [
      'products' => $products,
    ]);
  }

  /**
   * @Route("/product/add", name="add_product")
   */
  public function addProduct(Request $request) {
    $form = $this->createForm(ProductFormType::class);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $product = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($product);
      $em->flush();

      $this->addFlash('success', 'Successfully added new product.');
      return $this->redirectToRoute('list_products');
    }

    return $this->render('admin/product/new.html.twig', [
      'productForm' => $form->createView()
    ]);
  }

  /**
   * @Route("/product/{id}/edit", name="edit_product")
   */
  public function editProduct(Request $request, Product $product) {
    $form = $this->createForm(ProductFormType::class, $product);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $product = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($product);
      $em->flush();

      $this->addFlash('success', 'Successfully edited the product.');
      return $this->redirectToRoute('list_products');
    }

    return $this->render('admin/product/edit.html.twig', [
      'productForm' => $form->createView()
    ]);
  }

  /**
   * @Route("/product/{id}/delete", name="remove_product")
   */
  public function removeProduct(Product $product) {
    $em = $this->getDoctrine()->getManager();

    if (!isset($product)) {
      throw $this->createNotFoundException('There is no such product');
    }
    else {
      $this->addFlash('success', 'Successfully removed product.');
      $em->remove($product);
      $em->flush();
    }

    return $this->redirectToRoute('list_products');
  }

  /**
   * @Route("/product/{id}/buy", name="add_product_cart")
   */
  public function addProductCart(Product $product) {
    $entity_manager = $this->getDoctrine()->getManager();
    $shopping_cart = new ShoppingCart($entity_manager);

    $item = new CartItem();
    $shopping_cart->addItem($item, $product);

    return $this->redirectToRoute('view_shopping_cart');
  }

}
