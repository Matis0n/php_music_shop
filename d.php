<HTML>
<HEAD>
<TITLE>Запросы</TITLE>
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
$first_query = "DELETE FROM home WHERE YEAR(date_of_construction) < 1970";
$second_query = "DELETE FROM businessmans WHERE work = '2'";
?>
<form method="post" action="dml.php?&id=1">
<p>1)Снести все дома на острове, построенные до 1970 года. Все работы провести за сегодня..</p>
<p>Текст запроса:</p>
<p class="qr"><?=$first_query?></p>
<input type="submit" value="Выполнить">
</form>
<form method="post" action="dml.php?&id=2">
<p>2) Из-за неэффективности выращивания сахарного тростника все предприниматели, занимающиеся этим видом деятельности,
закрыли свои предприятия. Отразите данную операцию</p>
<p>Текст запроса:</p>
<p class="qr"><?=$second_query?></p>
<input type="submit" value="Выполнить">
</form>
   </body>
   </HTML>
