<?php

/*
 * This file is part of the DunglasTodoMVCBundle package.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dunglas\TodoMVCBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DunglasTodoMVCExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');
        if (!isset($bundles['FOSRestBundle'])) {
            throw new \RuntimeException('FOSRestBundle must be installed to use DunglasTodoMVCBundle.');
        }

        if (isset($bundles['DunglasAngularCsrfBundle'])) {
            $container->prependExtensionConfig('dunglas_angular_csrf', array(
                    'cookie' => array(
                        'set_on' => array(
                            array(
                                'route' => '^dunglas_todomvc_default_index$')
                        )
                    ),
                    'secure' => array(
                        array('route' => '_todo')
                    )
                )
            );
        }

        $container->prependExtensionConfig('fos_rest', array(
            'body_listener' => array(
                'decoders' => array('json' => 'fos_rest.decoder.jsontoform'),
            ),
            'format_listener' => array(
                'rules' => array(
                    array (
                        'path' => '^/api',
                        'priorities' => array ('json', 'xml'),
                        'fallback_format' => 'json',
                        'prefer_extension' => true
                    ),
                    array (
                        'path' => '^/',
                        'priorities' => array ('html', '*/*'),
                    )
                )
            )
        ));

    }

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }
}
