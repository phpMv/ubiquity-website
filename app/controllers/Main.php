<?php
namespace controllers;

use Ubiquity\attributes\items\router\Get;
use Ubiquity\orm\DAO;
use Ubiquity\utils\base\UString;
use Ajax\semantic\html\elements\HtmlHeader;
use Ajax\semantic\html\elements\HtmlSegment;
use Ajax\semantic\html\elements\HtmlLabel;
use Ubiquity\utils\http\URequest;
use Ubiquity\themes\ThemesManager;

/**
 * Controller Main
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class Main extends ControllerBase {

	private $mobile = false;

	/**
	 *
	 * @get("_default")
	 */
	#[Get("_default")]
	public function index() {
		$this->jquery->exec("Prism.highlightAll();", true);
		$this->jquery->exec("\$('.item.index').addClass('active');\$('.item.features').removeClass('active');", true);
		$this->jquery->compile($this->view);
		$this->loadView("@activeTheme/index.html");
	}

	public function features() {
		$features = DAO::getAll("models\Feature");
		$result = [];

		foreach ($features as $feature) {
			$php = $feature->getPhp();
			if (UString::isNotNull($php)) {
				if (! $feature->getTabs() && ! UString::startswith($php, "<pre>"))
					$php = "<pre><code class=\"language-php\">{$php}</code></pre>";
			}
			$segment = new HtmlSegment("seg-" . $feature->getId(), "<div class='container text justified'>" . $feature->getContent() . "</div>");
			$title = $feature->getTitle();
			if (isset($title)) {
				$title = new HtmlHeader("", 3, $title);
				$segment->addContent($title, true);
			}
			$label = $feature->getLabel();
			if (isset($label)) {
				$ribbon = HtmlLabel::ribbon("rib-" . $feature->getId(), $label, ($feature->getSens()) ? "right" : "left");
				$ribbon->addIcon($feature->getIcon());
				$ribbon->setSize("large");
				$segment->addContent($ribbon, true);
			}
			if ($feature->getSens() || $this->mobile) {
				$result[] = [
					"left" => $segment,
					"right" => $php
				];
			} else {
				$result[] = [
					"left" => $php,
					"right" => $segment
				];
			}
		}
		$this->jquery->exec("Prism.highlightAll();\$('.item.index').removeClass('active');\$('.item.features').addClass('active');\$('.menu .item').tab();", true);
		$this->jquery->renderView("@activeTheme/feature.html", [
			"elements" => $result
		]);
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \controllers\ControllerBase::initialize()
	 */
	public function initialize() {
		$mb = new \Mobile_Detect();
		$this->mobile = $mb->isMobile();
		if ($this->mobile) {
			ThemesManager::setActiveTheme('mobile');
		}
		parent::initialize();
		if (! URequest::isAjax()) {
			$this->jquery->getOnClick(".features", "Main/features", "#main-content", [
				"ajaxTransition" => "fade",
				"hasLoader" => false
			]);
			$this->jquery->getOnClick(".index", "Main/index", "#main-content", [
				"ajaxTransition" => "fade",
				"hasLoader" => false
			]);
			$this->jquery->exec("$('#menu-sticky').stickMe({topOffset: 100});", true);
			$this->jquery->exec("$('#menu-sticky').on('sticky-begin', function() { $('#big-header').hide();$('#small-header').fadeIn();});", true);
			$this->jquery->exec("$('#menu-sticky').on('top-reached', function() { $('#small-header').hide();$('#big-header').fadeIn();});", true);
			$this->jquery->exec("$('#toToast').toast({position: 'bottom right', displayTime:0, closeIcon: true, onVisible:function(){\$(this).find('.toasted').show();}});", true);
		}
	}
}