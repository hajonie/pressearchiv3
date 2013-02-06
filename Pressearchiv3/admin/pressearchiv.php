<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    pressearchiv.php
 * @author      Hans-Joachim Niemann
 * @date        06.02.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

// Access check to the component itself
if (!JFactory::getUser()->authorise('core.manage', 'com_pressearchiv'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Required helper file
JLoader::register('PressearchivHelper', __DIR__ . '/helpers/pressearchiv.php');

// Get an instance of the controller prefixed by Pressearchiv
$controller = JControllerLegacy::getInstance('Pressearchiv');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();
