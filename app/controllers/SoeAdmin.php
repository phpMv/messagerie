<?php
namespace controllers;

use Ubiquity\controllers\seo\SeoController;

 /**
 * SEO Controller SoeAdmin
 **/
class SoeAdmin extends SeoController {

	public function __construct(){
		parent::__construct();
		$this->urlsKey="urlsAdmin";
		$this->seoTemplateFilename="Seo/sitemap.xml.html";
	}
	
	 /**
	 * @route("soeAdmin/test")
	 **/
	public function index(){
		return parent::index();
	}
}
