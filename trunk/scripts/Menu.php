<?php
    
    //TODO a Lot

    function CreateMenu($path, $depth, $template, $title)
    {
        $TPL = new LTemplate();
        
        include_once(GC_IPATH."_base/site-index.php");
        
        $AllLinks = array();
        
        reset($SIndex);
        while($SSite = current($SIndex)) 
        {
            if(substr(key($SIndex),0,strlen($path)) ==  $path)
            {
                $Link['Name'] = extractName(key($SIndex));
                $Link['File'] = GC_WEBPATH.'show.php?p='.key($SIndex);
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