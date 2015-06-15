<?php

 ///Error Report Setting Start
 if ($error_report==2){
	error_reporting(E_ALL); 
	ini_set('display_errors', '1');
 }
///Error Report Setting End

///Init Installation Start
function init_install($db_con,$db_prefix){
	$path = realpath(dirname(__FILE__). '/../../');
	include_once($path.'/global.php');
	$sql = "SELECT * FROM ".$db_prefix."modul_settings";
	if ($db_con->query($sql)=== FALSE){
		echo "<h2>Installation von Modul</h2>Weiterleitung in 5 Sekunden
	<script type=\"text/javascript\">
	  setTimeout(function () { location.href = \"./modul/basis/install/index.php\"; }, 5000);
	</script>";
		die;
}
}

init_install($db_con,$db_prefix);
///Init Installation End


///Init Include current selected file start
$filename=$_SERVER['SCRIPT_NAME'];  
$path = pathinfo($filename);
$filename = $path["filename"].".".$path["extension"];
include_once(getcwd()."/modul/basis/".$path["filename"]."_include.php");
///Init Include current selected file end


function container_left($db_con,$db_prefix){
global 	$string;
	echo "
	<table>
	<thead>
	<tr>
		<th><a href=\"entry_add.php\"><img src=\"images/basis/add.png\" alt=\"add\"></a></th>
		<th>".$string['LIST_TITLE']."</th>
	</tr>
	</thead>
	</table>
<!-- Source DB-Entries -->
	<div style=\"overflow-y: scroll;\"> 
	<div style=\"display:table;\">
	<table>
	<tbody>";
	
	$db_con->set_charset("utf");
	$query = "SELECT * FROM ".$db_prefix."entries ORDER BY datetime";
	$fetch = $db_con->query($query);
	//
	
	while ($row = $fetch->fetch_assoc())
		{
			$rows[] = $row ;
		}
		
	foreach($rows as $row){
		if($row['max-part']==0)$max_part="Unbe.";
		$part="12";
		$datetime = $row['datetime'];
		$datetime = new DateTime ($datetime );
		$datetime = $datetime->format('d.m.y H')." Uhr";
		echo"
	<tr>
	<td style=\"width:24px;background-color:#FFFFFF;\"><a href=\"entry_edit.php?id=".$row['id']."\"><img src=\"images/basis/edit.png\" alt=\"edit\"></a></td>
	<td style=\"width:215px;text-align:center;background-color:#FFFFFF;\" rowspan=\"2\">
	<a href=\"entry_show.php?id=".$row['id']."\" class=\"block\" style=\"width:100%;height:100%;\">".$row['type']." ".$part."/".$max_part."<br>
	<b>".$row['title']."
	<br>".$datetime."</b></a></td>
	</tr>
	
	<tr>
	<td style=\"width:24px;background-color:#FFFFFF;\"><a href=\"entry_remove?id=".$row['id']."\"><img src=\"images/basis/delete.png\" alt=\"delete\"></a></td>
	</tr>
	";
			}
		echo "</p></div>";
	
	
	
	echo"</tbody>
	</table>
	</div>
	</div>
	";
}

function container_footer($db_con,$db_prefix){
	global $string;
	echo $string['PAGE_FOOTER']."<div style=\"float:right;\"><a href=\"?lang=de\"><img alt=\"DE\"></a><a href=\"?lang=en\"><img alt=\"EN\"></a></div>";
}
?>
