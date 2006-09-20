<?php
    //Note: GC mean Global Constant
	//	    P    mean Path
	
	//////////////////////////////////////////////////////////////////////
	// GLOBAL
    // PATH SETTINGS
	//////////////////////////////////////////////////////////////////////
	define('GC_PATHSIGN', '/' );
	//webpath
	define('GC_WEBPATH','http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos( $_SERVER['PHP_SELF'] , GC_PATHSIGN )).GC_PATHSIGN);
	//Include Path
	define('GC_IPATH', substr( $_SERVER['SCRIPT_FILENAME'], 0, strrpos( $_SERVER['SCRIPT_FILENAME'] , GC_PATHSIGN ) ).GC_PATHSIGN);
    
	//templates
	define('GC_PTPL',GC_IPATH.'templates/');
	//libs
    define('GC_PLIB',GC_IPATH.'lib/');
	//scripts
    define('GC_PSCRIPT',GC_IPATH.'scripts/');
	//admin
    define('GC_PADMIN',GC_IPATH.'admin/');
    //default templates (error template etc)
    define('GC_PDEFTPL',GC_PTPL.'_default/');

	//////////////////////////////////////////////////////////////////////
	// Page Settings:
	//////////////////////////////////////////////////////////////////////
	$ConfPages = array();
	
	//default page:
	$ConfPages[GC_WEBPATH] = GC_IPATH;
	
	//example
	//$ConfPages['http://localhost/bla'] = /var/www/bla/;
	
    //define datapathes:
	define('GC_PBASE', $ConfPages[GC_WEBPATH].'_base/');
	define('GC_POUT', $ConfPages[GC_WEBPATH].'_compiled/');
    
    /////////////////////////////////////////////////////////////////////////////
    //key files
    define('GC_SINDEX',GC_PBASE.'site-index.php');
	
	//OPTIONAL: main_path 
	
	//////////////////////////////////////////////////////////////////////
	// View & Generation Settings:
	//////////////////////////////////////////////////////////////////////
	
    //Define the Block whick contain the content
    define('GC_CTBLOCK','content');
    
    //full static ?
    define('GC_STATICSITES',false);
?>