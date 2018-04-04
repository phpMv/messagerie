<?php
return array(
		"siteUrl"=>"http://127.0.0.1/messagerie/",
		"database"=>[
				"type"=>"mysql",
				"dbName"=>"",
				"serverName"=>"127.0.0.1",
				"port"=>"3306",
				"user"=>"root",
				"password"=>"",
				"options"=>[],
				"cache"=>false
		],
		"sessionName"=>"messagerie",
		"templateEngine"=>'Ubiquity\views\engine\Twig',
		"templateEngineOptions"=>array("cache"=>false),
		"test"=>false,
		"debug"=>true,
		"di"=>["jquery"=>function($controller){
							$jquery=new \Ajax\php\ubiquity\JsUtils(["defer"=>true,"gc"=>true],$controller);
							$jquery->semantic(new \Ajax\Semantic());
							$jquery->setAjaxLoader("<div class=\"ui active centered inline text loader\">Loading</div>");
							return $jquery;
						}],
		"cache"=>["directory"=>"cache/","system"=>'Ubiquity\cache\system\ArrayCache',"params"=>['type'=>'Mongodb']],
		"mvcNS"=>["models"=>"models","controllers"=>"controllers","rest"=>"rest"],
		"isRest"=>function(){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
);
