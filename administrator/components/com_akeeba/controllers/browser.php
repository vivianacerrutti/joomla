<?php
/**
 * @package AkeebaBackup
 * @copyright Copyright (c)2009-2013 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 *
 * @since 2.2
 */

// Protect from unauthorized access
defined('_JEXEC') or die();

/**
 * Folder bowser controller
 *
 */
class AkeebaControllerBrowser extends AkeebaControllerDefault
{
	public function display($cachable = false, $urlparams = false)
	{
		$folder = FOFInput::getString('folder', '', $this->input);
		$processfolder = FOFInput::getInt('processfolder', 0, $this->input);
		
		$model = $this->getThisModel();
		$model->setState('folder', $folder);
		$model->setState('processfolder', $processfolder);
		$model->makeListing();
		
		parent::display();
		
		/*
		@ob_end_flush();
		flush();
		JFactory::getApplication()->close();
		*/
	}
}