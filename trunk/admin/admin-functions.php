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
        if($_POST['user'] == 'test' && $_POST['password'] == 'test')
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
            if ($file == '.' || $file == '..')
                continue;
            
			$newpath = $dir.'/'.$file;
            if (is_dir($newpath))
            {
                array_push($list,array('name' => $file, 'path' => $file));
            }
        }
        return $list;
    }
    
    function extractName($string)
    {
         if(substr($string,-1) == "/")
            $tmpname = substr($string,0,-1);
        else
            $tmpname = $string;
            
        return substr($tmpname,strrpos($tmpname,'/')+1);
    }
?>