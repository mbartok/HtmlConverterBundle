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

//    /**
//     * @test
//     */
//    public function enabledConvertersShouldBeLoadedOnly()
//    {
//        $config = array(array(
//            'converter_chain' => array(
//                'simple' => false,
//                'html2text' => false,
//            )
//        ));
//        $container = new ContainerBuilder();
//        $loader = new BicpiHtmlConverterExtension();
//        $loader->load($config, $container);
//
//        $this->assertFalse(
//            $container->getDefinition('bicpi.html2text.converter.simple')->hasTag('bicpi.html2text.converter'),
//            'The html2text converter is tagged/enabled'
//        );
//        $this->assertFalse(
//            $container->getDefinition('bicpi.html2text.converter.html2text')->hasTag('bicpi.html2text.converter'),
//            'The html2text converter is tagged/enabled'
//        );
//        $this->assertTrue(
//            $container->getDefinition('bicpi.html2text.converter.lynx')->hasTag('bicpi.html2text.converter'),
//            'The html2text converter is tagged/enabled'
//        );
//    }
}
