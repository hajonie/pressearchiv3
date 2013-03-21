CREATE TABLE IF NOT EXISTS `#__pressearchiv_articles` (
    `id` int(11) NOT NULL auto_increment,
    `catid` int(11) NOT NULL,
    `title` varchar(250) NOT NULL,
    `alias` varchar(255) NOT NULL,
    `released` date NOT NULL default '0000-00-00',
    `sourcesid` int(11) NOT NULL,
    `author` varchar(250) NOT NULL default '',
    `rubrik` varchar(250) NOT NULL default '',
    `seite` varchar(250) NOT NULL default '',
    `directsourcelink` varchar(250) NOT NULL default '',
    `published` tinyint(1) NOT NULL,
    `content` text NOT NULL,
    `counter` int(11) NOT NULL default '0',
    `created_by` int(11) unsigned NOT NULL default '0',
    `modified` datetime NOT NULL,
    `modified_by` int(11) unsigned NOT NULL default '0',
    `meta_keywords` text NOT NULL default '',
    `meta_description` text NOT NULL default '',
    `date` datetime NOT NULL default '0000-00-00 00:00:00',
    `imageurl` varchar(255) NOT NULL default 'noimg.jpg',
    `checked_out` int(11) NOT NULL,
    `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
    `ordering` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET `utf8` COMMENT='Pressearchiv Articles';

CREATE TABLE IF NOT EXISTS `#__pressearchiv_sources` (
    `id` int(11) NOT NULL auto_increment,
    `parent_id` int(11) unsigned NOT NULL default '0',
    `sourcename` varchar(250) NOT NULL default '',
    `alias` varchar(255) NOT NULL default '',
    `sourcedescription` text NOT NULL,
    `image` varchar(100) NOT NULL default'',
    `sourceurl` varchar(255) NOT NULL default '',
    `targeturl` tinyint(1) NOT NULL default '0',
    `published` tinyint(1) NOT NULL default '0',
    `counter` int(11) NOT NULL default '0',
    `meta_keywords` text NOT NULL default '',
    `meta_description` text NOT NULL default '',
    `checked_out` int(11) NOT NULL default '0',
    `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
    `access` int(11) unsigned NOT NULL default '0',
    `ordering`int(11) NOT NULL,
    PRIMARY KEY  (`id`)
) DEFAULT CHARACTER SET `utf8` COMMENT='Pressearchiv Sources';

CREATE TABLE IF NOT EXISTS `#__pressearchiv_categories` (
    `id` int(11) unsigned NOT NULL auto_increment,
    `parent_id` int(11) unsigned NOT NULL default '0',
    `catname` varchar(250) NOT NULL default '',
    `alias` varchar(255) NOT NULL default '',
    `catdescription` text NOT NULL,
    `image` varchar(100) NOT NULL default '',
    `published` tinyint(1) NOT NULL default '0',
    `counter` int(11) NOT NULL default '0',
    `meta_keywords` text NOT NULL default '',
    `meta_description` text NOT NULL default '',
    `checked_out` int(11) NOT NULL default '0',
    `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
    `access` int(11) unsigned NOT NULL default '0',
    `ordering` int(11) NOT NULL default '0',
    PRIMARY KEY  (`id`)
) DEFAULT CHARACTER SET `utf8` COMMENT='Pressearchiv Categories';

CREATE TABLE IF NOT EXISTS `#__pressearchiv_settings` (
    `id` int(11) NOT NULL,
    `sorttable` tinyint(4) NOT NULL,
    `sortdir` tinyint(4) NOT NULL,
    `sorttyp` tinyint(4) NOT NULL,
    `detailansicht` tinyint(4) NOT NULL,
    `imagesize` varchar(20) NOT NULL,
    `imagewidthx` varchar(20) NOT NULL,
    `imageheightx` varchar(20) NOT NULL,
    `imageshow` tinyint(4) NOT NULL,
    `pdfshow` tinyint(4) NOT NULL,
    `imagelightbox` tinyint(4) NOT NULL,
    `wiepdfanz` tinyint(4) NOT NULL,
    `lightboxtyp` tinyint(4) NOT NULL,
    `shadowboxoversize` tinyint(4) NOT NULL,
    `sb_viewportpadding` tinyint(4) NOT NULL,
    `sb_overlaycolor` varchar(20) NOT NULL,
    `sb_overlayopacity` tinyint(4) NOT NULL,
    `shadowboxlang` tinyint(4) NOT NULL,
    `dateformat` varchar(100) NOT NULL,
    `tablewidth` varchar(20) NOT NULL,
    `showdetailtitle` tinyint(4) NOT NULL,
    `showdetailinhalt` tinyint(4) NOT NULL,
    `showbacklink` tinyint(4) NOT NULL,
    `blpos` tinyint(4) NOT NULL,
    `titlewidth` varchar(20) NOT NULL,
    `titlename` varchar(100) NOT NULL,
    `showthumb` tinyint(4) NOT NULL,
    `thumbwidth` varchar(20) NOT NULL,
    `thumbname` varchar(100) NOT NULL,
    `showvom` tinyint(4) NOT NULL,
    `vomwidth` varchar(20) NOT NULL,
    `vomname` varchar(100) NOT NULL,
    `showquelle` tinyint(4) NOT NULL,
    `quellewidth` varchar(20) NOT NULL,
    `quellename` varchar(100) NOT NULL,
    `sourcelinklist` tinyint(4) NOT NULL,
    `sourcesorttable` tinyint(4) NOT NULL,
    `sourcesortdir` tinyint(4) NOT NULL,
    `showauthor` tinyint(4) NOT NULL,
    `authorwidth` varchar(20) NOT NULL,
    `authorname` varchar(100) NOT NULL,
    `showrubrik` tinyint(4) NOT NULL,
    `rubrikwidth` varchar(20) NOT NULL,
    `rubrikname` varchar(100) NOT NULL,
    `showseite` tinyint(4) NOT NULL,
    `seitewidth` varchar(20) NOT NULL,
    `seitename` varchar(100) NOT NULL,
    `showkategorie` tinyint(4) NOT NULL,
    `kategoriewidth` varchar(20) NOT NULL,
    `kategoriename` varchar(100) NOT NULL,
    `katlinklist` tinyint(4) NOT NULL,
    `katsorttable` tinyint(4) NOT NULL,
    `katsortdir` tinyint(4) NOT NULL,
    `footer` tinyint(4) NOT NULL,
    `storeip` tinyint(4) NOT NULL,
    `imageenabled` tinyint(4) NOT NULL,
    `descriptionlimit` varchar(15) NOT NULL,
    `submitarticleyes` tinyint(4) NOT NULL,
    `articlesubmitrec` tinyint(4) NOT NULL,
    `publisharticleyes` tinyint(4) NOT NULL,
    `articlepublishrec` tinyint(4) NOT NULL,
    `editarticleyes` tinyint(4) NOT NULL,
    `articleeditrec` tinyint(4) NOT NULL,
    `articleeditown` tinyint(4) NOT NULL,
    `submitcategoryyes` tinyint(4) NOT NULL,
    `categorysubmitrec` tinyint(4) NOT NULL,
    `publishcategoryyes` tinyint(4) NOT NULL,
    `categorypublishrec` tinyint(4) NOT NULL,
    `editcategoryyes` tinyint(4) NOT NULL,
    `categoryeditrec` tinyint(4) NOT NULL,
    `categoryeditown` tinyint(4) NOT NULL,
    `categorysubmitown` tinyint(4) NOT NULL,
    `submitsourceyes` tinyint(4) NOT NULL,
    `sourcesubmitrec` tinyint(4) NOT NULL,
    `publishsourceyes` tinyint(4) NOT NULL,
    `sourcepublishrec` tinyint(4) NOT NULL,
    `editsourceyes` tinyint(4) NOT NULL,
    `sourceeditrec` tinyint(4) NOT NULL,
    `sourceeditown` tinyint(4) NOT NULL,
    `sourcesubmitown` tinyint(4) NOT NULL,
    `meta_keywords` varchar(255) NOT NULL,
    `meta_description` varchar(255) NOT NULL,
    `lastupdate` varchar(20) NOT NULL default '',
    `checked_out` int(11) NOT NULL default '0',
    `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
    UNIQUE KEY `id` (`id`)
) DEFAULT CHARACTER SET `utf8` COMMENT='Pressearchiv Settings';