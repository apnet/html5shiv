Html5Shiv Asset Importer
========================

Installation
------------

Add requirements to composer.json:

``` json
{
  "require" : {
    "apnet/html5shiv" : "~3.7,<4.0"
  }
}
```

Configurations
--------------

Register `ApnetAsseticImporterBundle` bundle in the `AppKernel.php` file

``` php
// ...other bundles ...
$bundles[] = new Apnet\AsseticImporterBundle\ApnetAsseticImporterBundle();
```

Add Html5Shiv importer to services.yml

``` yml
services:
    apnet.assetic.importer.html5shiv:
        parent: assetic.importer_path
        arguments:
            - %kernel.root_dir%/../vendor/apnet/html5shiv/app/Resources/assets/dist
            - html5shiv
        tags:
            - { name: apnet.assetic.config_mapper }
```

Twig
----

To include Html5Shiv into Twig template use **imported_asset** function:

``` html
<!--[if lt IE 9]><script src="{{ imported_asset('html5shiv/html5shiv.min.js') }}"></script><![endif]-->
```

or/and

``` html
<!--[if lt IE 9]><script src="{{ imported_asset('html5shiv/html5shiv-print.min.js') }}"></script><![endif]-->
```
