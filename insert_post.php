<HTML>
<HEAD>
<TITLE>Добавление записи</TITLE>
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
<div class="main">
<?php
$link = mysqli_connect('localhost', 'root', '', 'mz');
$table = $_GET['table'];
$link->query('set names utf8');
$id = $_POST['id'];
$d=$_GET['i'];
$query = "INSERT INTO ".$table." VALUES (NULL, ";
switch($table):
	case 'businessmans':
		$bus = $_POST['people']; $work = $_POST['work'];
		$query .= "'".$bus."', '".$work."')";
		break;
		
	case 'contract':
		$g = $_POST['people']; $en = $_POST['businessmans']; $n = $_POST['Hire_date']; $e= $_POST['Date_of_termination'];
		$query .= "'".$g."', '".$en."',  '".$n."',  '".$e."' )";
		break;
	
	case 'gender':
		$uc = $_POST['gender']; $c = $_POST['eng']; 
		$query .= "'".$uc."', '".$c."' )";
		break;
	
	case 'home':
		$n = $_POST['street']; $t =$_POST['num']; $vi = $_POST['date_of_construction']; $tem = $_POST['date_of_demolition']; $zag = $_POST['house_plan'];
		$query .= "'".$n."',  '".$t."',  '".$vi."', '".$tem."', '".$zag."' )";
		break;
	
	case 'home_book':
		$vid = $_POST['people']; $uc = $_POST['Date_of_stay']; $c = $_POST['Date_of_congress']; $h = $_POST['home']; 
		$query .= "'".$vid."', '".$uc."',  '".$c."', '".$h."' )";
		break;
		
		
	case 'parents':
		$vwd = $_POST['c']; $uqc = $_POST['m']; $cd = $_POST['f'];
		$query .= "'".$vwd."', '".$uqc."', '".$cd."' )";
		break;
	
	case 'people':
		$tema = $_POST['name'];$tew = $_POST['surname'];$ma = $_POST['Date_of_birth'];$hy = $_POST['Date_of_death'];
		$query .= "'".$tema."', '".$tew."', '".$ma."', '".$hy."' )";
		break;
	
	case 'proportion':
		$te = $_POST['w'];$tep = $_POST['Businessmans'];$pa = $_POST['Proportion'];
		$query .= "'".$te."', '".$tep."', '".$pa."' = ".$id;
		break;
	
	case 'street':
		$uk = $_POST['name']; 
		$query .= "'".$uk."' )";
		break;
	
		case 'work':
		$pc = $_POST['name']; $lc = $_POST['Description']; 
		$query .= "'".$pc."', '".$lc."' )";
		break;
	
	 
	case 'сooperative':
		$pw = $_POST['Entry_date']; $wc = $_POST['Release_date']; 
		$query .= "'".$pw."', '".$wc."' )";
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


</div>
   </body>
   </HTML>