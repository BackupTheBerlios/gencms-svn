<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Backend- Login</title>
<link rel="stylesheet" type="text/css" href="<?=GC_WEBPATH.'admin/'?>login.css" />
</head>
<body>
    
    <div id="centerbox">
	<div id="login_box">
		<img src="<?=GC_WEBPATH.'admin/'?>images/GenCMS.png" alt="Logo" />
        
        <form action="admin.php" method="post">
          <fieldset id="loginfield" >
            <p>Username:</p>
            <input type="text" name="user" size="20" maxlength="30" />
            <p>Password:</p>
            <input type="password" name="password" size="20" maxlength="30" />
          </fieldset>
          <div class="center">
            <input class="button" type="submit" value="login" />
            <input class="button" type="reset" value="reset" />
          </div>
        </form>
        
        <p style="display:block">
            User: test PW: test
        </p>
		<p style="display:block">
            <a href="show.php">The Site</a>
        </p>
        
	</div>
    </div>
 

</body>
</html>