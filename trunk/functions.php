<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2 or newer, see license.txt on top level directory
	/* 
	/*      File: functions.php
	/*	Description: base functions for gencms
	/*************************************/
    
    //TODO: make it more stable
    
    //== CONSTANT
    define('ERR_SITE',1000); // A SITE ERROR
    
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
        global $SIndex;
		$TPL = new LTemplate();
		//includes a Site which has 2 Objects: $SSettings $SBlocks 
		//TODO: check if file exist
		include(GC_PBASE.'sites/'.$SIndex[$pagename]);
        
		//Loop through the blocks and them to template
        reset($SBlocks);
        while($SBlock = current($SBlocks)) 
        {
            $TPL->set(key($SBlocks ), $SBlock);
            next($SBlocks);
        }
		//set title
		$TPL->set('title', $SSettings['title']);
        //render template
		$TPL->render(GC_PTPL.$SSettings['template']);
	}
    
	/////////////////////////////////////////
	//in template insert('topmenu');
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
    
    ////////////////////////////////////////////////
    //extract the name of a path
    function extractName($string)
    {
         if(substr($string,-1) == "/")
            $tmpname = substr($string,0,-1);
        else
            $tmpname = $string;
            
        return substr($tmpname,strrpos($tmpname,'/')+1);
    }
    
    ////////////////////////////////////////////////
    // Error Handler
    function ErrorHandler($errno, $errstr, $errfile, $errline)
    {
        $TPL = new LTemplate();
        
        switch ($errno) 
        {
        case E_ERROR:
            $TPL->set('ERRORTYPE','ERROR');
            break;
        case E_WARNING:
            $TPL->set('ERRORTYPE','WARNING');
            break;
        case E_PARSE:
            $TPL->set('ERRORTYPE','PARSING ERROR');
            break;
        default:
            return;
        }

        $TPL->set('ERRORSTR',$errstr);
        $TPL->set('ERRORFILE',$errfile);
        $TPL->set('ERRORLINE',$errline);
        
        $TPL->render(GC_PDEFTPL.'error.tpl');
        exit;
    }
    
?>
