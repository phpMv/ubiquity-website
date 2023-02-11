<?php
return array(
	"siteUrl" => "https://ubiquity.kobject.net/",
	"database" => [
		"type" => "mysql",
		"dbName" => "ubiquity-website",
		"serverName" => "127.0.0.1",
		"port" => "3306",
		"user" => "root",
		"password" => "",
		"cache" => false,
		"options" => []
	],
	"sessionName" => "ubi_site",
	"namespaces" => [],
	"templateEngine" => 'Ubiquity\\views\\engine\\twig\\Twig',
	"templateEngineOptions" => array(
		"cache" => false
	),
	"test" => false,
	"debug" => false,
	"di"=>[
		"@exec"=>[
			"jquery"=>function ($controller){
				return \Ajax\php\ubiquity\JsUtils::diSemantic($controller);
			}
		]
	],
	"cache" => [
		"directory" => "cache/",
		"system" => "Ubiquity\\cache\\system\\ArrayCache",
		"params" => []
	],
	"mvcNS" => [
		"models" => "models",
		"controllers" => "controllers",
		"rest" => "rest"
	]
);
