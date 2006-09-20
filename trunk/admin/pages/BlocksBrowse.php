<?php
    $TList = 0;
    
    $BlockParam = $_GET['b'];
    
    if(empty($BlockParam))
        $TList = getBlocks();
    else
        $TList = getBlockFiles($BlockParam);       
?>
<h1>Browse Blocks</h1>
<?php if (empty($_GET['b'])): ?>
    <?php foreach ($TList as $value): ?>  
        <a style="display:block" href="admin.php?p=BrowseBlocks&b=<?=$value?>"><?=$value?></a>
    <?php endforeach; ?>
<?php else: ?>
     <?php foreach ($TList as $value): ?>  
        <a style="display:block" href="admin.php?p=EditFile&b=<?=$BlockParam?>&name=<?=$value?>"><?=$value?></a>
    <?php endforeach; ?>
<?php endif; ?>