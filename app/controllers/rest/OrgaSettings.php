<?php
namespace controllers\rest;

use Ubiquity\controllers\rest\RestController;

/**
 * @route("/rest/orga/settings","automated"=>true)
 * @rest("resource"=>"models\Organizationsettings")
 */
class OrgaSettings extends RestController {

	/**
	 * Retourne la liste des Organizationsettings
	 * au format JSON
	 * @route("methods"=>["get","post"])
	 */
	public function index(){
		return parent::index();
	}

}
