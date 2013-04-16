<?php
namespace Knp\Bundle\MenuBundle\Tests\DependencyInjection;

use bicpi\Bundle\HtmlConverterBundle\DependencyInjection\BicpiHtmlConverterExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class HtmlConverterExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function defaultConfigShouldBeLoaded()
    {
        $container = new ContainerBuilder();
        $loader = new BicpiHtmlConverterExtension();
        $loader->load(array(array()), $container);

        $this->assertTrue($container->hasAlias('bicpi.html_converter'), 'The guesser converter alias is set');
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.guesser'), 'The guesser converter is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.simple'), 'The simple converter is loaded');
        $this->assertTrue(
            $container->hasDefinition('bicpi.html_converter.html2text'),
            'The html2text converter is loaded'
        );
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.lynx'), 'The lynx converter is loaded');

        $this->assertEquals('bicpi.html_converter.guesser', (string)$container->getAlias('bicpi.html_converter'));
        $this->assertEquals(
            'bicpi\HtmlConverter\Converter\ChainConverter',
            $container->getParameter('bicpi.html_converter.guesser.class')
        );

        $methodCalls = $container->getDefinition('bicpi.html_converter.guesser')->getMethodCalls();
        $this->assertEquals(3, count($methodCalls));
        $this->assertEquals('lynx', $methodCalls[0][1][1]);
    }

    /**
     * @test
     */
    public function customConfigShouldBeLoaded()
    {
        $container = new ContainerBuilder();

        $loader = new BicpiHtmlConverterExtension();
        $loader->load(
            array(
                array(
                    'guesser_chain' => array(
                        'simple', 'lynx'
                    )
                )
            ),
            $container
        );

        $methodCalls = $container->getDefinition('bicpi.html_converter.guesser')->getMethodCalls();
        $this->assertEquals(2, count($methodCalls));
        $this->assertEquals('simple', $methodCalls[0][1][1]);
        $this->assertEquals('lynx', $methodCalls[1][1][1]);
    }
}
