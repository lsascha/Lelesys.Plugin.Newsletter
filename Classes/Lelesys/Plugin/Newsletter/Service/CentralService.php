<?php
namespace Lelesys\Plugin\Newsletter\Service;

/*
 * This script belongs to the package "Lelesys.Plugin.Newsletter".         *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;

/**
 * Central Service
 *
 * @Flow\Scope("singleton")
 */
class CentralService {

	/**
	 * Settings
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * Injects settings
	 *
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Inject translator
	 *
	 * @Flow\Inject
	 * @var \TYPO3\Flow\I18n\Translator
	 */
	protected $translator;

	/**
	 * Returns translated text for given label
	 *
	 * @param string $label Label
	 * @return string Translated string
	 */
	public function translate($label) {
		return $this->translator->translateById($label, array(), NULL, NULL, 'Main', $this->settings['flashMessage']['packageKey']);
	}


	/**
	 * csv to array
	 *
	 * @param string $string csv string
	 * @param string $row_delimiter row delimiter
	 * @param string $delimiter delimiter
	 * @param string $enclosure string enclosure
	 * @param string $escape escape string
	 * @return array
	 */
	public function csv_to_array($string='', $row_delimiter=PHP_EOL, $delimiter = "," , $enclosure = '"' , $escape = "\\" )
	{
	    $rows = array_filter(explode($row_delimiter, $string));
	    $header = NULL;
	    $data = array();

	    foreach($rows as $row)
	    {
	        $row = str_getcsv ($row, $delimiter, $enclosure , $escape);

	        if(!$header)
	            $header = $row;
	        else
	            $data[] = array_combine($header, $row);
	    }

	    return $data;
	}

}
?>