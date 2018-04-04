<?php
namespace controllers;
 /**
 * Controller Zuba
 **/
class Zuba extends ControllerBase{

	public function index(){
		$this->loadView("Zuba/index.html");
	}

	/**
	 *@route("Zuba/test","methods"=>["get","post"])
	**/
	public function test(){

	}

	/**
	 * @route("oo/{id}/{id2}/{optParam}","name"=>"Zuba_oo")
	 */
	public function oo($id,$id2,$optParam="option1"){
		echo "oo:{$id}";
	}


	public function hello(){
		echo "hello";
	}


	public function hellox(){
		echo "hellox";
	}


	public function gitTest(){
		$this->loadView('Zuba/gitTest.html');
	}


	/**
	 *@route("/autre","methods"=>["get"])
	**/
	public function autre(){
		$this->loadView('Zuba/autre.html');
	}

}
