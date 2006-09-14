<?php
    /*************************************/
	/*	Project: Gen CMS
	/*	Author: darkdragon
	/*	Licensed: GPLv2, see license.txt on top level directory
	/* 
	/*      File: admin/pages/SiteNew.php
	/*	Description: 
	/*************************************/
    //TODO: Add support for existing block content

   $Step = "1";
   // VerifyParam()
   if(!empty($_GET['step'])) $Step = $_GET['step'];
   
   //Step 1: Choose Template
   if ($Step == "1")
   {
		//create Template List   
        $Block['Templates'] = getTemplates();
   }
   //Step 2: Configure
   if ($Step == "2")
   {
        // allgemeine settings
        //include blocks from template config
        include_once(GC_IPATH.'templates/'.$_POST['Template'].'/config.php');
        $TPLBlocks = explode(';',$TemplateSettings);
   }
   /////////////////////////////////////////////////////////////////////////////////////////////////////////
   //Step 3: Save new Site
   if ($Step == "3")
   {
       //get Template Settings
       include_once(GC_IPATH.'templates/'.$_POST['Template'].'/config.php');
       $TPLBlocks = explode(';',$TemplateSettings);
       
       include_once(GC_IPATH.'functions.php');
       include(GC_IPATH.'_base/site-index.php');
       //filename
       $filename = extractName($_POST['path']);
       $filehandle = fopen(GC_IPATH."_base/sites/".dec2hex($SLastID + 1).'-'.$filename.'.php', "w");
       //write header
       fwrite($filehandle, "<?php \r\n");
       fwrite($filehandle, '$SSettings = array();'."\r\n");
       fwrite($filehandle, '$SBlocks = array();'."\r\n");
       
       //write settings
       fwrite($filehandle, '$SSettings'."['template'] = '" . $_POST['Template'].'/standard.tpl'. "'; \r\n");
       fwrite($filehandle, '$SSettings'."['title'] = '" . $_POST['title'] . "'; \r\n");
       fwrite($filehandle, '$SSettings'."['path'] = '" . $_POST['path'] . "'; \r\n");
       
       //write blocks
       foreach ($TPLBlocks as $BlockEntry)
       {
        if(empty($_POST[$BlockEntry])) continue;
        fwrite($filehandle, '$SBlocks'."['".$BlockEntry."'] = '" . $_POST[$BlockEntry]. "'; \r\n");
       }
       
       //end file
       fwrite($filehandle, "?>");
       fclose($filehandle ); 
   }
   
/************************************************************************************************************************************/ ?>
<h1>New Site</h1>
<?php if ($Step == "1"): ?>  
    <p>Choose Template:</p>
    <br/>
    <form action="admin.php?p=SiteNew&step=2" method="post">
        <p>Template:<br/>
            <select name="Template" class="combobox">
                <?php foreach ($Block['Templates'] as $TplEntry): ?>  
                 <option value="<?=$TplEntry['path']?>"><?=$TplEntry['name']?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Next >>">
        </p>
    </form>
<?php elseif ($Step == "2"): ?>
    <form action="admin.php?p=SiteNew&step=3" method="post">
		<!-- Setting Block ($SSettings) -->
		<fieldset style="width:350px;" >
            <legend>Settings</legend>

            <label for="title" style="float:left; width:70px;">Title: </label>
            <input id="title" name="title" size="30" maxlength="30" value="" type="text">
            <br/>
            <label for="path" style="float:left; width:70px;">Path: </label>
            <input id="path" name="path" size="30" maxlength="30" value="" type="text">
            <input type="hidden" name="Template" value="<?=$_POST['Template']?>"/>
        </fieldset>
		<!-- List Block ($SBlocks) -->
		<fieldset style="width:350px;" >
            <legend>Blocks</legend>

            <?php foreach ($TPLBlocks as $BockEntry): ?>  
            <label for="<?=$BockEntry?>" style="float:left; width:70px;"><?=$BockEntry?>: </label>
            <input id="block_<?=$BockEntry?>" name="<?=$BockEntry?>" size="30" maxlength="80" value="%cblocks%/<?=$BockEntry?>/" type="text"/><br/>
            <?php endforeach; ?>
            
        </fieldset>
         
        <input type="submit" value="Save">
    </form>
<?php elseif ($Step == "3"): ?>
    <p>
        Site Saved <br/>
        TODO: Link to edit site
    </p>
<?php endif; ?>
