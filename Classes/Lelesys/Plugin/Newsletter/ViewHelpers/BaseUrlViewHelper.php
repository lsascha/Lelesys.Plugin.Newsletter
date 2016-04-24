<?php
namespace Lelesys\Plugin\Newsletter\ViewHelpers;

use TYPO3\Flow\Annotations as Flow;

/**
 * A view helper to display Base Url
 *
 * @Flow\scope("prototype")
 */
class BaseUrlViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

	
	/**
	 * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
	 * @see AbstractViewHelper::isOutputEscapingEnabled()
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;

	/**
	 * Settings
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * Inject settings
	 *
	 * @param array $settings Settings Array
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Shows the base uri from settings
	 *
	 * @return string
	 */
	public function render() {
		$baseUrl = $this->settings['email']['baseUrl'];
		return $baseUrl;
	}

}
?>