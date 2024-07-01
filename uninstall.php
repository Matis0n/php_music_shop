<HTML>
<HEAD>
<TITLE>Удаление</TITLE>
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
<div class="main">
    
<?php
if(!($dbLink = mysql_pconnect("localhost","root","")))
{
print("Не могу сединится с сервером!<br\n>");
print(mysql_errno().":".mysql_error()."<br>\n");
exit;
}

$sql = 'DROP DATABASE mz';
if (mysql_query($sql, $dbLink)) {
    echo "<p>База данных была успешно удалена</p>\n";
} else {
    echo 'Ошибка при удалении базы данных: ' . mysql_error() . "\n";
}

?>

</div>

   </body>
   </HTML>