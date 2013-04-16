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
 * @subpackage  com_pressearchiv
 * @since       3.0
 */
class PressearchivHelper
{
	public static $extension = 'com_pressearchiv';

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   integer  $pressearchivId  The Press Archiv ID.
	 * @return  JObject
	 * @since   1.6
	 */
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_pressearchiv';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_pressearchiv.category.' . (int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_pressearchiv', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}

	/**
	 * Method to generate icons like in the Control Panel
	 * originally by Jan Pavelka (Phoca.cz)
	 *
	 * @param   string  $link   the target
	 * @param   string  $image  the image name releative to assets folder
	 * @param   string  $text   the text to display
	 *
	 * @return  object
	 */
	public static function quickIconButton($link, $image, $text)
	{
		$imgUrl = 'media/com_pressearchiv/images/assets/' . $image;
		$code	= '<div class="thumbnails pressearchiv-icon">'
				. '<a class="thumbnail pressearchiv-icon-inside" href="' . $link . '">'
						. JHTML::_('image', $imgUrl, $text)
						. '<br /><span>' . $text . '</span></a></div>' . "\n";

		return $code;
	}

	/**
	 * Get Links
	 *
	 * @return null
	 */
	public static function getLinks()
	{
		return null;
	}

	/**
	 * Method to get the version of the installed press archiv.
	 *
	 * @author	hajonie
	 * @since	3.0
	 * @return	string	The version of the installed imprint.
	 */
	public static function getVersion()
	{
		$db = JFactory::getDbo();
		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_pressearchiv"');
		$manifest = json_decode( $db->loadResult(), true );
		return $manifest['version'];
	}

	/**
	 * Configure the Linkbar
	 *
	 * @param   string     $vName    The current view name
	 *
	 * @return  void
	 * @since   3.0
	 */
	public static function addSubmenu($vName = 'pressearchiv')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_PRESSEARCHIV_SUBMENU_CP'),
			'index.php?option=com_pressearchiv&view=cpanel',
			$vName == 'cpanel'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_PRESSEARCHIV_SUBMENU_ARTIKEL'),
			'index.php?option=com_pressearchiv&view=pressearchivs',
			$vName == 'pressearchivs'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_PRESSEARCHIV_SUBMENU_KATEGORIEN'),
			'index.php?option=com_pressearchiv&view=categories',
			$vName == 'categories'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_PRESSEARCHIV_SUBMENU_QUELLEN'),
			'index.php?option=com_pressearchiv&view=sources',
			$vName == 'sources'
		);
		
		if ($vName == 'categories')
		{
			JToolbarHelper::title(
			JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_pressearchiv')),
			'pressearchiv-categories');
		}
	}
}
