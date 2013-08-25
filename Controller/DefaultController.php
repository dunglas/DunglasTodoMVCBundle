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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Serves the homepage
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/{filter}", defaults={"filter" = 1})
     * @Template()
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $todos = $this->getDoctrine()->getRepository('DunglasTodoMVCBundle:Todo')->findAll();

        return array('todos' => $todos);
    }
}
