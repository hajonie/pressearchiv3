<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    view.html.php
 * @author      Hans-Joachim Niemann
 * @date        21.03.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

/**
 * Pressearchiv view class for CPanel.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_pressearchiv
 * @since       3.0
 */
class PressearchivViewCPanel extends JViewLegacy
{
	protected $state;
	
	/**
	 * Display the Pressearchiv CPanel View
	 *
	 * @param   string  $tpl  The special template name (default null)
	 *
	 * @return void
	 */
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		
		JHTML::_('behavior.tooltip');
		JHTML::stylesheet(JUri::root() . 'media/com_pressearchiv/css/pressearchiv.css');

		PressearchivHelper::addSubmenu('pressearchiv');
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));
			return false;
		}

		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the pagetitle and toolbar.
	 *
	 * @return void
	 *
	 * @since	3.0
	 */
	protected function addToolBar()
	{
		require_once JPATH_COMPONENT.'/helpers/pressearchiv.php';
		
		$state	= $this->get('State');

		JToolBarHelper::title(JText::_('COM_PRESSEARCHIV_CPANEL_TITLE'), 'pressearchiv.png');

		JHtmlSidebar::addFilter(
		JText::_('JOPTION_SELECT_CATEGORY'),
		'filter_category_id',
		JHtml::_('select.options', JHtml::_('category.options', 'com_pressearchiv'), 'value', 'text', $this->state->get('filter.category_id'))
		);
	}
}