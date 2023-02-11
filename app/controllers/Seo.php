<?php
namespace controllers;

use Ubiquity\controllers\seo\SeoController;

 /**
 * SEO Controller Seo
 **/
class Seo extends SeoController {

	public function __construct(){
		parent::__construct();
		$this->urlsKey="urls";
		$this->seoTemplateFilename="Seo/sitemap.xml.html";
	}
	
	 /**
	 * @route("Seo")
	 **/
	public function index(){
		return parent::index();
	}
}
