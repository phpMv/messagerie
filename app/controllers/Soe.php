<?php
namespace controllers;

use Ubiquity\controllers\seo\SeoController;

 /**
 * SEO Controller Soe
 **/
class Soe extends SeoController {

	public function __construct(){
		parent::__construct();
		$this->urlsKey="urls";
		$this->seoTemplateFilename="Seo/sitemap.xml.html";
	}

	public function index(){
		return parent::index();
	}
}
