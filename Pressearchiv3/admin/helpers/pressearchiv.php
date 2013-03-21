<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    pressearchivs.php
 * @author      Hans-Joachim Niemann
 * @date        19.03.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

/**
 * Pressearchivs helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_pressearchivs
 * @since       1.6
 */
class PressearchivsHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string	The name of the active view.
	 * @since   1.6
	 */
	public static function addSubmenu($vName = 'pressearchivs')
	{
		JHtmlSidebar::addEntry(
		JText::_('COM_PRESSEARCHIVS_SUBMENU_PRESSEARCHIVS'),
		'index.php?option=com_pressearchivs&view=pressearchivs',
		$vName == 'pressearchivs'
				);
				JHtmlSidebar::addEntry(
				JText::_('COM_PRESSEARCHIVS_SUBMENU_CATEGORIES'),
				'index.php?option=com_categories&extension=com_pressearchivs',
				$vName == 'categories'
						);
						if ($vName == 'categories')
						{
							JToolbarHelper::title(
							JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_pressearchivs')),
							'pressearchivs-categories');
						}
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   integer  The category ID.
	 * @return  JObject
	 * @since   1.6
	 */
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_pressearchivs';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_pressearchivs.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_pressearchivs', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
