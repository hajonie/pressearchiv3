<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    default.php
 * @author      Niemann
 * @date        19.06.2014
 *
 * @copyright   Copyright (C) 2011 - 2014 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;
?>

<form action="index.php" method="post" name="adminForm">
	<div id="j-sidebar-container" class="span2"><?php echo JHtmlSidebar::render(); ?></div>
	<div id="j-main-container" class="span10">
		<div class="adminform">
			<div class="pressearchiv-cpanel-left">
				<div id="cpanel">
					<h3><?php echo JText::_('JHELP');?></h3>
					<p>
						<a href="https://github.com/hajonie/pressearchiv3" target="_blank">
							<?php echo JText::_('COM_PRESSEARCHIV') . ' - ' . JText::_('COM_PRESSEARCHIV_HOME');?>
						</a>
					</p>				
				</div>
			</div>
		</div>
	</div>
</form>