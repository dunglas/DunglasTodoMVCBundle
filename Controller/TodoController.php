<?php

namespace Dunglas\TodoMVCBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Dunglas\TodoMVCBundle\Entity\Todo;
use Dunglas\TodoMVCBundle\Form\Type\TodoType;

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
     * @return Doctrine\Common\Persistence\AbstractManagerRegistry
     */
    private function getTodoRepository()
    {
        return $this->getDoctrine()->getRepository('DunglasTodoMVCBundle:Todo');
    }

    /**
     * Validates and saves the todo
     * 
     * @param Dunglas\ChaplinDemoBundle\Entity\Todo $todo
     * @param bool $new New object?
     * @return View
     */
    private function processForm(Todo $todo, $new = false)
    {
        $statusCode = $new ? 201 : 204;

        $form = $this->createForm(new TodoType(), $todo);
        // Remove the ID automatically send by Backbone.js (and any other extra fields)
        // http://stackoverflow.com/a/10584965
        $data = $this->getRequest()->request->all();
        $children = $form->all();
        $toBind = array_intersect_key($data, $children);
        
        $form->bind($toBind);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($todo);
            $em->flush();

            return $this->handleView($this->view($new ? $todo : null, $statusCode));
        }

        return $this->handleView($this->view($form, 400));
    }

    /**
     * Creates
     * 
     */
    public function cpostAction()
    {
        return $this->processForm(new Todo(), true);
    }

    /**
     * Reads (all the collection)
     */
    public function cgetAction()
    {
        $todos = $this->getTodoRepository()->findAll();

        return $this->handleView($this->view($todos));
    }

    /**
     * Reads (an element)
     * 
     * @param int $id
     * @throws NotFoundHttpException
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
     * @param int $todo
     */
    public function putAction($id)
    {
        $todo = $this->getTodoRepository()->find($id);
        if (!$todo) {
            throw $this->createNotFoundException();
        }

        return $this->processForm($todo);
    }

    /**
     * Deletes
     * 
     * @param int $id
     * @throws NotFoundHttpException
     */
    public function deleteAction($id)
    {
        $todo = $this->getTodoRepository()->find($id);
        if (!$todo) {
            throw $this->createNotFoundException();
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($todo);
        $em->flush();

        return $this->handleView($this->view(null, 204));
    }

}