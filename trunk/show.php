<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2 or newer, see license.txt on top level directory
	/* 
	/*      File: show.php
	/*	Description: shows a page
	/*************************************/
    
    //include config and libs
    include('config.inc.php');
    include_once(GC_IPATH.'functions.php');
    include_once(GC_PLIB.'ltemplate.inc');
    //include site index
    include_once(GC_SINDEX);
    
    //define Error Handler
    set_error_handler("ErrorHandler");
    
    //get page from p 
	$param = $_GET['p'];
	if(empty($param)) {   
        reset($SIndex);
        $param = key($SIndex);
    }

    //static or dynamic
    if(GC_STATICSITES)
    {
        staticpage($param);
    }
    else
    {
        dynamicpage($param); 
    }

?>