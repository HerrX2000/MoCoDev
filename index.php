<?php
$STARTZEIT = microtime(true);
?>
<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
?>
<?php

///Init Installation or Include default Start
if((@include("global.php")) === false)
{
	header("Location: ./install/index.php");
	echo"No Global Settings - Start Installation";
	exit;
}
else
{
	require_once("global.php");
	include_once(getcwd()."/inc/include.php");
	include_once(getcwd()."/global.php");
}
if ($error_report==2)
{
error_reporting(E_ALL);
ini_set('display_errors', '1');
}
elseif ($error_report==1)
{
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
}
///Init Installation or Include default End
///inc/include.php include the modul
?>
<?php
		//Not implemented
		//cookie();
?>
<!doctype html>
<head>
<?php //$setting is filler for later data base values($setting[] source:modul/<name>/strings-<lang>.php)?>
<meta charset="utf-8">
<meta name="description" content="<?php echo $setting['SETTING_DESCRIPTION'];?>">
<meta name="keywords" content="<?php echo $setting['SETTING_KEYWORDS'];?>">
<meta name="robots" content="<?php echo $setting['SETTING_ROBOTS'];?>">
<link rel="stylesheet" type="text/css" href="<?php if(isset($setting['SETTING_STYLE']))echo $setting['SETTING_STYLE'];else echo"style/basis/style.css";?>">
<title><?php echo $setting['SETTING_TITLE'];?></title>
</head>
<body>
<div id="background">
<header id="header">
<h1><?php echo $setting['SETTING_TITLE'];?></h1>
</header>
<div id="middle">
<div id="container">
<div id="container_left">
<?php container_left($db_con,$db_prefix);
//source:modul/<name>/include>.php?>
</div>

<div id="container_right">
<?php container_right($db_con,$db_prefix);
//source:modul/<name>/include.php?>
</div>

<div id="container_center">
<?php container_center($db_con,$db_prefix);
//source:modul/<name>/include.php?>
</div>
</div>
</div>
<footer id="footer">
<?php container_footer($db_con,$db_prefix);?>
</footer>
</div>
<?php
$ENDZEIT = microtime(true);
$LAUFZEIT = $ENDZEIT - $STARTZEIT;
$LAUFZEIT = round ($LAUFZEIT, 3);
echo"
<!--
Seitenaufbaudauer: $LAUFZEIT Sekunden
-->"; 
$db_con->close();
?>
<!--<h3>	English </h3>
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

<p>Thanks to the Notepad++ Team!</p>-->