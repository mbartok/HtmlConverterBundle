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
                        ->scalarNode('lynx')->defaultValue(true)->end()
                        ->scalarNode('html2text')->defaultValue(true)->end()
                        ->scalarNode('simple')->defaultValue(true)->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
