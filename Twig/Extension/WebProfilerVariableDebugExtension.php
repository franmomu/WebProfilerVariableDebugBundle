<?php

namespace FranMoreno\WebProfilerVariableDebugBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;


class WebProfilerVariableDebugExtension extends \Twig_Extension
{
    private $container; 
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    public function getContainer()
    {
        return $this->container;
    }
    
    public function getFilters() {
        return array(
            'profiler_debug'  => new \Twig_Filter_Method($this, 'profiler_debug')
        );
    }
  
    public function profiler_debug($var) 
    {        
        $request = $this->getContainer()->get('request');
        $debug = $request->attributes->has('debug')?$request->attributes->get('debug'):array();
        $debug[] = $var;
        $request->attributes->add(array('debug' => $debug));
     
        return $var;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'web_profiler_variable_debug_extension';
    }
    
    
}
