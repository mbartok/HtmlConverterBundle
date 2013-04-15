<?php

namespace bicpi\Bundle\HtmlConverterBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ConverterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('bicpi.html_converter')) {
            return;
        }

        $definition = $container->getDefinition('bicpi.html_converter');

        $converters = array();
        foreach ($container->findTaggedServiceIds('bicpi.html_converter.converter') as $id => $args) {
            $priority = isset($attributes[0]['priority']) ? $attributes[0]['priority'] : 0;
            $converters[$priority][] = new Reference($id);
        }

        if (empty($converters)) {
            return;
        }

        // sort by priority and flatten
        krsort($warmers);
        $converters = call_user_func_array('array_merge', $converters);

        foreach ($converters as $converter) {
            $definition->addMethodCall('addConverter', array($converter));
        }
    }
}