<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    controller.php
 * @author      Hans-Joachim Niemann
 * @date        19.03.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

/**
 * Pressearchiv Component Controller
 *
 * @package     Joomla.Site
 * @subpackage  Pressearchiv
 * @since       3.0
 */
class PressearchivController extends JControllerLegacy
{
	/**
	 * Method to display a view
	 *
	 * @param   boolean    If true, the view output will be cached
	 * @param   array      An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController   This object to support chaining.
	 * @since   3.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$cachable = true;

		// Set the default view name and format from the Request.
		$vName = $this->input->getCmd('view', 'Pressearchiv');
		$this->input->set('view', $vName);

		parent::display($cachable, $safeurlparams);

		return $this;
	}
}
