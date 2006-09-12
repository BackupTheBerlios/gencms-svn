<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: admin/index.php
	/*	Description: Main file for Admin Backend
	/*************************************/
    
	//TODO Change Constant
    if (!defined('GC_IPATH')) exit;   
    //Constants for Admin interface
    define('GC_ADMIN',GC_IPATH.'admin/');
    
    //admin backend
    include_once(GC_IPATH.'lib/ltemplate.inc');
    include_once(GC_IPATH.'lib/libSession.inc');
	include_once(GC_ADMIN.'page-alias.php');
    include_once(GC_ADMIN.'admin-functions.php');
    
    ////////////////////////////
    //Objects
    $TPL = new LTemplate();
    $Session = new Session();
    
    /////////////////////////////
    //  check Session
    if(!checkSession())
    {
        $TPL->render($SPages['login']);
        exit;
    }
    if($_GET['action'] == 'logout')
    {
      $Session->destroy();
      $TPL->render($SPages['login']);
      exit;
    }
	
	//////////////////////////////
	//?p=site&s=/news
    //TODO check for not available pages 
	if(empty($_GET['p']))
		$_GET['p'] = "example";
	$Mod = $SPages[$_GET['p']];
	
    //////////////////////////////
	
	$TPL->set('Menu',$SPages['menu']);
	$TPL->set('Module',$Mod);
	$TPL->render($SPages['basetmpl']);
?>
