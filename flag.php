<?php
$id=$_GET["id"];
$genre=$_GET["genre"];
$type = $_POST["v"];
$host = "hostname";
$username="username";
$password="password";
$database="database";
mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$cookiename="flagged" . $id;
$url="Location: showsongs.php?genre=" . $genre;

if (isset($_COOKIE[$cookiename]))
{
  mysql_close();
  header($url);
}
else
{
  setcookie($cookiename, "a", time()+60*60*24*30);
  $query="UPDATE songs SET flag=flag+1 WHERE id=$id";
  $result=mysql_query($query);

  $query="SELECT * FROM songs WHERE id=$id";
  $result=mysql_query($query);
  $flags=mysql_result($result,0,"flag");
  if($flags>10)
   { $query="DELETE FROM songs WHERE id=$id";
     $result=mysql_query($query);}
  mysql_close();
  header($url);
}
?>		