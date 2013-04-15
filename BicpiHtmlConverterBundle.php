<?php

namespace bicpi\Bundle\HtmlConverterBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use bicpi\Bundle\HtmlConverterBundle\DependencyInjection\Compiler\ConverterPass;

class BicpiHtmlConverterBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        #$container->addCompilerPass(new ConverterPass());
    }
}
