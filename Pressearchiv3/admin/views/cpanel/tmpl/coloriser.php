<?php
/**
 * Pressearchiv - A Joomla! Component
 * @version     3.0.0
 * @filename    coloriser.php
 * @author      Hans-Joachim Niemann
 * @date        19.04.2013
 *
 * @copyright   Copyright (C) 2011 - 2013 Pressearchiv Development Team, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

class PressearchivChangelogColoriser
{
	public static function colorise($file, $onlyLast = false)
	{
		$ret = '';

		$lines = @file($file);
		if(empty($lines)) return $ret;

		array_shift($lines);

		foreach($lines as $line) {
			$line = trim($line);
			if(empty($line)) continue;
			$type = substr($line,0,1);
			switch($type) {
				case '=':
					continue;
					break;
						
				case '+':
					$ret .= "\t".'<li class="pressearchiv-changelog-added"><span></span>'.htmlentities(trim(substr($line,2)))."</li>\n";
					break;

				case '-':
					$ret .= "\t".'<li class="pressearchiv-changelog-removed"><span></span>'.htmlentities(trim(substr($line,2)))."</li>\n";
					break;

				case '~':
					$ret .= "\t".'<li class="pressearchiv-changelog-changed"><span></span>'.htmlentities(trim(substr($line,2)))."</li>\n";
					break;

				case '!':
					$ret .= "\t".'<li class="pressearchiv-changelog-important"><span></span>'.htmlentities(trim(substr($line,2)))."</li>\n";
					break;

				case '#':
					$ret .= "\t".'<li class="pressearchiv-changelog-fixed"><span></span>'.htmlentities(trim(substr($line,2)))."</li>\n";
					break;

				default:
					if(!empty($ret)) {
						$ret .= "</ul>";
						if($onlyLast) return $ret;
					}
					if(!$onlyLast) $ret .= "<h3 class=\"pressearchiv-changelog\">$line</h3>\n";
					$ret .= "<ul class=\"pressearchiv-changelog\">\n";
					break;
			}
		}

		return $ret;
	}
}