<?php
    /*************************************/
	/*	Project: libSession
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: libSession.php
	/*	Description: a class for session handling
	/*************************************/


class Session {

	// Session Start and Destroy
	function start()
	{
   		session_start();
	}
	
	function destroy()
	{
		session_destroy();
	}
	
	// Variable Management
	function register($Name, $Value)
	{
		//TODO Check if Value already exist
		$_SESSION[$Name] = $Value;
	}
	
	function get($Name)
	{
		//TODO: return false if it not exist
		return $_SESSION[$Name];
	}

	function del($Name)
	{
		unset($_SESSION[$Name]);
	}
	
	//get Session Information
	function getSID()
	{
		return session_id();
	}
	
	function getSName()
	{
		return session_name();
	}
	
	function getURLParam()
	{
		// return array SessionName = SessionID
        return array(session_name()=>session_id());
	}
	
	//Check for a Value
	function check($Name, $Destroy)
	{
		if(empty($_SESSION[$Name]) || !isset($_SESSION[$Name]))
		{
			if($Destroy)
		  	   $this->destroy();
			return false;
		}
		else
		  return true;
	}
}

?>