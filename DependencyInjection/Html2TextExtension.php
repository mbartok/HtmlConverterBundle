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

        foreach ($config['converters'] as $converter => $enabled) {
            if ($enabled) {
                $class = "bicpi\\Component\\Html2Text\\Converter\\{$converter}Converter";
                $container->get('bicpi.html2text')->addConverter(new $class);
            }
        }
    }
}
