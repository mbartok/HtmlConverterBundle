<?php

namespace bicpi\Bundle\Html2TextBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bicpi_html2text')
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('converters')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('Lynx')->defaultValue(true)->end()
                        ->scalarNode('Html2Text')->defaultValue(true)->end()
                        ->scalarNode('Simple')->defaultValue(true)->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
