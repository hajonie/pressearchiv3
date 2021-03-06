<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    default.php
 * @author      Hans-Joachim Niemann
 * @date        19.04.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

JHtml::_('behavior.framework');
JHtml::_('behavior.modal');

$script = <<<JS
(function($){
	$(document).ready(function(){
		$('#btnchangelog').click(showChangelog);
	});

	function showChangelog()
	{
		var pressearchivChangelogElement = $('#pressearchiv-changelog').clone().appendTo('body').attr('id', 'pressearchiv-changelog-clone');

		SqueezeBox.fromElement(
			document.getElementById('pressearchiv-changelog-clone'), {
				handler: 'adopt',
				size: {
					x: 550,
					y: 500
				}
			}
		);
	}
})(pressearchiv.jQuery);
JS;

JFactory::getDocument()->addScriptDeclaration($script,'text/javascript');

?>
<form action="index.php" method="post" name="adminForm">
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<div class="adminform">
			<div class="pressearchiv-cpanel-left">
				<div id="cpanel">
					<?php
					$link = 'index.php?option=com_pressearchiv&amp;view=pressearchivs';
					echo PressearchivHelper::quickIconButton($link, "icon-48-home.png", JText::_('COM_PRESSEARCHIV_ARTIKEL'));

					$link = 'index.php?option=com_categories&amp;extension=com_pressearchiv';
					echo PressearchivHelper::quickIconButton($link, "icon-48-category.png", JText::_('COM_PRESSEARCHIV_KATEGORIEN'));
						
					$link = 'index.php?option=com_pressearchiv&amp;view=sources';
					echo PressearchivHelper::quickIconButton($link, "icon-48-source.png", JText::_('COM_PRESSEARCHIV_QUELLEN'));

					$link = 'index.php?option=com_pressearchiv&amp;view=configuration';
					echo PressearchivHelper::quickIconButton($link, "icon-48-settings.png", JText::_('COM_PRESSEARCHIV_KONFIGURATION'));
					?>
					<div style="clear:both">&nbsp;</div>
				</div>
			</div>
			
			<div class="pressearchiv-cpanel-right">
		
				<div class="well">
					<div style="float:right;margin:10px;max-width:100%;height:auto;">
						<?php echo JHTML::_('image', 'media/com_pressearchiv/images/logo-pressearchiv.png', JText::_('COM_PRESSEARCHIV_LOGO')); ?>
					</div>
					<h3><?php echo JText::_('JVERSION'); ?></h3>

					<!-- CHANGELOG :: BEGIN -->
					<p>
						<?php echo PressearchivHelper::getVersion();?> &bull;
						<a href="#" id="btnchangelog" class="btn btn-info btn-mini">CHANGELOG</a>
					</p>
					<div style="display:none;">
						<div id="pressearchiv-changelog">
							<?php
								require_once dirname(__FILE__).'/coloriser.php';
								echo PressearchivChangelogColoriser::colorise(JPATH_COMPONENT_ADMINISTRATOR.'/CHANGELOG.php');
							?>
						</div>
					</div>
					<!-- CHANGELOG :: END -->
										
					<h3><?php echo JText::_('COM_PRESSEARCHIV_COPYRIGHT'); ?></h3>
					<p>&copy; 2009 - <?php echo date("Y"); ?> Pressearchiv Development Team</p>
					<p><a href="http://jpa.hjnbb.de" target="_blank">Homepage</a></p>
					<h3><?php echo JText::_('COM_PRESSEARCHIV_LICENCE'); ?></h3>
					<p><a href="http://www.gnu.org/licenses/gpl-3.0.html" target="_blank">GPLv3</a></p>

					<h3><?php echo JText::_('COM_PRESSEARCHIV_DERIVATIVE_WORK');?></h3>
					<p>
						Pressearchiv &copy; 2005 - 2006 bis Version 1.3.1 für Joomla! 1.0 <a href="http://www.helsystems.com/" target="_blank">Andre Timmermanns</a>,&nbsp;
						<?php echo JText::_('COM_PRESSEARCHIV_LICENCE'); ?>: <a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPL</a><br />
					</p>
					
					<div style="border-top:1px solid #c2c2c2"></div>
					<p>&nbsp;</p>
					<div class="btn-group">
						<a class="btn btn-large btn-primary" href="http://jpa.hjnbb.de" target="_blank">
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