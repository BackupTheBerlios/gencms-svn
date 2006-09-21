<?
    //new block content aka new content
    $TBlocks = getBlocks();
    
    //if post then save
    if( !empty($_POST['BlockName']) && !empty($_POST['ContentName']) )
    {
        $BlockParam = $_POST['BlockName'];
        $FileParam  = $_POST['ContentName'];
        $FileContent = $_POST['ContentData'];
        
        $SaveFile = GC_PBASE.'blocks/'.$BlockParam.'/'.$FileParam.'.php';
        
        //check if file exist
        if(!is_file($SaveFile))
        {
            $filehandle = fopen($SaveFile,'w');
            fwrite($filehandle,stripslashes($FileContent));
            fclose($filehandle);
        }
        else //file exist
            $TMsg = '<p>The File already exist please use the browse block function.</p>';
    }
?>
<h1>New Block Content</h1>
<br/>
<?=$TMsg?>
<form action="admin.php?p=NewContent" method="post">
     <select name="BlockName" class="combobox">
        <?php foreach ($TBlocks  as $BlockEntry): ?>  
            <option value="<?=$BlockEntry?>"><?=$BlockEntry?></option>
        <?php endforeach; ?>
     </select>
     <br/>
     <input name="ContentName" size="30" maxlength="30" value="<?=$FileParam?>" type="text"/>
     <br/>
     <textarea name="ContentData" cols="80" rows="20"><?=$FileContent?></textarea>
     <br/>
     <input type="submit" value="Save">
</form>
