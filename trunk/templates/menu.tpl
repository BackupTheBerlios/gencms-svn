<h1><?=$Var['Title']?></h1>
 <?php foreach ($Block['Links'] as $Link ): ?>  
    <a href="<?=$Link['File']?>" ><?=$Link['Name']?></a>
 <?php endforeach; ?>