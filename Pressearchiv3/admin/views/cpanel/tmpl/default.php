<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    default.php
 * @author      Hans-Joachim Niemann
 * @date        21.03.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
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
					<?php
					$link = 'index.php?option=com_pressearchiv&amp;view=pressearchivs';
					echo PressearchivHelper::quickIconButton($link, '48px/icon-48-home.png', JText::_('COM_PRESSEARCHIV_ARTICLES'));

					$link = 'index.php?option=com_pressearchiv&amp;view=sources';
					echo PressearchivHelper::quickIconButton($link, '48px/icon-48-source.png', JText::_('COM_PRESSEARCHIV_SOURCES'));

					$link = 'index.php?option=com_pressearchiv&amp;view=categories';
					echo PressearchivHelper::quickIconButton($link, '48px/icon-48-category.png', JText::_('COM_PRESSEARCHIV_CATEGORIES'));
					?>
					<div style="clear:both">&nbsp;</div>
					<p>&nbsp;</p>
					<div class="alert alert-block alert-info ph-w80">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<?php echo PressearchivHelper::getLinks(); ?>
					</div>
				</div>
			</div>
			<div class="pressearchiv-cpanel-right">
				<div class="well">
					<div style="float:right;margin:10px;">
						<?php echo JHTML::_('image', 'team-pressearchiv.png', 'Team Pressearchiv'); ?>
					</div>
					<h3><?php echo JText::_('JVERSION'); ?></h3>
					<p><?php echo PressearchivHelper::getVersion();?></p>'
					<h3><?php echo JText::_('COM_PRESSEARCHIV_COPYRIGHT'); ?></h3>
					<p>&copy; 2011 - <?php echo date("Y"); ?> Pressearchiv Development Team</p>
					<p><a href="http://joomla-pressearchiv.github.com/pressearchiv/" target="_blank">Homepage</a></p>
					<h3><?php echo JText::_('COM_PRESSEARCHIV_LICENCE'); ?></h3>
					<p><a href="http://www.gnu.org/licenses/gpl-3.0.html" target="_blank">GPLv3</a></p>
					<div style="border-top:1px solid #c2c2c2"></div>
					<p>&nbsp;</p>
					<div class="btn-group">
						<a class="btn btn-large btn-primary" href="https://github.com/hajonie/pressearchiv3/tree/master/Pressearchiv3" target="_blank">
							<i class="icon-loop icon-white"></i>&nbsp;&nbsp;
							<?php echo JText::_('COM_PRESSEARCHIV_CHECK_FOR_UPDATE'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="option" value="com_pressearchiv" />
		<input type="hidden" name="view" value="cpanel" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>