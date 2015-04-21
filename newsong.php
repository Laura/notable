<?php include("header.php");
$layer = $_GET["layer"];

if($layer=="add")
{

  $title=$_POST["title"];
  $artist=$_POST["artist"];
  $album=$_POST["album"];
  $link=$_POST["link"];
  $genre=$_POST["genre"];

  if($title=="" || $artist =="" || $album=="" || $link=="" ||$genre=="")
  {
    echo"<center>Error, all fields must be filled in.</center>";
  }

  else{



$host = "hostname";
$username="username";
$password="password";
$database="database";



mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "INSERT INTO songs VALUES ('','$title', '$artist','$album','$link','0','0','$genre')";
mysql_query($query);

mysql_close();
echo "<center>You have just added $title by $artist!</center>";
}

}


echo "
<div class='box' id='b'> 
   	 <form action='newsong.php?layer=add' method='post' id='NewSong'>
   	   <p><font size=8px>Share a ♪able song.</font></p>
   	   <p>
   	     <label for='Song Title2'>Song Title</label>
   	     <input type='text' name='title' id='Song Title2'>
        </p>
   	   <p>

   	     <label for='Artist'>Artist</label>
   	     <input type='text' name='artist' id='Artist'>
   	   </p>
   	   <p>
   	     <label for='Album'>Album</label>
   	     <input type='text' name='album' id='Album'>
   	   </p>
   	   <p>
   	     <label for='Youtube ID'>Youtube ID</label> <br><font size=3.5px>The youtube ID is the string of letters, numbers, and symbols found in the youtube URL. For example, 
http://www.youtube.com/watch?v=<b>JgzyIkiCDMU</b></font></br>
   	     <input type='text' name='link' id='Youtube ID'>
   	   </p>
   	   <p>
   	     <label for='Genre'>Genre</label>
   	     <select name='genre' size='1' id='Genre'>
   	       <option value='Pop'>Pop</option>
<option value='Rap'>Rap/Hip-hop/R&B</option>
<option value='Rock'>Rock</option>
<option value='Alternative'>Alternative</option>
<option value='Punk'>Punk</option>
<option value='Metal'>Metal</option>
<option value='Screamo'>Screamo/Post-hardcore/Progressive Rock</option>
<option value='Country'>Country</option>
<option value='Jazz'>Jazz/Blues</option>
<option value='Classical'>Classical</option>
<option value='Electronic'>Electro/Techno/House</option>
<option value='Soul'>Soul/Gospel</option>
<option value='Asian'>Asian</option>
<option value='Folk'>Folk</option>
<option value='Ska'>Ska/Reggae</option>
<option value='Instrumental'>Instrumental/Soundtrack</option>
<option value='NewAge'>New Age</option>
<option value='Latin'>Latin</option>
<option value='Vocal'>Vocal</option>
<option value='Other'>Other</option>
          </select>
       </p>

<input type='submit' value='Submit'>
   	 </form>
        
    <!--end box-->
  	</div>

";



include("footer.php"); ?>