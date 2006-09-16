<?php
    //Workaround for right dynamic include path 
    //so the admin interface is called over main 
    //directory admin.php
    define('PC_ISADMIN','');
    include_once('config.inc.php');
    include_once(GC_IPATH.'admin/index.php');
?>