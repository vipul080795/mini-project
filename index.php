<html>
<title>::Find popularity of Name::</title>
<body style="text-align: center; background-color: blanchedalmond ; backface-visibility: 50%;">
<br />
<br />
<br />
<hr color=228B22 />
<form method="Post">
<fieldset >
<legend>Welcome Guest User</legend>
<input type="radio" name="choise" required="" value="byname" /> Find Popularity & Rank Of Your Name
<br />
<input type="radio" name="choise" required="" value="byyear" /> Find Popular Name By Year
<br />
<input type="submit" value="GO" name="Go" />
</fieldset>
</form>
<hr color=red />
</body>
<?php
if(isset($_POST['Go']))
{
    $choise=$_POST['choise'];
    $page= $choise.".php";
    echo "Page Location : $page";
    header("location:./$page");
    
}
?>

</html>
