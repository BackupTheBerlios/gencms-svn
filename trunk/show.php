<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: show.php
	/*	Description: shows a page
	/*************************************/
    //TODO: make it more stable
    
    
    include('config.inc.php');
    include(GC_IPATH.'functions.php');
    include(GC_IPATH.'lib/ltemplate.inc');
    
    //get 
	$param = $_GET['p'];
	if(empty($param)) $param = '/News';
	//get right page 
	//$page = $param.'.php';
	
    //static or dynamic
    if(GC_FULLSTATIC)
    {
        staticpage($param);
    }
    else
    {
        dynamicpage($param); 
    }

?>