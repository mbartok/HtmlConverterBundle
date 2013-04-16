<?php

namespace bicpi\Bundle\HtmlConverterBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class BicpiHtmlConverterExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('html_converter.xml');
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setAlias('bicpi.html_converter', 'bicpi.html_converter.guesser');

        foreach ($config['guesser_chain'] as $converter) {
            $container
                ->getDefinition('bicpi.html_converter.guesser')
                ->addMethodCall('addConverter', array(new Reference('bicpi.html_converter.'.$converter), $converter));
        }
    }
}
