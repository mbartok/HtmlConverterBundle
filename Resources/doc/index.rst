# Intro to HtmlConverterBundle

This bundle offers Symfony2 integration of the bicpi/HtmlConverter library.

## Installation

### Add on composer.json (see http://getcomposer.org/)

    "require" :  {
        // ...
        "bicpi/html-converter-bundle": "1.0.*@dev",
    }

### Register the bundle in your Kernel

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new bicpi\Bundle\HtmlConverterBundle\BicpiHtmlConverterBundle(),
    );
    // ...
}
```

### Configure the bundle (optional)

The bundle's default configuration is listed below. These defaults will be
used if you do not change the configuration.

    bicpi_html_converter:
        guesser_chain:
            - lynx
            - html2text
            - simple

## Using converters

You can use all the converters of the `HtmlConverter` library as services:

```php
$html = '... <h1>... you HTML content ...</h1> ...';

$lynxConverter = $this->container->get('bicpi.html_converter.lynx');
$plainByLxnx = $converter->convert($html);

$html2textConverter = $this->container->get('bicpi.html_converter.html2text');
$plainByHtml2Text = $converter->convert($html);

$simpleConverter = $this->container->get('bicpi.html_converter.simple');
$plainBySimple = $converter->convert($html);
```

You can use the "Guesser" converter which chains all available converters in a reasonable order. The guesser
converter is an implementation of the `ChainConverter`. The available converters are registered automatically
by configuration:

1. `lynx`
2. `html2text`
3. `simple`

```php
$html = '... <h1>... you HTML content ...</h1> ...';

$converter = $this->container->get('bicpi.html_converter.guesser');
$plain = $converter->convert($html);

Or you the service alias for convinience:

```php
$html = '... <h1>... you HTML content ...</h1> ...';

$converter = $this->container->get('bicpi.html_converter');
$plain = $converter->convert($html);

You can customize the guesser chain in your `config.yml`:

    bicpi_html_converter:
        guesser_chain:
            - lynx
            - simple

The above example only register the `LynxConverter` and the `SimpleConverter`.



