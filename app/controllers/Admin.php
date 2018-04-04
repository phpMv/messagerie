<?php
namespace controllers;
use Ubiquity\controllers\admin\UbiquityMyAdminBaseController;
use controllers\admin\MyData;
use controllers\admin\MyViewer;
use Ubiquity\cache\database\DbCache;

/**
 * @author jc
 */
class Admin extends UbiquityMyAdminBaseController{

	public function __construct(){
		parent::__construct();
		//DbCache::$active=true;
	}
	/**
	 * @route("_default")
	 */
	public function index(){
		return parent::index();
	}
	protected function getUbiquityMyAdminData(){
		return new MyData();
	}

	protected function getUbiquityMyAdminViewer(){
		return new MyViewer($this);
	}
}

