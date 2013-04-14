<?php

namespace bicpi\Bundle\Html2TextBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ConverterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('bicpi.html2text')) {
            return;
        }

        $definition = $container->getDefinition('bicpi.html2text');
        foreach ($container->findTaggedServiceIds('bicpi.html2text.converter') as $id => $args) {
            $definition->addMethodCall('addConverter', array(new Reference($id)));
        }
    }
}