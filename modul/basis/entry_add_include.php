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
	global 	$string;
	echo"<section class=\"section\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"./modul/basis/style.css\">
	
	<fieldset>
	<legend><h2>".$string['ENTRY_ADD_TITLE']."</h2></legend>
	<form name='entry_add' action='entry_add_send.php' method='Post'>
	
	<table style=\"width: 100%;\">
	<tr><td>".$string['ENTRY_ADD_NAME'].":</td> <td><input name=\"db\" type=\"text\" required></td></tr>
	<tr><td>".$string['ENTRY_ADD_TYPE'].":</td> <td><select name='status'>
		<option value='type1' selected='selected'>Type 1</option>
		<option value='type2'>Type 2</option>
	</select>
	</td></tr>
	<tr><td>".$string['ENTRY_ADD_LEADER'].":</td> <td><input name=\"db\" type=\"text\" required><span id='hint'><a class='linkfarbe2'>[?]<span>Ihr Name wird benuzt,<br> wenn Sie das Feld leer lassen.</span></a></span></td></tr>
	<tr><td>".$string['ENTRY_ADD_DATE'].":</td> <td><input name='datum' type='date' value='".date('Y-m-d')."' min='2015-01-01' max='2020-01-01' required></td></tr>
	<tr><td>".$string['ENTRY_ADD_MAX_PART'].":</td> <td><input name='max-part' type='text' maxlength='5' required></td></tr>
	<tr><td></td> <td><br><br></td></tr>
	<tr><td>".$string['ENTRY_ADD_DESCRIPTION'].":</td> <td><textarea></textarea></td></tr>
	</table>
	</form>
	<h2><a href='#' onclick='document.entry_add.submit();' class=\"block\" style=\"height:40px;line-height:40px;width:100%;text-align:center;\">Senden</a></h2>
	</fieldset>
	</section>";

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

<p>Dieses Programm ist freie Software. Sie k�nnen es unter den Bedingungen der GNU General Public License,
wie von der Free Software Foundation ver�ffentlicht, weitergeben und/oder modifizieren,
entweder gem�� Version 3 der Lizenz oder (nach Ihrer Option) jeder sp�teren Version.</p>

<p>Die Ver�ffentlichung dieses Programms erfolgt in der Hoffnung, da� es Ihnen von Nutzen sein wird,
aber OHNE IRGENDEINE GARANTIE, sogar ohne die implizite Garantie der MARKTREIFE oder
der VERWENDBARKEIT F�R EINEN BESTIMMTEN ZWECK. Details finden Sie in der GNU General Public License.</p>

<p>Sie sollten ein Exemplar der GNU General Public License zusammen mit diesem Programm erhalten haben. Falls nicht, siehe <http://www.gnu.org/licenses/>.</p>

<p>Der Quellcode ist zur Zeit nicht verf�gbar zum Download. Um den Quellcode zu bekommen kontaktiere mich.</p>

<p>Thanks to the Notepad++ Team!</p>*/
?>
