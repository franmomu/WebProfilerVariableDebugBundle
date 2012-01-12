<?php 
namespace FranMoreno\WebProfilerVariableDebugBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FranMoreno\WebProfilerVariableDebugBundle\Logger\VariableDebugLogger;

class VariableDebugDataCollector extends DataCollector 
{

	public function collect(Request $request, Response $response, \Exception $exception = null) 
	{
		$this->data = array(				
				'debug' => $request->attributes->get('debug')
		);
	}

	public function getDebug() 
	{
		return $this->data['debug'];
	}

	public function countVariables() 
	{
		return count($this->data['debug']);
	}

	public function getName() 
	{
		return 'debug';
	}
}