<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    view.html.php
 * @author      Niemann
 * @date        19.06.2014
 *
 * @copyright   Copyright (C) 2011 - 2014 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

class PressearchivViewConfiguration extends JViewLegacy
{
	public function display($tpl = null)
	{
		JHTML::_('behavior.tooltip');

		// Check for errors
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));

			return false;
		}

		PressearchivHelper::addSubmenu('configuration');

		$this->addToolBar();

		parent::display($tpl);
	}

	protected function addToolBar()
	{
		$canDo = PressearchivHelper::getActions();
		JToolBarHelper::title(JText::_('COM_PRESSEARCHIV') . ': ' . JText::_('COM_PRESSEARCHIV_KONFIGURATION'), 'wrench');

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_pressearchiv');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('screen.pressearchiv', true);
	}
}
