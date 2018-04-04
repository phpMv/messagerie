<?php
namespace controllers;
 use Ubiquity\annotations\parser\DocParser;
use Ubiquity\orm\DAO;
use Ubiquity\orm\reverse\DatabaseReversor;
use Ubiquity\db\reverse\DbGenerator;
use Ajax\php\ubiquity\JsUtils;
use Ajax\semantic\html\elements\HtmlButton;

 /**
 * Controller Main
 * @route("/zz")
 * @property JsUtils $jquery
 **/
class Main extends ControllerBase{

	/**
	 * @route("index","methods"=>["get","post"])
	 */
	public function index(){
		$semantic=$this->jquery->semantic();
		$semantic->htmlHeader("header",1,"Micro framework");
		$bt=$semantic->htmlButton("btTest","Semantic-UI Button");
		$bt->onClick("$('#test').html('It works with Semantic-UI too !');");
		$this->jquery->compile($this->view);
		$this->loadView("index.html");
		\var_dump($_POST);
		var_dump(apcu_cache_info());
	}

	/**
	 * @route("test/{name}/{id}","cache"=>true,"duration"=>5)
	 */
	public function test($id,$name){
		echo "id : ".$id.", name: ".$name;
	}

	/**
	 * @route("autre","cache"=>true,"duration"=>20)
	 */
	public function autre(){
		echo "autre2";
		$reflect=new \ReflectionClass($this);
		$doc=new DocParser($reflect->getDocComment());
		$doc->parse();
		\var_dump($doc->getPart("property"));
	}

	/**
	 *@route("tmp/{page}","methods"=>["get"])
	**/
	public function tmp($page){
		echo $page;
	}

	public function oneToMany(){
		$orgas=DAO::getAll("models\Organization","",true,true);
		\var_dump($orgas[0]->getUsers());
	}

	public function testDt(){
		$orgas=DAO::getAll("models\Organization","",true,true);
		$dt=$this->jquery->semantic()->dataTable("dtTest", "models\Organization", $orgas);
		$dt->setFields(["name","domain","users"]);
		$dt->setValueFunction("users", function($v,$instance,$field,$index){ return $index;});
		$dt->fieldAsInput("domain",["class"=>"fluid","jsCallback"=>function($elm,$instance,$index,$rowIndex){$elm->addAction($rowIndex);}]);
		$dt->addEditButton(false,[],function($bt,$instance){$bt->addContent($instance->getName());});
		echo $dt;
		echo $this->jquery->compile($this->view);
	}

	public function createDatabase(){
		$db=new DatabaseReversor(new DbGenerator());
		$db->createDatabase("messagerie");
		$frm=$this->jquery->semantic()->htmlForm("frm");
		$frm->addTextarea("sql", "Script",$db->__toString());
		echo $frm;
	}


	/**
	 *@route("drag")
	**/
	public function dragAndDrop(){
		$bt=$this->jquery->semantic()->htmlButton("bt","draggable");
		$seg2=$this->jquery->semantic()->htmlSegment("segment1",new HtmlButton("bt2","bt2"));
		$bt->setDraggable();
		$seg2=$this->jquery->semantic()->htmlSegment("segment2",new HtmlButton("bt3","bt3"));
		$this->jquery->asDropZone(".ui.segment",'alert(data);',["jqueryDone"=>"html"]);
		$this->jquery->renderView('main/dragAndDrop.html');

	}

}
