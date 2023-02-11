<?php
namespace models;


use Ubiquity\attributes\items\Id;

#[\AllowDynamicProperties]
class Feature {

	/**
	 *
	 * @id
	 * @column("name"=>"id","nullable"=>"","dbType"=>"int(11)")
	 */
	#[Id]
	private $id;

	/**
	 *
	 * @column("name"=>"title","nullable"=>"","dbType"=>"varchar(100)")
	 */
	private $title;

	/**
	 *
	 * @column("name"=>"label","nullable"=>"","dbType"=>"varchar(50)")
	 */
	private $label;

	/**
	 *
	 * @column("name"=>"content","nullable"=>"","dbType"=>"text")
	 */
	private $content;

	/**
	 *
	 * @column("name"=>"php","nullable"=>"","dbType"=>"text")
	 */
	private $php;

	/**
	 *
	 * @column("name"=>"icon","nullable"=>"","dbType"=>"varchar(50)")
	 */
	private $icon;

	/**
	 *
	 * @column("name"=>"sens","nullable"=>"","dbType"=>"tinyint(1)")
	 */
	private $sens;

	/**
	 *
	 * @column("name"=>"tabs","nullable"=>"","dbType"=>"tinyint(1)")
	 */
	private $tabs;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getLabel() {
		return $this->label;
	}

	public function setLabel($label) {
		$this->label = $label;
	}

	public function getContent() {
		return $this->content;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	public function getPhp() {
		return $this->php;
	}

	public function setPhp($php) {
		$this->php = $php;
	}

	public function getIcon() {
		return $this->icon;
	}

	public function setIcon($icon) {
		$this->icon = $icon;
	}

	public function getSens() {
		return $this->sens;
	}

	public function setSens($sens) {
		$this->sens = $sens;
	}

	public function getTabs() {
		return $this->tabs;
	}

	public function setTabs($tabs) {
		$this->tabs = $tabs;
	}

	public function __toString() {
		return $this->sens;
	}
}