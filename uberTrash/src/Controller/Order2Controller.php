<?php

namespace App\Controller;

use App\Entity\Order2;
use App\Form\Order2Type;
use App\Repository\Order2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/order2")
 */
class Order2Controller extends AbstractController
{
    /**
     * @Route("/", name="app_order2_index", methods={"GET"})
     */
    public function index(Order2Repository $order2Repository): Response
    {
        return $this->render('order2/index.html.twig', [
            'order2s' => $order2Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_order2_new", methods={"GET", "POST"})
     */
    public function new(Request $request, Order2Repository $order2Repository): Response
    {
        $order2 = new Order2();
        $form = $this->createForm(Order2Type::class, $order2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order2Repository->add($order2, true);

            return $this->redirectToRoute('app_order2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('order2/new.html.twig', [
            'order2' => $order2,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_order2_show", methods={"GET"})
     */
    public function show(Order2 $order2): Response
    {
        return $this->render('order2/show.html.twig', [
            'order2' => $order2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_order2_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Order2 $order2, Order2Repository $order2Repository): Response
    {
        $form = $this->createForm(Order2Type::class, $order2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order2Repository->add($order2, true);

            return $this->redirectToRoute('app_order2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('order2/edit.html.twig', [
            'order2' => $order2,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_order2_delete", methods={"POST"})
     */
    public function delete(Request $request, Order2 $order2, Order2Repository $order2Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$order2->getId(), $request->request->get('_token'))) {
            $order2Repository->remove($order2, true);
        }

        return $this->redirectToRoute('app_order2_index', [], Response::HTTP_SEE_OTHER);
    }
}
