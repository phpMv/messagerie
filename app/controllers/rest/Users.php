<?php
namespace controllers\rest;

use Ubiquity\controllers\rest\RestController;

/**
 * @route("/rest/users","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\\User")
 */
class Users extends RestController {

}
