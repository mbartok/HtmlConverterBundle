<?php
namespace Knp\Bundle\MenuBundle\Tests\DependencyInjection;

use bicpi\Bundle\HtmlConverterBundle\DependencyInjection\BicpiHtmlConverterExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class HtmlConverterExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function defaultServicesShouldBeLoaded()
    {
        $container = new ContainerBuilder();
        $loader = new BicpiHtmlConverterExtension();
        $loader->load(array(array()), $container);

        $this->assertTrue($container->hasAlias('bicpi.html_converter'), 'The guesser converter alias is set');
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.guesser'), 'The guesser converter is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.simple'), 'The simple converter is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.html2text'), 'The html2text converter is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html_converter.lynx'), 'The lynx converter is loaded');
    }
}
