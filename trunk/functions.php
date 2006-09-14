<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: functions.php
	/*	Description:
	/*************************************/
    
    //TODO: make it more stable
    //================================================================================================
    //Functions =======================================================================================
    
    /////////////////////////////////////////
    //use a complete generated page 
	function staticpage($pagename) 
	{
        //TODO first check if fil exist
        //replace _base with _compiled and .php with .htm
		include('_compiled/sites/'.$pagename);
	}
	
    /////////////////////////////////////////
    //use dynamic pages
	function dynamicpage($pagename)
	{
		$TPL = new LTemplate();
		//includes a Site which has 2 Objects: $SSettings $SBlocks 
		//TODO: check if file exist
		include('_base/site-index.php');
		include('_base/sites/'.$SIndex[$pagename]);
        
		//Loop through the blocks and them to template
        reset($SBlocks);
        while($SBlock = current($SBlocks)) 
        {
            $TPL->set(key($SBlocks ), $SBlock);
            next($SBlocks);
        }
		//set title
		$TPL->set('title', $SSettings['title']);
      
		$TPL->render(GC_IPATH.'templates/'.$SSettings['template']);
	}
    
	/////////////////////////////////////////
	//im template insert('topmenu',$Var['topmenu']);
	function insert_block($page)
	{
		//loop though the pages
        if(strripos($page,';') > 0)
        {
            $files = explode(";", $page);
             while($file = current($files)) 
            {
				//TODO: check if file exist
                $file = formatpath($file);
                include($file);
                next($files);
            } 
        }
        else
        {
			//TODO: check if file exist
            $page = formatpath($page);
            include($page);
        }
	}
    
    /////////////////////////////////////////
    //add variables
    function formatpath($string)
    {
        $string = str_replace("%cblocks%", GC_IPATH."_compiled/blocks", $string);
        $string = str_replace("%dblocks%", GC_IPATH."_base/blocks", $string);
        return $string;
    }
    
    /////////////////////////////////////////
    //secure include
    function sinclude($file)
    {
    
    }
    
    /////////////////////////////////////////
    // dec2hex
    function dec2hex($nr)
    {
        $temp = dechex($nr);
        return str_pad($temp, 4, "0", STR_PAD_LEFT);
    }

?>