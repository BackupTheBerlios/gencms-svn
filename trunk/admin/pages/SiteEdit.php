<?php

 include_once(GC_PTPL.'standard'.'/config.php');
 $TPLBlocks = explode(';',$TemplateSettings);

?>

<h1>Site Edit</h1>
<form action="admin.php?p=SiteNew&step=3" method="post">
		<!-- Setting Block ($SSettings) -->
		<fieldset style="width:400px;" >
            <legend>Settings</legend>

            <label for="title" style="float:left; width:70px;">Title: </label>
            <input id="title" name="title" size="30" maxlength="30" value="" type="text">
            <br/>
            <label for="path" style="float:left; width:70px;">Path: </label>
            <input id="path" name="path" size="30" maxlength="30" value="" type="text">
            <input type="hidden" name="Template" value="<?=$_POST['Template']?>"/>
        </fieldset>
		<!-- List Block ($SBlocks) -->
		<fieldset style="width:400px;" >
            <legend>Blocks</legend>

            <?php foreach ($TPLBlocks as $BockEntry): ?>  
            <label for="<?=$BockEntry?>" style="float:left; width:70px;"><?=$BockEntry?>: </label>
            <input id="block_<?=$BockEntry?>" name="<?=$BockEntry?>" size="30" maxlength="80" value="%cblocks%/<?=$BockEntry?>/" type="text"/>
            <a href="#">Edit</a><br/>
            <?php endforeach; ?>
            
        </fieldset>
         
        <input type="submit" value="Save">
</form>