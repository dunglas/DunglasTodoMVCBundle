<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * apptestUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class apptestUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // _assetic_f6591b5
        if ($pathinfo === '/css/f6591b5.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'f6591b5',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_f6591b5',);
        }

        // _assetic_f6591b5_0
        if ($pathinfo === '/css/f6591b5_base_1.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'f6591b5',  'pos' => '0',  '_format' => 'css',  '_route' => '_assetic_f6591b5_0',);
        }

        // _assetic_f6591b5_1
        if ($pathinfo === '/css/f6591b5_app_2.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'f6591b5',  'pos' => '1',  '_format' => 'css',  '_route' => '_assetic_f6591b5_1',);
        }

        // _assetic_7a8a89c
        if ($pathinfo === '/js/7a8a89c.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '7a8a89c',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_7a8a89c',);
        }

        // _assetic_7a8a89c_0
        if ($pathinfo === '/js/7a8a89c_ie_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '7a8a89c',  'pos' => '0',  '_format' => 'js',  '_route' => '_assetic_7a8a89c_0',);
        }

        // _assetic_8e20e4e
        if ($pathinfo === '/js/8e20e4e.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '8e20e4e',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_8e20e4e',);
        }

        // _assetic_8e20e4e_0
        if ($pathinfo === '/js/8e20e4e_require-2.1.4_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '8e20e4e',  'pos' => '0',  '_format' => 'js',  '_route' => '_assetic_8e20e4e_0',);
        }

        // dunglas_todomvc_default_index
        if (preg_match('#^/(?P<filter>[^/]+)?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  'filter' => '1',  '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'dunglas_todomvc_default_index'));
        }

        if (0 === strpos($pathinfo, '/api')) {
            // post_todos
            if (0 === strpos($pathinfo, '/api/todos') && preg_match('#^/api/todos(?:\\.(?P<_format>[^\\.]+))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_post_todos;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::cpostAction',  '_format' => 'json',)), array('_route' => 'post_todos'));
            }
            not_post_todos:

            // get_todos
            if (0 === strpos($pathinfo, '/api/todos') && preg_match('#^/api/todos(?:\\.(?P<_format>[^\\.]+))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_todos;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::cgetAction',  '_format' => 'json',)), array('_route' => 'get_todos'));
            }
            not_get_todos:

            // get_todo
            if (0 === strpos($pathinfo, '/api/todos') && preg_match('#^/api/todos/(?P<id>[^/\\.]+)(?:\\.(?P<_format>[^\\.]+))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_todo;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::getAction',  '_format' => 'json',)), array('_route' => 'get_todo'));
            }
            not_get_todo:

            // put_todo
            if (0 === strpos($pathinfo, '/api/todos') && preg_match('#^/api/todos/(?P<id>[^/\\.]+)(?:\\.(?P<_format>[^\\.]+))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_put_todo;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::putAction',  '_format' => 'json',)), array('_route' => 'put_todo'));
            }
            not_put_todo:

            // delete_todo
            if (0 === strpos($pathinfo, '/api/todos') && preg_match('#^/api/todos/(?P<id>[^/\\.]+)(?:\\.(?P<_format>[^\\.]+))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_delete_todo;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::deleteAction',  '_format' => 'json',)), array('_route' => 'delete_todo'));
            }
            not_delete_todo:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
