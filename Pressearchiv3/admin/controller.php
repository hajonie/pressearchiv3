<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    controller.php
 * @author      Hans-Joachim Niemann
 * @date        06.02.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Pressearchiv Master Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_pressearchiv
 * @since       3.0
 */
class PressearchivController extends JControllerLegacy
{
	protected $default_view = 'cpanel';
	
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			$cachable	If true, the view output will be cached
	 * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	3.0
	 */
	
	public function display($cachable = false, $urlparams = false)
	{
		$view   = $this->input->get('view', 'cpanel');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('id');

		// Check for edit form.
		if ($view == 'article' && $layout == 'edit' && !$this->checkEditId('com_pressearchiv.edit.article', $id))
		{
		
			// Somehow the person just went to the form - we don't allow that.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_pressearchiv&view=articles', false));
		
			return false;
		}
		elseif ($view == 'source' && $layout == 'edit' && !$this->checkEditId('com_pressearchiv.edit.source', $id))
		{
		
			// Somehow the person just went to the form - we don't allow that.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_pressearchiv&view=sources', false));
		
			return false;
		}
		
		parent::display();

		return $this;
	}
}