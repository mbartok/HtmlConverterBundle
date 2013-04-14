<?php
namespace Knp\Bundle\MenuBundle\Tests\DependencyInjection;

use bicpi\Bundle\Html2TextBundle\DependencyInjection\Html2TextExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Html2TextExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function defaultServicesShouldBeLoaded()
    {
        $container = new ContainerBuilder();
        $loader = new Html2TextExtension();
        $loader->load(array(array()), $container);

        $this->assertTrue($container->hasDefinition('bicpi.html2text'), 'The html2text service is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html2text.converter.simple'), 'The simple converter is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html2text.converter.html2text'), 'The html2text converter is loaded');
        $this->assertTrue($container->hasDefinition('bicpi.html2text.converter.lynx'), 'The lynx converter is loaded');
    }

    /**
     * @test
     */
    public function enabledConvertersShouldBeLoadedOnly()
    {
        $config = array(array(
            'converters' => array(
                'simple' => false,
                'html2text' => false,
            )
        ));
        $container = new ContainerBuilder();
        $loader = new Html2TextExtension();
        $loader->load($config, $container);

        $this->assertFalse(
            $container->getDefinition('bicpi.html2text.converter.simple')->hasTag('bicpi.html2text.converter'),
            'The html2text converter is tagged/enabled'
        );
        $this->assertFalse(
            $container->getDefinition('bicpi.html2text.converter.html2text')->hasTag('bicpi.html2text.converter'),
            'The html2text converter is tagged/enabled'
        );
        $this->assertTrue(
            $container->getDefinition('bicpi.html2text.converter.lynx')->hasTag('bicpi.html2text.converter'),
            'The html2text converter is tagged/enabled'
        );
    }
}
