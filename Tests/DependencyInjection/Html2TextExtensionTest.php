<?php
namespace Knp\Bundle\MenuBundle\Tests\DependencyInjection;

use bicpi\Bundle\Html2TextBundle\DependencyInjection\Html2TextExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

class Html2TextExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function servicesShouldBeLoaded()
    {
        $container = new ContainerBuilder();
        $loader = new Html2TextExtension();
        $loader->load(array(array()), $container);

        $this->assertTrue($container->hasDefinition('bicpi.html2text'), 'The html2test service is loaded');
//        $this->assertTrue($container->hasDefinition('knp_menu.renderer.twig'), 'The twig renderer is loaded');
//        $this->assertEquals('knp_menu.html.twig', $container->getParameter('knp_menu.renderer.twig.template'));
//        $this->assertFalse($container->hasDefinition('knp_menu.templating.helper'), 'The PHP helper is not loaded');
//        $this->assertTrue($container->getDefinition('knp_menu.menu_provider.builder_alias')->hasTag('knp_menu.provider'), 'The BuilderAliasProvider is enabled');
//        $this->assertTrue($container->getDefinition('knp_menu.menu_provider.container_aware')->hasTag('knp_menu.provider'), 'The ContainerAwareProvider is enabled');
    }
}
