<?php
namespace controllers;
 /**
 * Controller Users
 **/
class Users extends ControllerBase{

	public function index(){
		$this->loadview("Users/index.html");
	}

	/**
	 *@route("Users/all/{criteria}","methods"=>["get"],"cache"=>true,"duration"=>3000)
	**/
	public function all($criteria){
		
	}


	public function test($page,$name="bob"){
		var_dump($_GET);
	}

}
