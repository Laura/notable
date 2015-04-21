<?php
$host = "hostname";
$username="username";
$password="password";
$database="database";
mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

// sql to create table
$query = "CREATE TABLE `songs` (
 `id` int(255) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
 `artist` varchar(255) COLLATE latin1_general_ci NOT NULL,
 `album` varchar(255) COLLATE latin1_general_ci NOT NULL,
 `link` varchar(255) COLLATE latin1_general_ci NOT NULL,
 `flag` varchar(255) COLLATE latin1_general_ci NOT NULL,
 `points` int(255) NOT NULL,
 `genre` varchar(255) COLLATE latin1_general_ci NOT NULL,
 PRIMARY KEY (`id`)
)";
$result=mysql_query($query);

mysql_close();

?>