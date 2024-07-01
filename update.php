<HTML>
<HEAD>
<TITLE>Изменение записи</TITLE>
<meta charset="utf-8">
<link rel="stylesheet" href="my.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</HEAD>
<BODY background= "img/1.jpg" ;}>
<div id='cssmenu'>
<ul> 
   <li class='active'><a href='index.php'>Главная</a></li>
   <li><a href='install.php'>Создание БД</a></li>
   <li><a href='tables.php'>Таблицы</a></li>
   <li><a href='d.php'>DML-запросы</a></li>
   <li><a href='uninstall.php'>Удаление БД</a></li>
</ul>
</div>
<div class="main" style="overflow:auto;">

<?php
$link = mysqli_connect("localhost","root","", "mz");
$table=$_GET['table'];
$id=$_GET['id'];
$d=$_GET['i'];
$link->query('set names utf8');
?>

<form method="post" action="update_post.php?table=<?=$table?>&action=update_post&i=<?=$d?>">
<table>
<?php
if(isset($table)):
	switch($table):
		case 'businessmans': 
			$qwery=("SELECT id, businessman, work FROM businessmans WHERE businessmans.id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $d) = $result->fetch_row()):
				$idFromDB = $a;
				$businessmanFromDB = $b;
				$workFromDB = $d;
			endwhile;
			
			$businessmansFromDB = explode(' ', $businessmansFromDB);
			
			// `Имена`
			$query = "SELECT ID, name, surname, date_of_birth, date_of_death FROM people";
			$result = $link->query($query);
			$peopleOptions = "";
			while(list($i, $people) = $result->fetch_row()):
				$b = "";
				if($people == $peopleFromDB): $b = " selected"; endif;
				$peopleOptions .= "<option value='".$i."'".$b.">".$people."</option>";
			endwhile;
			// `Работа`
			$query = "SELECT ID, name, Description FROM work";
			$result = $link->query($query);
			$workOptions = "";
			while(list($i, $work) = $result->fetch_row()):
				$d = "";
				if($work == $workFromDB): $d = " selected"; endif;
				$workOptions .= "<option value='".$i."'".$d.">".$work."</option>";
			endwhile;?>
			
		    <tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Бизнесмены</td><td><select name="people"  size="1"<?=$peopleOptions?>></td></tr>
			<tr><td>Работа</td><td><select name="work"  size="1"<?=$workOptions?>></td></tr>
			
			<?php break;
			
			
			
			case 'contract': 
			$qwery=("SELECT id, Employee, Employer, Hire_date, Date_of_termination FROM contract WHERE contract.id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $c, $d, $s) = $result->fetch_row()):
				$idFromDB = $a;
				$EmployeeFromDB = $b;
				$EmployerFromDB = $c;
				$Hire_dateFromDB = $d;
				$Date_of_terminationFromDB = $s;
			endwhile;
			
			$contractFromDB = explode(' ', $contractFromDB);
			
			// `работник`
			$query = "SELECT ID, name, surname, date_of_birth, date_of_death FROM people";
			$result = $link->query($query);
			$peopleOptions = "";
			while(list($i, $people) = $result->fetch_row()):
				$b = "";
				if($people == $peopleFromDB): $b = " selected"; endif;
				$peopleOptions .= "<option value='".$i."'".$b.">".$people."</option>";
			endwhile;
			
			// `начальник`
			$query = "SELECT businessmans.ID, people.name as w, work FROM businessmans, people WHERE businessmans.businessman=people.ID";
			$result = $link->query($query);
			$wOptions = "";
			while(list($i, $w) = $result->fetch_row()):
				$c = "";
				if($w == $wFromDB): $c = " selected"; endif;
				$wOptions .= "<option value='".$i."'".$c.">".$w."</option>";
			endwhile;?> 
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Работник</td><td><select name="people" size="1"><?=$peopleOptions?></select></td></tr>
			<tr><td>Начальник</td><td><select name="w" size="1"><?=$wOptions?></select></td></tr>
			 <tr><td>Дата найма</td><td><input name="Hire_date" type="date" value="<?=$Hire_dateFromDB?>"></td></tr>
			 <tr><td>Дата увольнения</td><td><input name="Date_of_termination" type="date" value="<?=$Date_of_terminationFromDB?>"></td></tr>
			<?php break;
			
			
			
			
		case 'gender':
			$query = "SELECT id, gender, eng FROM gender WHERE gender.id = ".$id;
			$result = $link->query($query);
			while(list($a, $b, $c) = $result->fetch_row()):
				$idFromDB = $a;
				$genderFromDB = $b;
				$engFromDB = $c;
			endwhile;?>
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Пол</td><td><input name="gender" type="text" value="<?=$genderFromDB?>"></td></tr>
			<tr><td>English</td><td><input name="eng" type="text" value="<?=$engFromDB?>"></td></tr>
			<?break;
			
		case 'home': 
			$qwery=("SELECT id, street, num, date_of_construction, date_of_demolition, house_plan FROM home WHERE home.id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $c, $d, $s, $e) = $result->fetch_row()):
				$idFromDB = $a;
				$streetFromDB = $b;
				$numFromDB = $c;
				$date_of_constructionFromDB = $d;
				$date_of_demolitionFromDB = $s;
				$house_planFromDB = $e;
			endwhile;
			
			$homeFromDB = explode(' ', $homeFromDB);
			
			// `улицы`
			$query = "SELECT ID, name FROM street";
			$result = $link->query($query);
			$streetOptions = "";
			while(list($i, $street) = $result->fetch_row()):
				$b = "";
				if($street == $streetFromDB): $b = " selected"; endif;
				$streetOptions .= "<option value='".$i."'".$b.">".$street."</option>";
			endwhile;?> 
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Улицы</td><td><select name="street" size="1"><?=$streetOptions?></select></td></tr>
			<tr><td>Номер</td><td><input name="num" type="text" value="<?=$numFromDB?>"></td></tr>
			 <tr><td>Дата постройки</td><td><input name="date_of_construction" type="date" value="<?=$date_of_constructionFromDB?>"></td></tr>
			 <tr><td>Дата сноса</td><td><input name="date_of_demolition" type="date" value="<?=$date_of_demolitionFromDB?>"></td></tr>
			 <tr><td>План дома</td><td><input name="house_plan" type="text" value="<?=$house_planFromDB?>"></td></tr>
			<?php break;
			
		case 'home_book': 
			$qwery=("SELECT id, Inhabitant, Date_of_stay, Date_of_congress, Home FROM home_book WHERE id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $c, $d, $s) = $result->fetch_row()):
				$idFromDB = $a;
				$InhabitantFromDB = $b;
				$Date_of_stayFromDB = $c;
				$Date_of_congressFromDB = $d;
				$HomeFromDB = $s;
			endwhile;
			
			$home_bookFromDB = explode(' ', $home_bookFromDB);
			
			// `жители`
			$query = "SELECT ID, name, surname, date_of_birth, date_of_death FROM people";
			$result = $link->query($query);
			$peopleOptions = "";
			while(list($i, $people) = $result->fetch_row()):
				$b = "";
				if($people == $peopleFromDB): $b = " selected"; endif;
				$peopleOptions .= "<option value='".$i."'".$b.">".$people."</option>";
			endwhile;
			
			// `дома`
			$query = "SELECT ID, Street, Num, date_of_construction, date_of_demolition, house_plan FROM home";
			$result = $link->query($query);
			$homeOptions = "";
			while(list($i, $home) = $result->fetch_row()):
				$s = "";
				if($home == $homeFromDB): $s = " selected"; endif;
				$homeOptions .= "<option value='".$i."'".$s.">".$home."</option>";
			endwhile;?> 
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Жители</td><td><select name="people" size="1"><?=$peopleOptions?></select></td></tr>
			<tr><td>Дата вселения</td><td><input name="Date_of_stay" type="date" value="<?=$Date_of_stayFromDB?>"></td></tr>
			 <tr><td>Дата съезда</td><td><input name="Date_of_congress" type="date" value="<?=$Date_of_congressFromDB?>"></td></tr>
			 <tr><td>Дом</td><td><select name="home" size="1"><?=$homeOptions?></select></td></tr>
		
			<?php break;
	case 'parents': 
			$qwery=("SELECT id, сhild, mother, father FROM parents WHERE id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $c, $d) = $result->fetch_row()):
				$idFromDB = $a;
				$сhildFromDB = $b;
				$motherFromDB = $c;
				$fatherFromDB = $d;
			endwhile;
			
			$parentsFromDB = explode(' ', $parentsFromDB);
			
			// `ребенок`
			$query = "SELECT ID, name, surname, date_of_birth, date_of_death FROM people as c";
			$result = $link->query($query);
			$cOptions = "";
			while(list($i, $c) = $result->fetch_row()):
				$b = "";
				if($c == $cFromDB): $b = " selected"; endif;
				$cOptions .= "<option value='".$i."'".$b.">".$c."</option>";
			endwhile;
			
			// `мать`
			$query = "SELECT ID, name, surname, date_of_birth, date_of_death FROM people as m";
			$result = $link->query($query);
			$mOptions = "";
			while(list($i, $m) = $result->fetch_row()):
				$c = "";
				if($m == $mFromDB): $c = " selected"; endif;
				$mOptions .= "<option value='".$i."'".$c.">".$m."</option>";
			endwhile;
			
			// `отец`
			$query = "SELECT ID, name, surname, date_of_birth, date_of_death FROM people as f";
			$result = $link->query($query);
			$fOptions = "";
			while(list($i, $f) = $result->fetch_row()):
				$d = "";
				if($f == $fFromDB): $d = " selected"; endif;
				$fOptions .= "<option value='".$i."'".$d.">".$f."</option>";
			endwhile;?> 
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Ребенок</td><td><select name="c" size="1"><?=$cOptions?></select></td></tr>
			 <tr><td>мать</td><td><select name="m" size="1"><?=$mOptions?></select></td></tr>
			 <tr><td>отец</td><td><select name="f" size="1"><?=$fOptions?></select></td></tr>
		
			<?php break;
		
		case 'people': 
			$qwery=("SELECT id, name, surname, Date_of_birth, Date_of_death FROM people WHERE id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $c, $d, $s) = $result->fetch_row()):
				$idFromDB = $a;
				$nameFromDB = $b;
				$surnameFromDB = $c;
				$Date_of_birthFromDB = $d;
				$Date_of_deathFromDB = $s;
			endwhile;?> 
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Имена</td><td><input name="name" type="text" value="<?=$nameFromDB?>"></td></tr>
			 <tr><td>Фамилии</td><td><input name="surname" type="text" value="<?=$surnameFromDB?>"></td></tr>
			 <tr><td>Дата рождения</td><td><input name="Date_of_birth" type="date" value="<?=$Date_of_birthFromDB?>"></td></tr>
			 <tr><td>Дата смерти</td><td><input name="Date_of_death" type="date" value="<?=$Date_of_deathFromDB?>"></td></tr>

		
			<?php break;
		
			case 'proportion': 
			$qwery=("SELECT id, Coopirative, Businessman, Proportion FROM proportion  WHERE proportion.id=".$id);
			$result = $link->query($qwery);
			while(list($a, $b, $c, $d) = $result->fetch_row()):
				$idFromDB = $a;
				$CoopirativeFromDB = $b;
				$BusinessmanFromDB = $c;
				$ProportionFromDB = $d;
			endwhile;
			
			$proportionFromDB = explode(' ', $proportionFromDB);
			
			// `кооперативы`
			$query = "SELECT ID as w, Entry_date, Release_date FROM сooperative";
			$result = $link->query($query);
			$wOptions = "";
			while(list($i, $w) = $result->fetch_row()):
				$b = "";
				if($w == $wFromDB): $b = " selected"; endif;
				$wOptions .= "<option value='".$i."'".$b.">".$w."</option>";
			endwhile;
			
			// `бизнесмены`
			$query = "SELECT Businessmans.ID, people.name, work FROM Businessmans, people WHERE Businessmans.Businessman=people.ID";
			$result = $link->query($query);
			$BusinessmansOptions = "";
			while(list($i, $Businessmans) = $result->fetch_row()):
				$c = "";
				if($Businessmans == $BusinessmansFromDB): $c = " selected"; endif;
				$BusinessmansOptions .= "<option value='".$i."'".$c.">".$Businessmans."</option>";
			endwhile;?> 
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Кооперативы</td><td><select name="w" size="1"><?=$wOptions?></select></td></tr>
			 <tr><td>Бизнесмены</td><td><select name="Businessmans" size="1"><?=$BusinessmansOptions?></select></td></tr>
			 <tr><td>Пай</td><td><input name="Proportion" type="text" value="<?=$ProportionFromDB?>"></td></tr>
			
		
			<?php break;
		
		case 'street':
			$query = "SELECT id, name FROM street WHERE street.id = ".$id;
			$result = $link->query($query);
			while(list($a, $b) = $result->fetch_row()):
				$idFromDB = $a;
				$nameFromDB = $b;
			endwhile;?>
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Название</td><td><input name="name" type="text" value="<?=$nameFromDB?>"></td></tr>
			<?php break;
			
				case 'work':
			$query = "SELECT id, name, Description FROM work WHERE work.id = ".$id;
			$result = $link->query($query);
			while(list($a, $b, $c) = $result->fetch_row()):
				$idFromDB = $a;
				$nameFromDB = $b;
				$DescriptionFromDB = $c;
			endwhile;?>
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Название</td><td><input name="name" type="text" value="<?=$nameFromDB?>"></td></tr>
			<tr><td>Описание</td><td><input name="Description" type="text" value="<?=$DescriptionFromDB?>"></td></tr>
			<?php break;
			
				case 'street':
			$query = "SELECT id, name FROM street WHERE street.id = ".$id;
			$result = $link->query($query);
			while(list($a, $b) = $result->fetch_row()):
				$idFromDB = $a;
				$nameFromDB = $b;
			endwhile;?>
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Название</td><td><input name="name" type="text" value="<?=$nameFromDB?>"></td></tr>
			<?php break;
			
				case 'сooperative':
			$query = "SELECT id, Entry_date, Release_date FROM сooperative WHERE сooperative.id = ".$id;
			$result = $link->query($query);
			while(list($a, $b, $c) = $result->fetch_row()):
				$idFromDB = $a;
				$Entry_dateFromDB = $b;
				$Release_dateFromDB = $c;
			endwhile;?>
			
			<tr><td>ID</td><td><input name="id" type="text" value="<?=$idFromDB?>" readonly></td></tr>
			<tr><td>Дата создания</td><td><input name="Entry_date" type="date" value="<?=$Entry_dateFromDB?>"></td></tr>
			<tr><td>Дата выхода</td><td><input name="Release_date" type="date" value="<?=$Release_dateFromDB?>"></td></tr>
			<?php break;
			
		default: break;
	endswitch;
endif;
?>
</table>
<input type="submit" value="Изменить">
</form>
</div>
   </body>
   </HTML>