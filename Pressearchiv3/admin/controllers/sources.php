<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    sources.php
 * @author      Niemann
 * @date        18.06.2014
 *
 * @copyright   Copyright (C) 2011 - 2014 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

class PressearchivControllerSources extends JControllerAdmin
{
	/**
	 * @var     string  The prefix to use with controller messages.
	 *
	 * @since   1.6
	 */
	protected $text_prefix = 'COM_PRESSEARCHIV_SOURCES';

	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.6
	 */
	public function getModel($name = 'Source', $prefix = 'PressearchivModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}
