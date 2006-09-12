<?php
    
    //TODO a Lot

    function CreateMenu($path, $depth, $template, $title)
    {
        $TPL = new LTemplate();
        
        include(GC_IPATH."_base/site-index.php");
        
        $AllLinks = array();
        
        reset($SIndex);
        while($SSite = current($SIndex)) 
        {
            if(substr(key($SIndex),0,strlen($path)) ==  $path)
            {
                if(substr(key($SIndex),-1) == "/")
                    $tmpname = substr(key($SIndex),0,-1);
                else
                    $tmpname = key($SIndex);
                    
                $Link = array();
                $Link['Name'] = substr($tmpname,strrpos($tmpname,'/')+1);
                $Link['File'] = GC_WEBPATH.'show.php?p='.$Link['Name'];
                $AllLinks[] = $Link;
            }
            next($SIndex);
        }
        $TPL->set('Title',$title);
        $TPL->setBlock('Links',$AllLinks);
        $TPL->render($template);
    }

    //========================================================================
    


?>