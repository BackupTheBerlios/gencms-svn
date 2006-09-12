<?php
    //Note: GC mean Global Constant
	//	    P    mean Path
	
	//////////////////////////////////////////////////////////////////////
	//GLOBAL:
	//////////////////////////////////////////////////////////////////////
	define('GC_PATHSIGN', '/' );
	//webpath
	define('GC_WEBPATH','http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos( $_SERVER['PHP_SELF'] , GC_PATHSIGN )).GC_PATHSIGN);
	//Include Path
	define('GC_IPATH', substr( $_SERVER['SCRIPT_FILENAME'], 0, strrpos( $_SERVER['SCRIPT_FILENAME'] , GC_PATHSIGN ) ).GC_PATHSIGN);
    
	//templates
	define('GC_PTPL',GC_IPATH.'templates/');
	//libs
	//scripts
	//admin
	
	//////////////////////////////////////////////////////////////////////
	// Page Settings:
	//////////////////////////////////////////////////////////////////////
	$ConfPages = array();
	
	//default page:
	$ConfPages[GC_WEBPATH] = GC_IPATH;
	
	//example
	//$ConfPages['http://localhost/bla'] = /var/www/bla/;
	
    //define datapathes:
	define('GC_P_DATAIN', $ConfPages[GC_WEBPATH].'_base/');
	define('GC_P_DATAOUT', $ConfPages[GC_WEBPATH].'_compiled/');
	
	//OPTIONAL: main_path 
	
	//////////////////////////////////////////////////////////////////////
	// View & Generation Settings:
	//////////////////////////////////////////////////////////////////////
	
    //Define the Block whick contain the content
    define('GC_CTBLOCK','content');
    
    //full static ?
    define('GC_FULLSTATIC',false);
?>