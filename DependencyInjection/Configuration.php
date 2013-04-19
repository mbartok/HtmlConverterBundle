<?php

/*
 * This file is part of the Symfony2 HtmlConverterBundle
 *
 * (c) 2013 Philipp Rieber <p.rieber@webflips.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
                ->requiresAtLeastOneElement()
                ->defaultValue(array('lynx', 'html2text', 'simple'))
                ->prototype('scalar')
                    ->validate()
                    ->ifNotInArray(array('lynx', 'html2text', 'simple'))
                        ->thenInvalid('Invalid converter "%s"')
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
