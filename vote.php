<?php
$id=$_GET["id"];
$genre=$_GET["genre"];
$type = $_POST["v"];
$source=$_GET["source"];

$host = "hostname";
$username="username";
$password="password";
$database="database";
mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$cookiename="voted" . $id;


if($source=="home")
  $url="Location: index.php";
else
  $url="Location: showsongs.php?genre=" . $genre;

if (isset($_COOKIE[$cookiename]))
{


mysql_close();
  header($url);
}
else
{

  setcookie($cookiename, "a", time()+60*60*24*30);
  if($type=="up")
  {  $query="UPDATE songs SET points=points+1 WHERE id=$id";
  $result=mysql_query($query);}
  else if($type=="down")
{  $query="UPDATE songs SET points=points-1 WHERE id=$id";
  $result=mysql_query($query);}

mysql_close();
  header($url);
}



?>	