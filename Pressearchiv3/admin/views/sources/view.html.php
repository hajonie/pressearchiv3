<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    view.html.php
 * @author      Niemann
 * @date        18.06.2014
 *
 * @copyright   Copyright (C) 2011 - 2014 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

define('_JEXEC') or die;

class PressearchivViewSources extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	
	public function display($tpl = null)
	{
		$this->items         = $this->get('Items');
		$this->pagination    = $this->get('Pagination');
		$this->state         = $this->get('State');
		$this->filterForm    = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
		
		//Check for errors
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			
			return false;
		}
		
		PressearchivHelper::addSubmenu('sources');
		
		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT . '/helpers/pressearchiv.php';
		
		$canDo = JHelperContent::getActions('com_pressearchiv');
		
		JToolbarHelper::title(JText::_('COM_PRESSEARCHIV_SOURCES_TITLE'), 'pictures');
		
		if ($canDo->get('core.create'))
		{
			JToolbarHelper::addNew('source.add');
		}
		
		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('source.edit');
		}
		
		if ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('sources.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('sources.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('sources.archive');
			JToolbarHelper::checkin('sources.checkin');
		}
		
		if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'sources.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('sources.trash');
		}
		
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_pressearchiv');
		}
		
		JToolbarHelper::help('JHELP_COMPONENTS_PRESSEARCHIV_SOURCES');
	}
	
	protected function getSortFields()
	{
		return array
		(
				'a.status' => JText::_('JSTATUS'),
				'a.name' => JText::_('COM_PRESSEARCHIV_HEADING_SOURCE'),
				'contact' => JText::_('COM_PRESSEARCHIV_HEADING_CONTACT'),
				'source_name' => JText::_('COM_PRESSEARCHIV_HEADING_SOURCE'),
				'nsources' => JText::_('COM_PRESSEARCHIV_HEADING_ACTIVE'),
				'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}