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
            ->children()
                ->arrayNode('guesser_chain')
                    ->prototype('scalar')->end()
                    ->defaultValue(array('lynx', 'html2text', 'simple'))
            ->end()
        ;

        return $treeBuilder;
    }
}
