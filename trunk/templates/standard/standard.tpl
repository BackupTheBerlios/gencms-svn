<?=$Var['XHTMLHEADER']?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$Var['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=GC_WEBPATH;?>templates/standard/style.css" />
</head>
<body>
<div id="wrapper">

	<div id="header">
		<? insert_block($Var['header']); ?>
	</div>

	<div id="topbar">
		<? insert_block($Var['topmenu']); ?>
	</div>

	<div id="sidebar_left">
		<? insert_block($Var['leftblock']); ?>
	</div>

	<div id="content">
		<? insert_block($Var[GC_CTBLOCK]);  ?>
	</div>

	<div style="clear:both" />
</div>
</body>
</html>