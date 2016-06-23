<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected $_docRoot;

	protected function _initPath()
	{
		$this->_docRoot = realpath(APPLICATION_PATH . '/../');
		Zend_Registry::set('docRoot', $this->_docRoot);
	}

	protected function _initLoaderResource()
	{
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
				'basePath' => $this->_docRoot . '/application',
				'namespace' => 'Saffron'
			));
		$resourceLoader->addResourceTypes(array(
			'model' => array(
				'namespace' => 'Model',
				'path' => 'models'
			)
		));
	}

	protected function _initLog()
	{
		$writer = new Zend_Log_Writer_Stream(APPLICATION_PATH . '/../data/logs/error.log');
		return new Zend_Log($writer);
	}

	protected function _initView()
	{
		$view = new Zend_View();
		return $view;
	}

	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		//Doctype
		$view->Doctype('XHTML1_TRANSITIONAL');
		//Css
		$view->headLink()->prependStylesheet('../css/burger.min.css');
		$view->headLink()->prependStylesheet('../css/custom.css');
		$view->headLink()->prependStylesheet('../css/bootstrap.css');
		$view->headScript()->prependFile('../js/custom.js');
		$view->headScript()->prependFile('../js/bootstrap.min.js');
		$view->headLink()->prependStylesheet('../css/bootstrap-responsive.css');

		$view->headLink()->prependStylesheet('css/burger.min.css');
		$view->headLink()->prependStylesheet('css/custom.css');
		$view->headLink()->prependStylesheet('css/bootstrap.css');
		$view->headScript()->prependFile('js/custom.js');
		$view->headScript()->prependFile('js/bootstrap.min.js');
		$view->headLink()->prependStylesheet('css/bootstrap-responsive.css');

		$view->headScript()->prependFile('js/jquery.gmap-1.1.0-min.js');
		$view->headScript()->prependFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
		


		if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")) {
			$view->headScript()->prependFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
		} else {
			$view->headScript()->prependFile('js/jquery-2.1.3.min.js');
		}

	}

}