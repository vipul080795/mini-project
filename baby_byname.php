<?php

/**
 * @copyright 2015
 */



?>
<html>
<title>Baby Name</title>

<script language="javascript">

</script>

<body align=center>

<pre>
<form method="post">
Year: <select name="year" id="year" >
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
</select>

Name: <input type="text" name="name"  list="name" placeholder="Name"/>
      <datalist id="name"> </datalist>  
Gender: <input type="radio" required="" name="gender" value="male" /> Male <input type="radio" value="female" name="gender"/> Female

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
    $name=$_POST['name'];
    echo "<h2 style='text-align: center; color: brown;'>Your Name : $name &nbsp &nbsp &nbsp &nbsp Gender: $gender</h2>";
    echo "<h3 style='text-align: center; color: brown;'>Popularity of your name given by no of births </h3>";
    echo "<hr color=red />";
    $yeararr=array();
    $popularity=array();
    echo "<h3 >Year &nbsp No. Of Birth &nbsp Rank</h3>";
    for($year;$year<=2013;$year++)
    {
    $table= $gender.'_'.$year;
    //echo $table;
    
    $qry="Select * from $table where Name='$name' ";
    $result=@mysql_query($qry) or die(mysql_error());
    //echo "<h2 style='text-align: center; color: red;'> Top $topname $gender Name of Year $year</h2>";
    //echo "<br />"."Sr No."."&nbsp"."Name"."   "."Popularity"."   "."Rank";
    if(mysql_num_rows($result)>0)
    {
        $row=mysql_fetch_array($result);
        echo "<br />".$year."&nbsp &nbsp &nbsp &nbsp".$row[1]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$row[2];
    }
    else
    {
        echo "<br />".$year."&nbsp &nbsp &nbsp &nbsp".'0'."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".'0';
    }

    }
    
    //echo "<br />".$row[0][1]." ".$row[0][1]." ";
}

?>

</fieldset>
<footer>Developed BY : Vipul </footer>
</body>
</html>

