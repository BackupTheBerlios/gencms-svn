<?php
//projekt1.php
$SBlocks = array();
$SSettings = array();
//Settings
$SSettings['template']  = "standard/standard.tpl";
$SSettings['title']     = "The Title";
$SSettings['path']      = "/Projekte/Projekt1";
$SSettings['parent']    = "-";
//Blocks
$SBlocks['header']		= "%cblocks%/header/header_standard.htm";
$SBlocks['topmenu']		= "%cblocks%/topmenu/topmenu_standard.htm";
$SBlocks['leftblock']  	= "%cblocks%/leftblock/menu_standard.htm;%cblocks%/leftblock/menu_projekte.htm";
$SBlocks['footer']		= "%cblocks%/footer/footer_standard.htm";
$SBlocks['content']		= "%cblocks%/content/content_projekt1.htm";
?>