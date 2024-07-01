<HTML>
<HEAD>
<TITLE>Изменение записи</TITLE>
<meta charset="utf-8">
<link rel="stylesheet" href="my.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</HEAD>
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
$table = $_GET['table'];
$link->query('set utf8');
$link->query("set lc_time_names='ru_RU'");
$id = $_POST['id'];
$d=$_GET['i'];
$query = "UPDATE ".$table." SET ";

switch($table):
	case 'businessmans':
		$bus = $_POST['people']; $work = $_POST['work'];
		$query .= " businessman = '".$bus."', work = '".$work."' WHERE ID = ".$id;
		break;
		
	case 'contract':
		$g = $_POST['people']; $en = $_POST['w']; $n = $_POST['Hire_date']; $e= $_POST['Date_of_termination'];
		$query .= "Employee = '".$g."', Employer = '".$en."',  Hire_date = '".$n."', Date_of_termination = '".$e."' WHERE ID = ".$id;
		break;
	
	case 'gender':
		$uc = $_POST['gender']; $c = $_POST['eng']; 
		$query .= "gender = '".$uc."', eng = '".$c."' WHERE ID = ".$id;
		break;
	
	case 'home':
		$n = $_POST['street']; $t =$_POST['num']; $vi = $_POST['date_of_construction']; $tem = $_POST['date_of_demolition']; $zag = $_POST['house_plan'];
		$query .= "street = '".$n."', num = '".$t."',  date_of_construction = '".$vi."', date_of_demolition = '".$tem."', house_plan = '".$zag."' WHERE ID = ".$id;
		break;
	
	case 'home_book':
		$vid = $_POST['people']; $uc = $_POST['Date_of_stay']; $c = $_POST['Date_of_congress']; $h = $_POST['home']; 
		$query .= " Inhabitant = '".$vid."',  Date_of_stay= '".$uc."',  Date_of_congress = '".$c."', home = '".$h."' WHERE ID = ".$id;
		break;
	
	case 'parents':
		$vwd = $_POST['c']; $uqc = $_POST['m']; $cd = $_POST['f'];
		$query .= " сhild = '".$vwd."',  mother= '".$uqc."',  father = '".$cd."' WHERE ID = ".$id;
		break;
	
	
	case 'people':
		$tema = $_POST['name'];$tew = $_POST['surname'];$ma = $_POST['Date_of_birth'];$hy = $_POST['Date_of_death'];
		$query .= "name = '".$tema."', surname = '".$tew."', Date_of_birth = '".$ma."', Date_of_death = '".$hy."' WHERE ID = ".$id;
		break;
	
	case 'proportion':
		$te = $_POST['w'];$tep = $_POST['Businessmans'];$pa = $_POST['Proportion'];
		$query .= "Coopirative = '".$te."', Businessman = '".$tep."', Proportion = '".$pa."' WHERE ID= ".$id;
		break;
	
	case 'street':
		$uk = $_POST['name']; 
		$query .= "name = '".$uk."' WHERE ID = ".$id;
		break;
	
		case 'work':
		$pc = $_POST['name']; $lc = $_POST['Description']; 
		$query .= "name = '".$pc."', Description = '".$lc."' WHERE ID = ".$id;
		break;
	
	 
	case 'сooperative':
		$pw = $_POST['Entry_date']; $wc = $_POST['Release_date']; 
		$query .= "Entry_date = '".$pw."', Release_date = '".$wc."' WHERE ID = ".$id;
		break;
	default: $query = ""; break;
endswitch;
?>

<div class="center">
<?if(!$link->query($query)):?>
	<p class="error">#<?=$link->errno?> - <?=$link->error?></p>
<?else:?>
<?endif?>


<script language="JavaScript" type="text/javascript"> 
<!--
function GoOut(){ location="tables.php?$i=<?php echo $d;?>"; } setTimeout( "GoOut()", 0 ); 
//--> 
</script>
</div>
   </body>
   </HTML>