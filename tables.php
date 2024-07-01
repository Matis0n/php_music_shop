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
    
<table width='78%' bgcolor=#87CEFA cellpadding=3 border="1">
  <tr>
    <td align="center"><H2><a href="tabl.php?$i=0">Альбом</a></td>
	<td align="center"><H2><a href="tabl.php?$i=1">Фирма</a></td>
    <td align="center"><H2><a href="tabl.php?$i=2">Пол</a></td>
	<td align="center"><H2><a href="tabl.php?$i=3">Группа</a></td>	
    <td align="center"><H2><a href="tabl.php?$i=4">Инструмент</a></td>
    <td align="center"><H2><a href="tabl.php?$i=5">Тип Альбома</a></td>
  <tr>
	<td align="center"><H2><a href="tabl.php?$i=6">Исполнитель</a></td>
    <td align="center"><H2><a href="tabl.php?$i=7">Продажа</a></td>
	<td align="center"><H2><a href="tabl.php?$i=8">Состав группы</a></td>
    <td align="center"><H2><a href="tabl.php?$i=9">Специализация</a></td>
	<td align="center"><H2><a href="tabl.php?$i=10">Стили</a></td>
	<td align="center"><H2><a href="tabl.php?$i=11">Страна</a></td>  >
  </tr>	
</table>
<br><br>
<?php
//создание постоянного соединения  
if(!($dbLink = mysql_pconnect("localhost","root",""))) 
{ 
print("Не могу соединиться с сервером!<br\n>"); 
print(mysql_errno().":".mysql_error()."<br>\n"); 
exit;  
}  
//Выбор базы данных  
if(!mysql_select_db("mz",$dbLink)) 
{ 
print("Не могу соединиться с базой данных!<br\n>"); 
print(mysql_errno().":".mysql_error()."<br>\n"); 
exit;  
} 
$table = array("albom", "firma", "pol", "gruppa", "instrument", "tip_albom", "ispolnitel", "prodaza", "sostav_gruppa", "spezializacia", "stil","strana"); 
$n=$_GET['$i'];
//Выполнение запроса 
$Query[0]="SELECT albom.name_albom as 'название альбома',gruppa.name_gruppa as'группа', albom.god_vipuska_albom as'год выпуска альбома', albom.kolishestvo_albom as'количество', albom.zena AS'цена', tip_albom.tip_albom as'тип альбома', f1.firma AS'фирма',f2.firma as'фирма прожади'
FROM albom JOIN gruppa ON albom.id_gruppa=gruppa.id_gruppa JOIN tip_albom ON albom.id_tip_albom=tip_albom.id_tip_albom JOIN firma as f1 ON albom.id_firma=f1.id_firma JOIN firma as f2 on albom.id_firma_prod=f2.id_firma;";
$Query[1]="SELECT firma.firma'название',firma.adres'адрес' FROM firma"; 
$Query[2]="SELECT pol.pol as'пол'FROM pol"; 
$Query[3]="SELECT gruppa.name_gruppa as'название группы', stil.stil as'стиль', strana.strana as'страна', gruppa.data_sozd_gruppa as'дата создания группы',CASE WHEN gruppa.data_rospad_gruppa IS null THEN '-' ELSE gruppa.data_rospad_gruppa END AS 'дата роспада группы' FROM gruppa JOIN stil ON gruppa.id_stil=stil.id_stil JOIN strana ON gruppa.id_strana=strana.id_strana"; 
$Query[4]="SELECT instrument.instrument as'инструмент' FROM instrument"; 
$Query[5]="SELECT tip_albom.tip_albom as'тип альбома' FROM tip_albom";
$Query[6]="SELECT ispolnitel.famili as 'фамилия',ispolnitel.name as'имя', CASE WHEN ispolnitel.othestvo is null THEN '-' ELSE ispolnitel.othestvo END AS 'отчество', pol.pol as'пол', data_rozdenii as 'дата рождения', spezializacia.spez as'специализация', instrument.instrument as'инструмент' FROM ispolnitel JOIN pol ON ispolnitel.id_pol=pol.id_pol JOIN spezializacia ON ispolnitel.id_spez=spezializacia.id_spez JOIN instrument ON ispolnitel.id_instrument=instrument.id_instrument "; 
$Query[7]="SELECT prodaza.kolishestvo as'количетсво', prodaza.data_prodaza as'дата прожади', albom.name_albom as'название альбома' FROM prodaza JOIN albom ON prodaza.id_albom=albom.id_albom "; 
$Query[8]="SELECT ispolnitel.famili as 'фамилия',ispolnitel.name as'имя',ispolnitel.othestvo as'отчество', gruppa.name_gruppa as'название группы',sostav_gruppa.v_sostave_c AS'в составе с', CASE WHEN sostav_gruppa.v_sostave_po is null THEN '-' else sostav_gruppa.v_sostave_po END AS'в составе по' FROM sostav_gruppa JOIN ispolnitel ON sostav_gruppa.id_ispolnitel=ispolnitel.id_ispolnitel JOIN gruppa ON sostav_gruppa.id_gruppa=gruppa.id_gruppa "; 
$Query[9]="SELECT spezializacia.spez as'специализация' FROM spezializacia "; 
$Query[10]="SELECT stil.stil as'музыкальный стиль' FROM stil "; 
$Query[11]="SELECT strana.strana as'страна' FROM strana "; 
if(!($dbResult = mysql_query($Query[$n],$dbLink))) 
{ 
exit;  
} 
print("<table border=\"5\" cellspacing=\"0\" align=\"center\" bgcolor=\"white\" >\n");  
//Получение информации о столбцах  
while($field = mysql_fetch_field($dbResult)) 
{ 
print("<th>$field->name</th>\n"); 
} 
printf("<td><a href=\"insert.php?id=".$id."&table=".$table[$n]. "&i=".$n."\">добавить</a></td>"); 
print("</th>\n"); 
//Извлечение записей 
while($row = mysql_fetch_row($dbResult)) 
{ 
print("<tr>\n"); 
foreach($row as $r) 
{ 
print("<td>$r&nbsp;</td>\n"); 
}
$id=$row[0];
printf("<td><a href=\"update.php?id=".$id."&table=".$table[$n]. "&i=".$n."\">изменить</a></td>");
printf("<td><a href=\"delete.php?id=".$id."&table=".$table[$n]. "&i=".$n."\" onclick='return scrDeleteElement()'  >удалить</a></td>");  
print("</tr>\n"); 
}  
print("</table>\n"); 
?> 
</div>
   </body>
   </HTML>