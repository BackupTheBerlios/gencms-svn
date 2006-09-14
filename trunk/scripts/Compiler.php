<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: Compiler.php
	/*	Description:
	/*************************************/
    
    include_once(GC_IPATH.'functions.php');
    include_once(GC_IPATH.'lib/ltemplate.inc');
    
    //TODO make more stable
    
    function precompile()
    {
        //search 
        readdirectory(GC_IPATH.'_base/blocks','compile');
    }
    
    function sitecompile()
    {
        readdirectory(GC_IPATH.'_base/sites','CompileSite');
    }
    
    //======================================================================================
    //loop though directorys
    function readdirectory($dir, $functioncall)
    {
        $dirlist = opendir($dir);
		while ($file = readdir ($dirlist))
		{
			$newpath = $dir.'/'.$file;
			if ($file != '.' && $file != '..' && $file != '.svn')
			{
				if (is_dir($newpath))
				{
                    readdirectory($newpath,$functioncall);
				}
				else
				{
                     //compile file
                    $destpath = str_replace('_base','_compiled',$newpath);
                    $destpath = str_replace('.php','.htm',$destpath);
                    echo "Compile: ".$newpath.'<br/> -> '.$destpath.'<br/><br/>';
                    writeoutput($destpath,$functioncall($newpath));
				}
			}	
		}
		closedir($dirlist);
    }
    
    //======================================================================================
    //Desc: writes the string to a file
    function writeoutput($filename,$content)
    {
            if (!$handle = fopen($filename, 'w')) 
              return false;
            
            // Write $somecontent to our opened file.
            if (fwrite($handle, $content) === FALSE)
            {
               fclose($handle);
               return false;
            }             
            fclose($handle);
            return true;
    }
    
    //======================================================================================
    //Desc: Compile a php file to html
    function compile($page)
    {
        ob_start();
        include($page);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    
    //======================================================================================
    //Desc: Compile a site php file to html 
    function CompileSite($fullpath)
    {
        ob_start();
		dynamicpage($fullpath); 
        $output = ob_get_clean();
        return $output;
    }
     //======================================================================================
    //Desc: generate the Site Index needed for Menu System
    function generateSiteIndex($path)
    {

        $filehandle = fopen(GC_IPATH."_base/site-index.php", "w");
        $maxid = 0;
        fwrite($filehandle, "<?php \r\n");
        fwrite($filehandle, '$SIndex = array();'."\r\n");
        
        //loop through sites
        $dirlist = opendir($path);
		while ($file = readdir ($dirlist))
		{
            if ($file != '.' && $file != '..' && $file != '.svn')
			{
                include($path.'/'.$file);
                $value = hexdec(substr($file,0,4));
                if($value > $maxid) $maxid=$value;
                fwrite($filehandle, '$SIndex'."['" . $SSettings['path'] . "'] = '" . $file . "'; \r\n");
            }
        }
        closedir($dirlist);
        //finish sites
        fwrite($filehandle, '$SLastID'." = " . $maxid . "; \r\n");
        fwrite($filehandle, "?>");
        fclose($filehandle );
    }
?>