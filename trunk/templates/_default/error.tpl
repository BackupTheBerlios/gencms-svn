<?='<?xml version="1.0" encoding="ISO-8859-1" ?>'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>genCMS</title>
<link rel="stylesheet" type="text/css" href="<?=GC_WEBPATH;?>templates/_default/error.css" />
</head>
<body>
<h1></h1>
<br/>
<br/>
<br/>
<div class="center">
<table>
  <tr class="errtypecell">
    <td colspan="2"><?=$Var['ERRORTYPE']?></td>
  </tr>
  <tr>
    <td class="headingcell ">File:</td>
    <td><?=$Var['ERRORFILE']?></td>
  </tr>
  <tr>
    <td class="headingcell ">Line:</td>
    <td><?=$Var['ERRORLINE']?></td>
  </tr>
  <tr>
    <td class="headingcell ">Description:</td>
    <td><?=$Var['ERRORSTR']?> </td>
  </tr>
</table>
</div>
</body>
</html>