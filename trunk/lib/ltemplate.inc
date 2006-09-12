<?php
	 /*************************************/
	/*	Project:            LTemplate ( LightweightCMS )
	/*	Author:             darkdragon
	/*	Licensed:          GPLv2
	/*      File:                   core/ltemplate.inc
	/*      Content Type:   Class
	/*      Description:     The template engine for  Lightweight CMS
          /*       Changelog:   
           /*     Version 1.0 - 2006-06-24 - Initial Release
	/*************************************/
	
	/* Template Class  */
	class LTemplate
	{
		var $arVar; //Array for Variable
		var $arBlock; //Array vor Blocks

		function LTemplate()
		{
			$this->arVar = array();
			$this->arBlock = array();
		}

		function set($Name,$Value)
		{
			$this->arVar[$Name] = $Value;
		}

		function setBlock ($Name, $Value)
		{
			$this->arBlock[$Name] = $Value;
		}

		function render($page)
		{
			$Var = $this->arVar;
			$Block = $this->arBlock;

			include($page);
		}
	}
?>