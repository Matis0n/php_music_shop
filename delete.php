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
$link = mysqli_connect("localhost","root","", "mz");
$table=$_GET['table'];
$id=$_GET['id'];
$d=$_GET['i'];

$link->query("ALTER TABLE businessmans DROP FOREIGN KEY businessmans_ibfk_1, DROP FOREIGN KEY businessmans_ibfk_2");
$link->query("ALTER TABLE contract DROP FOREIGN KEY contract_ibfk_3, DROP FOREIGN KEY contract_ibfk_2 ON DELETE CASCADE ON UPDATE CASCADE");
$link->query("ALTER TABLE home DROP FOREIGN KEY home_ibfk_1");
$link->query("ALTER TABLE home_book DROP FOREIGN KEY home_book_ibfk_1 ON DELETE CASCADE ON UPDATE CASCADE, DROP FOREIGN KEY home_book_ibfk_2 ON DELETE CASCADE ON UPDATE CASCADE");
$link->query("ALTER TABLE parents DROP FOREIGN KEY parents_ibfk_1, DROP FOREIGN KEY parents_ibfk_2,DROP FOREIGN KEY parents_ibfk_3");
$link->query("ALTER TABLE people DROP FOREIGN KEY people_ibfk_1");
$link->query("ALTER TABLE proportion DROP FOREIGN KEY proportion_ibfk_3, DROP FOREIGN KEY proportion_ibfk_2 ON DELETE CASCADE ON UPDATE CASCADE");
$Qwery = "DELETE FROM ".$table." WHERE id= ".$id;
$result = mysqli_query($link,$Qwery) or die("Ошибка " . mysqli_error($link)); 

mysqli_close($link);
	
?>

<script language="JavaScript" type="text/javascript"> 
<!--
function GoOut(){ location="tables.php?$i=<?php echo $d;?>"; } setTimeout( "GoOut()", 0 ); 
//--> 
</script>
</div>
   </body>
   </HTML>