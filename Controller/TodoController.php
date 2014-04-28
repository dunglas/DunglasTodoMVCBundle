<?php

/*
 * This file is part of the DunglasTodoMVCBundle package.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dunglas\TodoMVCBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Dunglas\TodoMVCBundle\Entity\Todo;
use Dunglas\TodoMVCBundle\Form\Type\TodoType;
use Symfony\Component\HttpFoundation\Request;

/**
 * JSON API
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class TodoController extends FOSRestController implements ClassResourceInterface
{

    /**
     * Gets the Todo repository
     *
     * @return \Doctrine\Common\Persistence\AbstractManagerRegistry
     */
    private function getTodoRepository()
    {
        return $this->getDoctrine()->getRepository('DunglasTodoMVCBundle:Todo');
    }

    /**
     * Validates and saves the todo
     *
     * @param  Todo $todo
     * @param  Request $request
     * @param  bool $new New object?
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function processForm(Todo $todo, Request $request, $new = false)
    {
        $statusCode = $new ? 201 : 204;

        $form = $this->createForm(new TodoType(), $todo);
        // Remove the ID automatically send by Backbone.js (and any other extra fields)
        // http://stackoverflow.com/a/10584965
        $data = $request->request->all();
        $children = $form->all();
        $toBind = array_intersect_key($data, $children);

        $form->submit($toBind);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($todo);
            $em->flush();

            return $this->handleView($this->view($new ? $todo : null, $statusCode));
        }

        return $this->handleView($this->view($form, 400));
    }

    /**
     * Creates
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cpostAction(Request $request)
    {
        return $this->processForm(new Todo(), $request, true);
    }

    /**
     * Reads (all the collection)
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cgetAction()
    {
        $todos = $this->getTodoRepository()->findAll();

        return $this->handleView($this->view($todos));
    }

    /**
     * Reads (an element)
     *
     * @param  int                                                           $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getAction($id)
    {
        $todo = $this->getTodoRepository()->find($id);
        if (!$todo) {
            throw $this->createNotFoundException();
        }

        return $this->handleView($this->view($todo));
    }

    /**
     * Updates
     *
     * @param  int                                                           $id
     * @param  Request                                                       $request
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putAction($id, Request $request)
    {
        $todo = $this->getTodoRepository()->find($id);
        if (!$todo) {
            throw $this->createNotFoundException();
        }

        return $this->processForm($todo, $request);
    }

    /**
     * Deletes
     *
     * @param  int                                                           $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function deleteAction($id)
    {
        $todo = $this->getTodoRepository()->find($id);
        if (!$todo) {
            throw $this->createNotFoundException();
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($todo);
        $em->flush();

        return $this->handleView($this->view(null, 204));
    }
}
