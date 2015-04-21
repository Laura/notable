<?php //include("header.php");
$layer = $_GET["layer"];

$FONT FACE="arial">arial font</FONT>

if($layer=="add")
{
$host = "hostname";
$username="username";
$password="password";
$database="database";

$title=$_POST["title"];
$artist=$_POST["artist"];
$album=$_POST["album"];
$link=$_POST["link"];
$genre=$_POST["genre"];

mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "INSERT INTO songs VALUES ('','$title', '$artist','$album','$link','0','0','$genre')";
mysql_query($query);

mysql_close();
echo "You have just added $title by $artist to your class! To add another song, click <a href=newsong.php>here.</a>";


}

else{
$host = "mysql6.000webhost.com";
$username="a7722267_csproj";
$password="project123";
$database="a7722267_csproj";

mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM songs";
$result=mysql_query($query);

$num=mysql_numrows($result);
mysql_close();

echo "<center><h1>Add New Song</h1>
<div>
<form action='newsong.php?layer=add' method='post'>
Song Title: <input type='text' name='title'><br>
Artist: <input type='text' name='artist'><br>
Album: <input type='text' name='album'><br>
Youtube ID: <input type='text' name='link'>
<br>
Genre:  <select name='genre'> 
<option value='pop'>Pop</option>
<option value='rap'>Rap/Hip-hop/R&B</option>
<option value='rock'>Rock</option>
<option value='alt'>Alternative</option>
<option value='pun'>Punk</option>
<option value='met'>Metal</option>
<option value='scr'>Screamo/Post-hardcore/Progressive Rock</option>
<option value='cou'>Country</option>
<option value='jaz'>Jazz/Blues</option>
<option value='cla'>Classical</option>
<option value='tec'>Electro/Techno/House</option>
<option value='sou'>Soul/Gospel</option>
<option value='kpo'>K-pop/J-pop/Mandopop</option>
<option value='fol'>Folk</option>
<option value='ska'>Ska/Reggae</option>
<option value='ins'>Instrumental/Soundtrack</option>
<option value='new'>New Age</option>
<option value='lat'>Latin</option>
<option value='voc'>Vocal</option>
<option value='other'>Other</option>
</select> <br>
<input type='Submit' value='Add Song'>
</form>
</div>
</center>";
}


//include("footer.php"); ?>