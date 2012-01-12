My first bundle, this bundles provides a way to debug data with the Ladybug Library (with a few css modifications), with this bundle you attach the variables to debug to the request and this variables are displayed in the web profiler.


Installation
============

### Add this bundle to your deps:

```
[Ladybug]
    git=http://github.com/franmomu/Ladybug.git
    target=ladybug

[WebProfileVariableDebugBundle]        
    git=http://github.com/franmomu/WebProfileVariableDebugBundle.git
    target=bundles/FranMoreno/WebProfileVariableDebugBundle
```
### Configure the autoloader

Add the following entries to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...

    'Ladybug'           => __DIR__.'/../vendor/ladybug/lib',
    'FranMoreno'        => __DIR__.'/../vendor/bundles',
));
```

### Add this bundle to your application's kernel:
``` php
<?php
    // app/AppKernel.php
    public function registerBundles()
    {
        if ($this->isDebug()) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new FranMoreno\WebProfilerVariableDebugBundle\WebProfilerVariableDebugBundle();
        }
    }
```

### Run the vendors script
``` bash
php bin/vendors update
```

Usage
============

In a controller or class with access to the container

``` php
<?php

$request = $this->getContainer()->get('request');
$debug = $request->attributes->has('debug')?$request->attributes->get('debug'):array();
$debug[] = $var;
$request->attributes->add(array('debug' => $debug));
```

In a template:
```
{{ var | profiler_debug }}
```

Finally the variables will be displayed in the profiler with the ladybug extension.
        