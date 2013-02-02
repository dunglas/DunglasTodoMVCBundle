<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

/**
 * apptestUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class apptestUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        '_assetic_f6591b5' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'f6591b5',    'pos' => NULL,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/f6591b5.css',    ),  ),),
        '_assetic_f6591b5_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'f6591b5',    'pos' => '0',    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/f6591b5_base_1.css',    ),  ),),
        '_assetic_f6591b5_1' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'f6591b5',    'pos' => '1',    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/f6591b5_app_2.css',    ),  ),),
        '_assetic_7a8a89c' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '7a8a89c',    'pos' => NULL,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/7a8a89c.js',    ),  ),),
        '_assetic_7a8a89c_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '7a8a89c',    'pos' => '0',    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/7a8a89c_ie_1.js',    ),  ),),
        '_assetic_8e20e4e' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '8e20e4e',    'pos' => NULL,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/8e20e4e.js',    ),  ),),
        '_assetic_8e20e4e_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '8e20e4e',    'pos' => '0',    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/8e20e4e_require-2.1.4_1.js',    ),  ),),
        'dunglas_todomvc_default_index' => array (  0 =>   array (    0 => 'filter',  ),  1 =>   array (    'filter' => '1',    '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'filter',    ),  ),),
        'delete_todo' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::deleteAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^\\.]+',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/todos',    ),  ),),
        'get_todo' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::getAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^\\.]+',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/todos',    ),  ),),
        'get_todos' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::cgetAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^\\.]+',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/todos',    ),  ),),
        'post_todos' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::cpostAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^\\.]+',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/todos',    ),  ),),
        'put_todo' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Dunglas\\TodoMVCBundle\\Controller\\TodoController::putAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'PUT',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^\\.]+',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/todos',    ),  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }
}
