<?php
namespace controllers;
 use Ubiquity\utils\http\URequest;
use Ubiquity\orm\DAO;
use Ubiquity\utils\yuml\Yuml;
use Ubiquity\utils\yuml\ClassToYuml;
use Ubiquity\orm\creator\yuml\YumlParser;

 /**
 * Controller Test
 **/
class Test extends ControllerBase{

	public function index(){}

	public function test($value,$autre="zzza"){
		echo "value:".$value."<br>autre:".$autre;
	}

	/**
	 * @route("/connect/{force}/")
	 */
	public function connect($force){
		if(URequest::isPost()){
			$user=DAO::getOne("models\User", "email='".$_POST["email"]."'");
			if(isset($user)){
				if($user->getPassword()===$_POST["password"])
					echo "User ok";
				else echo "bad password";
			}else{
				echo "L'email ".$_POST["email"]." n'existe pas";
			}
		}
		\var_dump($force);
	}

	public function connect2(){
		if(URequest::isPost()){
			$user=DAO::getOne("models\User", "email='".$_POST["email"]."'");
			if(isset($user)){
				if($user->getPassword()===$_POST["password"])
					echo "User ok";
					else echo "bad password";
			}else{
				echo "L'email ".$_POST["email"]." n'existe pas";
			}
		}
		\var_dump($_POST);
	}

	public function generate(){
		//$table=new Table("models\User");
		//\var_dump($table->generateSQL());
	}

	/*public function yuml($model,$type="plain"){
		$yuml=new ClassToYuml("models\\".$model);
		echo "<img src='http://yuml.me/diagram/".$type."/class/".$yuml."'>";
	}*/

	public function multiple(...$vars){
		\var_dump($vars);
	}

	public function scanMultiple(){
		$method=new \ReflectionMethod($this,"multiple");
		$params=$method->getParameters();
		$param=$params[0];
		echo $param->isVariadic();
	}
	public function match(){

		preg_match_all('@\{(\.\.\.)?(.+?)\}@s', "/test/", $matches1);
		\print_r($matches1[2]);
		echo "<br>";
		preg_match_all('@\{(\.\.\.)?(.+?)\}@s', "/test/{id}/{...name}", $matches2);
		\print_r($matches2[1]);
		echo "<br>";
		preg_match_all('@\{(\.\.\.)?(.+?)\}@s', "/test/{id}/{name}", $matches3);
		\print_r($matches3[2]);
	}

	public function jsonDataTable(){
		$semantic=$this->jquery->semantic();
		$dt=$semantic->jsonDataTable("jdt1-1","models\\User",[]);
		$dt->setIdentifierFunction("getId");
		$dt->setCaptions(["id","Prénom","Nom"]);
		$dt->setFields(["id","firstname","lastname"]);
		$dt->fieldAsInput(1);
		$bts=$semantic->htmlButtonGroups("bts",["Load Users","Reset data"]);
		$dt->jsonArrayOnClick($bts->getItem(0),"rest/users","get","{}","data=data.datas;",["attr"=>""]);
		$dt->clearOnClick($bts->getItem(1));
		echo $dt;
		echo $bts;
		echo $this->jquery->compile($this->view);
	}

	public function yuml(){
		$yuml=new YumlParser("[Test|«pk» id:int(11);name:varchar(11)],[Test2|«pk» id:int(11);name:varchar(11)],[Test]0..*-0..*[Test2],[Groupe|-«pk» id:int(11);-name:varchar(65);-email:varchar(255);-aliases:mediumtext;-organization:;-users:mixed],[Organization|-«pk» id:int(11);-name:varchar(100);-domain:varchar(255);-aliases:text;-groupes:mixed;-organizationsettingss:mixed;-users:mixed],[Organizationsettings|-«pk» idSettings:int(11);-«pk» idOrganization:int(11);-value:varchar(100);-organization:;-settings:],[Settings|-«pk» id:int(11);-name:varchar(45);-organizationsettingss:mixed],[User|-«pk» id:int(11);-firstname:varchar(65);-lastname:varchar(65);-email:varchar(255);-password:varchar(255);-suspended:tinyint(1);-organization:;-groupes:mixed],[Organization]1-0..*[Groupe],[Organization]1-0..*[Organizationsettings],[Organization]1-0..*[User],[Settings]1-0..*[Organizationsettings]");
		//\var_dump($yuml->getParts());
		\var_dump($yuml->getTables());
	}
}