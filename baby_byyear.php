<?php

/**
 * @copyright 2015
 */



?>
<html>
<title>Baby Name</title>
<body>
<pre>
<form method="post">
Year:<select name="year" id="year" >
<option value="-1">---Select Year---</option>
<?php

require 'config.php';
$qry="select * from year";
$res=@mysql_query($qry) or die(mysql_error());
while($row=mysql_fetch_array($res))
{
    echo "<option value=$row[0]>$row[0]</option>";
}

?>
</select> Gender: <input type="radio" name="gender" value="male" required="" /> Male <input type="radio" required="" value="female" name="gender"/> Female
Top Names: <input type="radio" required="" name="topname" value="20" /> 20 <input type="radio" name="topname" value="40" />40 <input type="radio" name="topname" value="80" /> 80
<input type="reset" value="Reset" />    <input type="submit" name="find" value="Find"/>
</form>
</pre>
<hr color=228B22 />
<fieldset  >
<legend>Output</legend>

<?php
if(isset($_POST['find']))
{
    require 'config.php';
    $year= $_POST['year'];
    $gender= $_POST['gender'];
    $topname=$_POST['topname'];
    $table= $gender.'_'.$year;
    
    $qry="Select * from $table limit $topname ";
    $result=@mysql_query($qry) or die(mysql_error());
    echo "<h2 style='text-align: center; color: 228B22;'> Top $topname $gender Name of Year $year</h2>";
    echo "<br />"."Sr No."."&nbsp"."Name"."   "."Popularity"."   "."Rank";
    for($i=0;$i<$topname;$i++)
    {
        mysql_data_seek($result,$i);
        $row=mysql_fetch_array($result);
        $srno=$i+1;
        echo "<br />".$srno."   ".$row[0]."    ".$row[1]."     ".$row[2];
    }
    //echo "<br />".$row[0][1]." ".$row[0][1]." ";
}

?>

</fieldset>
<footer>Developed BY : vipul </footer>
</body>
</html>

