<?php
    include_once(GC_IPATH.'scripts/Compiler.php');
    
    echo 'Compile Site Index <br/><br/>';
    generateSiteIndex(GC_IPATH.'_base/sites');
    echo 'Done';
?>