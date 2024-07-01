<HTML>
<HEAD>
<TITLE>Структура</TITLE>
<meta charset="utf-8">
<link rel="stylesheet" href="my.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
      <script type="text/javascript" src='scr.js'></script>
</HEAD>
<div id='cssmenu'>
<ul> 
   <li class='active'><a href='index.php'>Главная</a></li>
   <li><a href='index.php'>Создание БД</a></li>
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

$sql = 'CREATE DATABASE mz';
if (mysql_query($sql, $dbLink)) {
    echo "<p>Структура базы данных успешно создана</p>\n";
} else {
    echo "<p>Ошибка при создании базы данных.</p>\n";
}

if(!mysql_select_db("mz",$dbLink))
{
print("Не могу соеденится с базой данных!<br\n>");
print(mysql_errno().":".mysql_error()."<br>\n");
exit;
}


$array=array(
1=>"CREATE TABLE IF NOT EXISTS `albom` (
  `id_albom` int(11) NOT NULL AUTO_INCREMENT,
  `name_albom` varchar(100) NOT NULL,
  `id_gruppa` int(11) NOT NULL,
   `god_vipuska_albom` date NOT NULL,
   `kolishestvo_albom` int(11) DEFAULT NULL,
   `zena` decimal(10,2)	 DEFAULT NULL,
   `id_tip_albom` int(11) NOT NULL,
   `id_firma` int(11) NOT NULL,
   `id_firma_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_albom`),
  KEY `id_gruppa` (`id_gruppa`),
  KEY `id_tip_albom` (`id_tip_albom`),
  KEY `id_firma` (`id_firma`),
  KEY `id_firma_prod` (`id_firma_prod`)
);",
    
    2=>"INSERT INTO `albom` (`id_albom`,`name_albom`,`id_gruppa`,`god_vipuska_albom`,`kolishestvo_albom`,`zena`,`id_tip_albom`,`id_firma`,`id_firma_prod`) VALUES
(1,'Оттепель',1,'2021-08-15',4,23.20,1,6,1),
(2,'Синева',6,'2021-10-28',2,5432.00,2,7,7),
(3,'Груз200',3,'2021-06-13',12,234.70,2,1,3),
(4,'SW',2,'2019-09-01',2,1213.00,1,3,3),
(5,'Recut',1,'2019-06-04',9,14.00,1,4,5),
(6,'QUESR',6,'2020-03-01',1,1314.32,2,5,6),
(7,'TIDF34',4,'2020-04-06',12,32.00,1,1,7),
(8,'Руксия',1,'2020-11-01',1,1343.00,2,1,1),
(9,'Форма3',2,'2021-01-04',14,65.74,1,7,6),
(10,'рига',6,'2020-08-03',1,111.11,1,2,1),
(11,'фрога',1,'2020-03-17',32,13123.00,2,7,7),
(12,'ринап',7,'2021-03-07',3,3212.31,1,4,8);",
    
3=>"CREATE TABLE IF NOT EXISTS `pol` (
  `id_pol` int(11) NOT NULL AUTO_INCREMENT,
  `pol` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_pol`)
);",
 4=>"
INSERT INTO `pol` (`id_pol`,`pol`) VALUES
(1,'Мужской'),
(2,'Женский');",

    5=>"CREATE TABLE IF NOT EXISTS `firma` (
  `id_firma` int(11) NOT NULL AUTO_INCREMENT,
  `firma` varchar(100) NOT NULL,
   `adres` varchar(100) NOT NULL, 
   PRIMARY KEY (`id_firma`)
);",

 6=>"
INSERT INTO `firma` (`id_firma`,`firma`,`adres`) VALUES
(1,'AKG','ул.Гвардейская,20'),
(2,'Alice','пер. Крупской, д18'),
(3,'ALISYN','Ул.Центральная, д116'),
(4,'AP Percussion','ул. Антона-Петрова,11'),
(5,'Arnolds&sons','ул.Радищева,78'),
(6,'A.Wincens','ул. Ульянова,45'),
(7,'Buffet','ул. Цапника,114а'),
(8,'www','Ул.Мира 12');",

    7=>"CREATE TABLE IF NOT EXISTS `gruppa` (
  `id_gruppa` int(11) NOT NULL AUTO_INCREMENT,
  `name_gruppa` varchar(100) NOT NULL,
  `id_stil` int(11) NOT NULL,
   `id_strana` int(11) NOT NULL,
   `data_sozd_gruppa` date NOT NULL,
   `data_rospad_gruppa` date DEFAULT NULL,
  PRIMARY KEY (`id_gruppa`),
  KEY `id_gruppa` (`id_stil`),
  KEY `id_tip_albom` (`id_strana`)
);",
    
    8=>"INSERT INTO `gruppa` (`id_gruppa`,`name_gruppa`,`id_stil`,`id_strana`,`data_sozd_gruppa`,`data_rospad_gruppa`) VALUES
(1,'AIOWA',6,1,'2019-08-04',NULL),
(2,'Verbie',5,7,'2020-06-09','2022-03-01'),
(3,'Каспийский Груз',3,1,'2022-03-01',NULL),
(4,'Nirvana',4,6,'2020-03-09',NULL),
(5,'The Killers',5,7,'2020-06-09','2021-04-20'),
(6,'Linkin Park',1,5,'2019-07-15','2021-05-05'),
(7,'Imagine Gragons',7,6,'2018-06-12','2022-03-13'),
(8,'st',1,6,'2020-12-06',NULL),
(9,'rootrd',4,5,'2020-07-07','2022-04-20'),
(10,'Молот',6,1,'2020-05-03',NULL),
(11,'Рубль',5,1,'2021-01-03','2022-07-14'),
(12,'Росы',4,3,'2019-04-08',NULL),
(13,'Мотырь',7,1,'2018-12-11','2022-10-20'),
(14,'Беломор',5,2,'2020-01-29',NULL),
(15,'Катрек',7,7,'2022-04-15',NULL);",
  
    9=>"CREATE TABLE IF NOT EXISTS `instrument` (
  `id_instrument` int(11) NOT NULL AUTO_INCREMENT,
  `instrument` varchar(100) NOT NULL,
  PRIMARY KEY (`id_instrument`)
);",
 10=>"
INSERT INTO `instrument` (`id_instrument`,`instrument`) VALUES
(1,'Бас'),
(2,'Гитара'),
(3,'Труба'),
(4,'Барабаны'),
(5,'Саксофон'),
(6,'Волторн'),
(7,'Треугольник');",

    11=>"CREATE TABLE IF NOT EXISTS `ispolnitel` (
  `id_ispolnitel` int(11) NOT NULL AUTO_INCREMENT,
  `famili` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `othestvo` varchar(100) DEFAULT NULL,
  `id_pol` int(11) NOT NULL,
   `data_rozdenii` date NOT NULL,
   `id_spez` int(11) NOT NULL,
   `id_instrument` int(11) NOT NULL,
  PRIMARY KEY (`id_ispolnitel`),
  KEY `id_pol` (`id_pol`),
  KEY `id_spez` (`id_spez`),
  KEY `id_instrument` (`id_instrument`)
);",
    
     12=>"INSERT INTO `ispolnitel` (`id_ispolnitel`,`famili`,`name`,`othestvo`,`id_pol`,`data_rozdenii`,`id_spez`,`id_instrument`) VALUES
(1,'Иванов','Сергей','Андеевич',1,'2022-03-01',7,4),
(2,'Санталов','Никита','Олегович',1,'2022-03-10',3,1),
(3,'Браун','Алиса','Сергеевна',2,'2022-03-15',5,5),
(4,'Верба','Вероника','Васильевана',2,'2021-11-08',7,6),
(5,'Штраус','Иван','Филипович',1,'2021-02-08',2,2),
(6,'Ник','Сергей','Степанович',1,'2021-02-15',4,3),
(7,'Гусев','Всеволод',NUll,1,'2022-03-20',1,7),
(8,'Ниров','Иван','Денисович',1,'2021-07-05',7,6),
(9,'Рогов','Денис','Денисович',1,'2022-04-12',1,7),
(10,'Филимонов','Николай','Инокентивич',1,'2022-07-13',7,3),
(11,'Филимонова','Светлана','Ивановна',2,'2022-11-24',8,2),
(12,'ГУсь','Валерий','Антипович',1,'2022-01-09',3,1);",
    
      13=>"CREATE TABLE IF NOT EXISTS `prodaza` (
  `id_prodaza` int(11) NOT NULL AUTO_INCREMENT,
  `kolishestvo` int(11) NOT NULL,
  `data_prodaza` date NOT NULL,
  `id_albom` int(11) NOT NULL,
  PRIMARY KEY (`id_prodaza`),
  KEY `id_albom` (`id_albom`)
);",
    
     14=>"INSERT INTO `prodaza` (`id_prodaza`,`kolishestvo`,`data_prodaza`,`id_albom`) VALUES
(1,12,'2022-06-14',6),
(2,22,'2022-03-17',3),
(3,22,'2022-04-21',5),
(4,43,'2021-08-10',1),
(5,1,'2021-01-03',2),
(6,76,'2022-05-18',4),
(7,98,'2021-02-05',10),
(8,33,'2022-03-28',7),
(9,222,'2022-04-19',11),
(10,5,'2021-01-10',4),
(11,32,'2022-05-18',8),
(12,6,'2022-03-16',12),
(13,55,'2022-05-19',8);",
    
   15=>"CREATE TABLE IF NOT EXISTS `sostav_gruppa` (
  `id_sostav_gruppa` int(11) NOT NULL AUTO_INCREMENT,
  `id_ispolnitel` int(11) NOT NULL,
  `id_gruppa` int(11) NOT NULL,
  `v_sostave_c` date NOT NULL,
  `v_sostave_po`date DEFAULT NULL,
  PRIMARY KEY (`id_sostav_gruppa`),
  KEY `id_ispolnitel` (`id_ispolnitel`),
  KEY `id_gruppa` (`id_gruppa`)
);",
    
  16=>"INSERT INTO `sostav_gruppa` (`id_sostav_gruppa`,`id_ispolnitel`,`id_gruppa`,`v_sostave_c`,`v_sostave_po`) VALUES
(1,1,7,'2020-10-04',NULL),
(2,2,1,'2021-08-08','2022-03-09'),
(3,4,3,'2019-08-11','2022-03-24'),
(4,1,4,'2020-08-02',NULL),
(5,2,2,'2021-07-11','2022-03-15'),
(6,6,7,'2022-03-08',NULL),
(7,3,5,'2022-03-06','2022-03-22'),
(8,10,8,'2020-07-05',NULL),
(9,11,12,'2022-04-04','2023-01-20'),
(10,9,14,'2021-06-06',NULL),
(11,5,15,'2022-04-03','2022-04-30'),
(12,12,1,'2022-04-03','2022-04-28'),
(13,4,7,'2022-04-03','2022-04-28'),
(14,12,4,'2021-12-13',NULL),
(15,12,11,'2021-06-07','2022-04-29'),
(16,2,10,'2022-02-06','2022-06-14'),
(17,12,13,'2022-01-02',NULL);",

     17=>"CREATE TABLE IF NOT EXISTS `spezializacia` (
  `id_spez` int(11) NOT NULL AUTO_INCREMENT,
  `spez` varchar(100) NOT NULL,
  PRIMARY KEY (`id_spez`)
);",
 18=>"
INSERT INTO `spezializacia` (`id_spez`,`spez`) VALUES
(1,'Дерижер'),
(2,'Гитарист'),
(3,'Басист'),
(4,'Трубач'),
(5,'Саксефонист'),
(6,'Барабанчик'),
(7,'Композитор'),
(8,'Руководитель');",
   
   19=>"CREATE TABLE IF NOT EXISTS `stil` (
  `id_stil` int(11) NOT NULL AUTO_INCREMENT,
  `stil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_stil`)
);",
 20=>"
INSERT INTO `stil` (`id_stil`,`stil`) VALUES
(1,'Джаз'),
(2,'Кантри'),
(3,'Шансон'),
(4,'Рок'),
(5,'Блюз'),
(6,'Хип-Хоп'),
(7,'Рэп');",
    
  21=>"CREATE TABLE IF NOT EXISTS `strana` (
  `id_strana` int(11) NOT NULL AUTO_INCREMENT,
  `strana` varchar(50) NOT NULL,
  PRIMARY KEY (`id_strana`)
);",
 22=>"
INSERT INTO `strana` (`id_strana`,`strana`) VALUES
(1,'Россия'),
(2,'Германия'),
(3,'Швеция'),
(4,'Испания'),
(5,'США'),
(6,'Норвегия'),
(7,'Англия');",
    
    23=>"CREATE TABLE IF NOT EXISTS `tip_albom` (
  `id_tip_albom` int(11) NOT NULL AUTO_INCREMENT,
  `tip_albom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tip_albom`)
);",
 24=>"
INSERT INTO `tip_albom` (`id_tip_albom`,`tip_albom`) VALUES
(1,'В наличии'),
(2,'Нет в наличии');",
 
    25=>"ALTER TABLE `albom` 
ADD CONSTRAINT `albom_ibfk_1` FOREIGN KEY (`id_tip_albom`) REFERENCES `tip_albom`(`id_tip_albom`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT `albom_ibfk_2` FOREIGN KEY (`id_firma`) REFERENCES `firma`(`id_firma`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT `albom_ibfk_3` FOREIGN KEY (`id_gruppa`) REFERENCES `gruppa`(`id_gruppa`) ON DELETE RESTRICT ON UPDATE RESTRICT,   
ADD CONSTRAINT `albom_ibfk_4` FOREIGN KEY (`id_firma_prod`) REFERENCES `firma`(`id_firma`) ON DELETE RESTRICT ON UPDATE RESTRICT;", 
    
    26=>"ALTER TABLE `gruppa` 
ADD CONSTRAINT `gruppa_ibfk_1` FOREIGN KEY (`id_stil`) REFERENCES `stil`(`id_stil`) ON DELETE RESTRICT ON UPDATE RESTRICT,   
ADD CONSTRAINT `gruppa_ibfk_2` FOREIGN KEY (`id_strana`) REFERENCES `strana`(`id_strana`) ON DELETE RESTRICT ON UPDATE RESTRICT;", 
    
    27=>"ALTER TABLE `ispolnitel` 
ADD CONSTRAINT `ispolnite_ibfk_1` FOREIGN KEY (`id_spez`) REFERENCES `spezializacia`(`id_spez`) ON DELETE RESTRICT ON UPDATE RESTRICT,   
ADD CONSTRAINT `ispolnite_ibfk_2` FOREIGN KEY (`id_instrument`) REFERENCES `instrument`(`id_instrument`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT `ispolnite_ibfk_3` FOREIGN KEY (`id_pol`) REFERENCES `pol`(`id_pol`) ON DELETE RESTRICT ON UPDATE RESTRICT;", 
    
     28=>"ALTER TABLE `prodaza` 
ADD CONSTRAINT `prodaza_ibfk_1` FOREIGN KEY (`id_albom`) REFERENCES `albom`(`id_albom`) ON DELETE RESTRICT ON UPDATE RESTRICT;", 
    
    29=>"ALTER TABLE `sostav_gruppa` 
ADD CONSTRAINT `sostav_gruppa_ibfk_1` FOREIGN KEY (`id_ispolnitel`) REFERENCES `ispolnitel`(`id_ispolnitel`) ON DELETE RESTRICT ON UPDATE RESTRICT,   
ADD CONSTRAINT `sostav_gruppa_ibfk_2` FOREIGN KEY (`id_gruppa`) REFERENCES `gruppa`(`id_gruppa`) ON DELETE RESTRICT ON UPDATE RESTRICT;", 
 );

for($i=1;$i<=count($array);$i++){
$Query = $array[$i];

if(!($dbResult = mysql_query($Query,$dbLink)))
{

exit;
}};

?>
</div>
   </body>
   </HTML>
