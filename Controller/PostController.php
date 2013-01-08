<?php

namespace Dunglas\ChaplinDemoBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Dunglas\ChaplinDemoBundle\Entity\Post;
use Dunglas\ChaplinDemoBundle\Form\PostType;

/**
 *
 */
class PostController extends FOSRestController implements ClassResourceInterface
{

    /**
     * Gets the Post repository
     *
     * @return Doctrine\Common\Persistence\AbstractManagerRegistry
     */
    private function getPostRepository()
    {
        return $this->getDoctrine()->getRepository('DunglasChaplinDemoBundle:Post');
    }

    /**
     * Validates and saves the post
     * 
     * @param Dunglas\ChaplinDemoBundle\Entity\Post $post
     * @param bool $new New object?
     * @return View
     */
    private function processForm(Post $post, $new = false)
    {
        $statusCode = $new ? 201 : 204;

        $form = $this->createForm(new PostType(), $post);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($post);
            $em->flush();
                                    
            return $this->handleView($this->view($new ? $post : null, $statusCode));
        }

        return $this->handleView($this->view($form, 400));
    }

    /**
     * Creates
     * 
     */
    public function cpostAction()
    {
        return $this->processForm(new Post(), true);
    }
    
    public function newAction() {
       
    }

    /**
     * Reads (all the collection)
     */
    public function cgetAction()
    {
        $posts = $this->getPostRepository()->findAll();

        return $this->handleView($this->view($posts));
    }

    /**
     * Read (element)
     * 
     * @param int $id
     * @throws NotFoundHttpException
     */
    public function getAction($id)
    {
        $post = $this->getPostRepository()->find($id);
        if (!$post) {
            throw $this->createNotFoundException();
        }

        return $this->handleView($this->view($post));
    }

    /**
     * Updates
     * 
     * @param \Dunglas\ChaplinDemoBundle\Entity\Post $post
     */
    public function putAction($id)
    {
        $post = $this->getPostRepository()->find($id);
        if (!$post) {
            throw $this->createNotFoundException();
        }
        
        return $this->processForm($post);
    }

    /**
     * Deletes
     * 
     * @param int $id
     * @throws NotFoundHttpException
     */
    public function deleteAction($id)
    {
        $post = $this->getPostRepository()->find($id);
        if (!$post) {
            throw $this->createNotFoundException();
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($post);
        $em->flush();
        
        return $this->handleView($this->view(null, 204));
    }

}
