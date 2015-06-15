<?php

if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
include("strings-".$lang.".php");
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
include("strings-".$lang.".php");
}
else{
include("strings-en.php");
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (file_exists('BOLT'))
{
	echo $string['BOLT'];
	exit;
}

if (version_compare(PHP_VERSION, '5.3.10', '<'))
{
	echo"<script type=\"text/javascript\">alert('".$string['OLD_PHP_VERSION']."') </script>";
	echo $string['OLD_PHP_VERSION'];
}

function initialize(){
	global $string;
if (file_exists('BOLT'))
{
	echo $string['BOLT'];
	exit;
}
if (version_compare(PHP_VERSION, '5.3.10', '<'))
{
	echo"<script type=\"text/javascript\">alert('".$string['OLD_PHP_VERSION']."') </script>";
	echo $string['OLD_PHP_VERSION'];
}

echo"<form action=\"index.php?page=start\" method=\"post\" >
	<input type=\"hidden\" name=\"mode\" value=\"simple\">
	<div style=\"text-align:center;margin-bottom:14px;\"><h3>".$string['INSTALL_SIMPLE_TITLE']."</h3>
	<input type=\"submit\" value=\"1-Click-Installation\">
	<p>".$string['INSTALL_SIMPLE_HINT']."</p>
	</form>";
echo $string['INSTALL_WARNING'];
}
function installation($db_con){
global $db_prefix;
$sql = "CREATE TABLE IF NOT EXISTS `".$db_prefix."entries` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`datetime` datetime NOT NULL,
	`type` varchar(20) NOT NULL,
	`title` varchar(140) NOT NULL,
	`description` text NOT NULL,
	`leader` varchar(140) NOT NULL,
	`part` varchar(10000) NOT NULL,
	`max-part` smallint(6) NOT NULL,
	PRIMARY KEY (ID)
	) DEFAULT CHARSET=utf8;";	
if ($db_con->query($sql) === TRUE) {
    echo "Create Table Events successfully<br>";
} else {
    echo "Error while Installation: ".$db_con->error ."<br>";
	die;
}

$sql = "CREATE TABLE IF NOT EXISTS `".$db_prefix."modul_settings` (
	`id` smallint(5) NOT NULL AUTO_INCREMENT,
	`name` varchar(80) NOT NULL,
	`value` varchar(400) NOT NULL,
	PRIMARY KEY (ID)
	) DEFAULT CHARSET=utf8;";	
if ($db_con->query($sql) === TRUE) {
    echo "Create Table Modul_Settings successfully<br>";
} else {
    echo "Error while Installation: ".$db_con->error ."<br>";
	die;
}
$sql = "INSERT INTO `".$db_prefix."modul_settings` (`id`, `name`, `value`) VALUES
	(1, 'modul_name', 'basis'),
	(2, 'own_admin', '0'),
	(3, 'multi_lang', '1');";	
if ($db_con->query($sql) === TRUE) {
    echo "Insert Into Modul_Settings successfully<br>";
} else {
    echo "Error while Installation: ".$db_con->error ."<br>";
	die;
}

   echo "Installation successfully<br>";
$db_con->close();
echo "
<h2>Automatisch weiterleitung in 5 Sekunden</h2>
<script type=\"text/javascript\">
  setTimeout(function () { location.href = \"../../../index.php\"; }, 5000);
</script>
";

$file = fopen("./BOLT", "w") or die("Unable to creat BOLT!");
fclose($file);
}
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
