


<?php include("header.php");
$gen = $_GET["genre"];
$host = "hostname";
$username="username";
$password="password";
$database="database";
mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


$query="SELECT * FROM songs
  WHERE genre = '$gen'
  ORDER BY points DESC";
$result=mysql_query($query);
$num=mysql_numrows($result);
echo"<h1 class='songheader'>$gen Songs</h1>";


$i=0;


while ($i < $num) {
$id=mysql_result($result,$i,"id");
$title=mysql_result($result,$i,"title");
$link=mysql_result($result,$i,"link");
$artist=mysql_result($result,$i,"artist");
$album=mysql_result($result,$i,"album");
$flag=mysql_result($result,$i,"flag");
$points=mysql_result($result,$i,"points");

echo "
        <div class='box'> 
        <form action='vote.php?id=$id&genre=$gen' method='post'>
  <button name='v' class='button' id='up' type='submit' value='up'>Thumb Up</button>
  Votes: $points
  <button name='v' class='button' id='down' type='submit' value='down'>Thumb Down</button>
</form> 
          
<iframe id='html5Vid' class='youtube-player' type='text/html' src='http://www.youtube.com/embed/$link' frameborder='0' allowfullscreen></iframe>

      Song: $title
      <blockquote>
        Artist: $artist<br>
        Album: $album <br>
<form action='flag.php?id=$id&genre=$gen' method='post'>
 Flags: $flag  <button name='v' class='button' id='flag' type='submit' value='up'>Flag</button> 
</form>
      </blockquote>


        <!--endbox--></div>
";
$i++;
}








mysql_close();

include("footer.php"); ?>