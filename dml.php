<HTML>
<HEAD>
<TITLE>Запрос</TITLE>
<meta charset="utf-8">
<link rel="stylesheet" href="my.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
      <script type="text/javascript" src='scr.js'></script>
</HEAD>
<div id='cssmenu'>
<ul> 
   <li class='active'><a href='index.php'>Главная</a></li>
   <li><a href='install.php'>Создание БД</a></li>
   <li><a href='tables.php'>Таблицы</a></li>
   <li><a href='d.php'>DML-запросы</a></li>
   <li><a href='uninstall.php' onclick='return scrDeleteDB()'>Удаление БД</a></li>
</ul>
</div>
<div class="main" style="overflow:auto;">

<?php
$link = mysqli_connect("localhost","root","", "mz");
$one_query = "ЗАпрос 1";
$two_query = "Запрос 2";
$id = $_GET['id'];
switch($id):
	case '1':?>
	<p align="center"><?=$one_query?></p>
	<?php
		$query = "DELETE FROM home WHERE YEAR(date_of_construction) < 1970";
		break;
	case '2':?>
	<p align="center"><?=$two_query?></p>
	<?php

		$query = "DELETE FROM businessmans WHERE work = '2'";

		break;
endswitch;?>
<div class="center">
<p><?=$query?></p>

<?if(!$link->query($query)):?>
	<p class="error">#<?=$link->errno?> - <?=$link->error?></p>
<?else:?>
	<p class="success">Таблицы</p>
	<p><a class="prev" href="tables.php">Вернуться в таблицы</a></p>
<?endif?>
</div>

</div>

   </body>
   </HTML>


