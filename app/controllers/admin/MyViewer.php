<?php

namespace controllers\admin;

use Ubiquity\controllers\admin\UbiquityMyAdminViewer;
use models;

class MyViewer extends UbiquityMyAdminViewer {
	public function getForm($identifier, $instance){
		$retour=parent::getForm($identifier, $instance);
		if($instance instanceof models\User){
			$retour->fieldAsInput("password", ["inputType"=>"password"]);
			//$retour->fieldAsInput("email",["inputType"=>"email","rules"=>["email"]]);
			//$retour->setValidationParams(["on"=>"blur","inline"=>true]);
		}
		return $retour;
	}

	public function getFkHeaderElement($member, $className, $object){
		$retour=parent::getFkHeaderElement($member, $className, $object);
		$retour->addIcon("file text");
		return $retour;
	}

	public function getFkHeaderList($member, $className, $list){
		$retour=parent::getFkHeaderList($member, $className, $list);
		$retour->addIcon("folder");
		return $retour;
	}
}