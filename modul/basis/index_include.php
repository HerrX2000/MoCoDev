<?php

 ///Error Report Setting Start
error_reporting(E_ALL); 
ini_set('display_errors', '1');
///Error Report Setting End

///Include Language Start
if(isset($_GET['lang']))
{
$lang = $_GET['lang'];
 
// register the session and set the cookie
$_SESSION['lang'] = $lang;
 
setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isset($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isset($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}

include_once("strings-".$lang.".php");
///Include Language End

///Container Start
function container_center($db_con,$db_prefix){
	if (isset($_GET["id_entry"])){
	global 	$string;
	echo "<!-- Source DB-Entries -->";
	$id=$_GET["id_entry"];
	echo"<section class=\"section\"><article>";
	$db_con->set_charset("utf");
	$query = "SELECT * FROM ".$db_prefix."entries WHERE id='$id' ORDER BY datetime";
	$fetch = $db_con->query($query);
	$num_rows = mysqli_num_rows($fetch);
	if(!$num_rows > 0){
		echo $string['ENTRY_DOESNT_EXIST'];
		exit;
	}
	
	
		//
	
	while ($row = $fetch->fetch_assoc())
		{
			$rows[] = $row ;
		}
		
	foreach(@$rows as $row){
		if($row['max-part']==0)$max_part="Unbegrenzt";
		echo"<h1>".$row['title']."</h1>".$row['description']."</article>";
		$part="12";
		$datetime = $row['datetime'];
		$datetime = new DateTime ($datetime );
		$datetime = $datetime->format('d.m.y H')." Uhr";
	}
	echo"</section>";
	}
	else{
	echo"<section class=\"section\"><article><h1>Start</h1></article>
</section>";
	}

	}

function container_right($db_con,$db_prefix){
global 	$string;
echo"
<div><a href=\"user.php\" class=\"block\" style=\"width:100%;height:80px;\"><p><b>".$string['MY_PROFIL']."</b></p></a></div>
<div><a href=\"user.php?p=suggestions\" class=\"block\" style=\"width:100%;height:80px;\"><p><b>".$string['MY_SUGGESTIONS']."</b></p></a></div>
<div><a href=\"newentry.php\" class=\"block\" style=\"width:100%;height:80px;\"><p><b>".$string['MY_ADD_EVENT']."</b></p></a></div>
";
}

///Container End

/*<h3>	English </h3>
<p>Moco (More Control) is a organizer software under development and part of the "FireWeb" webbased software series.</p>

<p>Copyright (C) 2014-2015 Frederik Mann</p>

<p>This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.</p>

<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.</p>

<p>You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>.</p>
		
<p>The source code is currently not available to download. To get the sourcecode contact me.</p>

<p>Thanks to the Notepad++ Team!
<br>
	
<h3>	German </h3>
<p>Moco (More Control) ist eine Terminkalender Software in Entwicklung und Teil der "FireWeb" webbasierten Softwareserie.
<br>Copyright (C) 2014-2015 Frederik Mann</p>

<p>Dieses Programm ist freie Software. Sie können es unter den Bedingungen der GNU General Public License,
wie von der Free Software Foundation veröffentlicht, weitergeben und/oder modifizieren,
entweder gemäß Version 3 der Lizenz oder (nach Ihrer Option) jeder späteren Version.</p>

<p>Die Veröffentlichung dieses Programms erfolgt in der Hoffnung, daß es Ihnen von Nutzen sein wird,
aber OHNE IRGENDEINE GARANTIE, sogar ohne die implizite Garantie der MARKTREIFE oder
der VERWENDBARKEIT FüR EINEN BESTIMMTEN ZWECK. Details finden Sie in der GNU General Public License.</p>

<p>Sie sollten ein Exemplar der GNU General Public License zusammen mit diesem Programm erhalten haben. Falls nicht, siehe <http://www.gnu.org/licenses/>.</p>

<p>Der Quellcode ist zur Zeit nicht verfügbar zum Download. Um den Quellcode zu bekommen kontaktiere mich.</p>

<p>Thanks to the Notepad++ Team!</p>*/
?>
