<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    pressearchiv.php
 * @author      Hans-Joachim Niemann
 * @date        19.03.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Pressearchiv');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
