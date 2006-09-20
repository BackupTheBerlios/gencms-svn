<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: admin-functions.php
	/*	Description:
	/*************************************/
    
    function checkSession()
    {
        global $Session;
        $Session->start();
        
        //check for user and password
        if($_POST['user'] == 'test' && sha1($_POST['password']) == 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3')
            $Session->register('UserID',$_POST['user']);
        
        //check session is ok
        if($Session->check("UserID",true))
            return true;
        else
            return false;
    }  
    
    //getTemplateList
    function getTemplates()
    {
        $dir = GC_IPATH.'templates';
        $list = array();
        $dirlist = opendir($dir);
		while ($file = readdir ($dirlist))
		{
            if ($file == '.' || $file == '..' || $file == '.svn')
                continue;
            
			$newpath = $dir.'/'.$file;
            if (is_dir($newpath))
            {
                array_push($list,array('name' => $file, 'path' => $file));
            }
        }
        return $list;
    }
    ///////////////////////////////////////
    //
    function getBlocks()
    {
        $dir = GC_PBASE.'blocks';
        $list = array();
        $dirlist = opendir($dir);
		while ($file = readdir ($dirlist))
		{
            if ($file == '.' || $file == '..' || $file == '.svn')
                continue;
                
            $newpath = $dir.'/'.$file;
            if (is_dir($newpath))
                array_push($list,$file);
        }
        return $list;
    }
    
    ////////////////////////////////////////
    //
    function getBlockFiles($blockname)
    {
        $dir = GC_PBASE.'blocks/'.$blockname;
        $list = array();
        $dirlist = opendir($dir);
		while ($file = readdir ($dirlist))
		{
            if ($file == '.' || $file == '..' || $file == '.svn')
                continue;
            
            $newpath = $dir.'/'.$file;
            if (is_file($newpath))
                array_push($list,substr($file,0,-4));
        }
        return $list;
    }
   
?>