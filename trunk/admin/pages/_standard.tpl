<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Backend</title>
<link rel="stylesheet" type="text/css" href="<?=GC_WEBPATH.'admin/'?>style.css" />
</head>
<body>

	<div id="header">
		<img src="<?=GC_WEBPATH.'admin/'?>images/gencms_wordart.png" alt="Logo" />
	</div>

	<div id="sidebar_left">
		<? include($Var['Menu']); ?>
	</div>

	<div id="content">
		<? include($Var['Module']); ?>
	</div>

	<div style="clear:both" />
</body>
</html>