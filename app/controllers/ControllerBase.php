<?php
namespace controllers;
use Ubiquity\utils\http\URequest;
use Ajax\JsUtils;
 /**
 * ControllerBase
 * @property JsUtils $jquery
 **/
abstract class ControllerBase extends \Ubiquity\controllers\ControllerBase{

	public function initialize(){
		if(!URequest::isAjax()){
			$this->loadView("main/vHeader.html");
		}
	}

	public function finalize(){
		if(!URequest::isAjax()){
			$this->loadView("main/vFooter.html");
		}
	}
}
