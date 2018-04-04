<?php

namespace controllers\admin;

use Ubiquity\utils\base\UArray;
use Ubiquity\orm\DAO;
use Ubiquity\controllers\admin\UbiquityMyAdminData;

class MyData extends UbiquityMyAdminData {
	public function getTableNames(){
		return ["Organization","Groupe","User","Settings","Organizationsettings"];
	}

	public function getFieldNames($model){
		$retour=parent::getFieldNames($model);
		return UArray::remove($retour, ["id","email","suspended","password"]);
	}


	public function getFormFieldNames($model){
		$retour=parent::getFormFieldNames($model);
		return $retour;
	}

	public function getManyToManyDatas($fkClass, $instance, $member){
		if($fkClass=="models\User"){
			if($instance->getOrganization()!=null){
				$orgaId=$instance->getOrganization()->getId();
				return DAO::getAll($fkClass,"idOrganization=".$orgaId);
			}
		}
		if($fkClass=="models\Groupe"){
			if($instance->getOrganization()!=null){
				$orgaId=$instance->getOrganization()->getId();
				return DAO::getAll($fkClass,"idOrganization=".$orgaId);
			}
		}
		return DAO::getAll($fkClass);
	}
}