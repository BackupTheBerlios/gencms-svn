<?php
	/*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: efile.php
	/*	Description: Extended File Class
	/*************************************/
	class EFile 
	{
		var $PHPTags;
		var $FileHandle;
		
		function EFile($PHPTag)
		{
			$this->PHPTags = $PHPTag;
		}
		
		function open($file, $mode)
		{
			$this->FileHandle = fopen();
		}
		
		function close()
		{
		
		}
		
		function isOpened()
		{
		
		}
		
		//Line write
		function write()
		{
		
		}
		
		function addArray($name, $array)
		{
		
		}
		
		//array entry
		function addArrEntry($name, $key, $value)
		{
		
		}
		
		function addVar($name,$value)
		{
		
		}
	}
?>