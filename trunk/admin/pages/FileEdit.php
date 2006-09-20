<?php
	//b = block
	//get file from site file
	// if post has name from textfield save
    
    if( !empty($_GET['b']) || !empty($_GET['name']) )
    {
        $BlockParam = $_GET['b'];
        $FileParam = $_GET['name'];
    
        $File = GC_PBASE.'blocks/'.$BlockParam.'/'.$FileParam.'.php';
        $FileContent = file_get_contents($File);
    }
    
    //save
    if(!empty($_POST['FileContent']))
    {
        $BlockName = $_POST['BlockName'];
        $FileName = $_POST['FileName'];
        $FileContent = $_POST['FileContent'];
        
        $SaveFile = GC_PBASE.'blocks/'.$BlockName.'/'.$FileName.'.php';
        $filehandle = fopen($SaveFile,'w');
        fwrite($filehandle,$FileContent);
        fclose($filehandle);
    }
    
?>
<h1>Edit File</h1>
<p>File Content:</p>
<form action="admin.php?p=EditFile" method="post">
	<textarea name="FileContent" cols="80" rows="20"><?=$FileContent?></textarea>
    <input type="hidden" name="BlockName" value="<?=$BlockParam?>"/>
    <input type="hidden" name="FileName" value="<?=$FileParam?>"/>
    <br/>
	<input type="submit" value="Save">
</form>