<?php

namespace bicpi\Bundle\Html2TextBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class Html2TextExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('html2text.xml');
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $priority = 0;
        foreach ($config['converter_chain'] as $converter => $enabled) {
            if ($enabled) {
                $container
                    ->getDefinition('bicpi.html2text.converter.'.$converter)
                    ->addTag('bicpi.html2text.converter', array('priority' => $priority++));
            }
        }
    }
}
