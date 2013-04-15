<?php

namespace bicpi\Bundle\HtmlConverterBundle\DependencyInjection;

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

        $treeBuilder->root('bicpi_html_converter')
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('guesser')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('lynx')->defaultValue(false)->end()
                        ->scalarNode('html2text')->defaultValue(false)->end()
                        ->scalarNode('simple')->defaultValue(false)->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
