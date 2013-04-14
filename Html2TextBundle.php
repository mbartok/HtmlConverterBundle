<?php

namespace bicpi\Bundle\Html2TextBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use bicpi\Bundle\Html2TextBundle\DependencyInjection\Compiler\ConverterPass;

class Html2TextBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ConverterPass());
    }
}
