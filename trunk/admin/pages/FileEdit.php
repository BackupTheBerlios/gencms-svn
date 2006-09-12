<?php
	//p = editfile
	//s = site
	//b = block
	
	//get file from site file
	// if post has name from textfield save
?>
<h1>Edit File</h1>
<p>File Content:</p>
<form action="admin.php?p=EditFile" method="post">
	<textarea name="FileContent" cols="80" rows="20"></textarea>
    <input type="hidden" name="Path" value=""/>
    <br/>
	<input type="submit" value="Save">
</form>