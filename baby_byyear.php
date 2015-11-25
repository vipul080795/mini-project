<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>babyear.com</title>


<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<!--[if lt IE 9]>
<![endif]-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

</head>
<body>
<div id="container">

    <header> 
	<div class="width">
    		

		<h1><a href="">Name<strong>s</strong></a></h1>

		<nav>
	
    			<ul class="sf-menu dropdown">

			
        			<li><a href="./index.php">Home</a></li>

            			<li class="selected">

					<a href="byyear.php">Names by year</a>
            			
					<ul>
                				<li><a href="male_names.php">Boys</a></li>
						<li><a href="female_names.php">Girls</a></li>
                    				<li><a href="both_names.php">Both</a></li>
                			</ul>

            			</li>

            
				<li>

					<a href="byname.php">Popularity</a>
            				
					<ul>
                				<li><a href="#">Name</a></li>
                   				<li><a href="#">Year</a></li>
                   				<li><a href="#">Both</a></li>
                			</ul>

            			</li>
            
				<li><a href="about.html">About</a></li>
       			</ul>

			
			<div class="clear"></div>
    		</nav>
       	</div>

	<div class="clear"></div>

       
    </header>


    <div id="intro">

	<div class="width">
      
		<div class="intro-content intro-content-short">
	
                    <h2>Search By Year</h2>
                   
            	</div>
                
            </div>
            

    </div>

    <div id="body" class="width">

	<section id="content" class="two-column with-right-sidebar">

	    <article>
				
		<h3>Top Names Of the Year</h3>
            
            <fieldset>
                <legend></legend>
                <p>&nbsp;</p>
                <form  method="POST">
                    <p><label for="year">Year:</label>
                    <select name="year" id="year" >
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
</select> </p>

<p><label for="top">TOP:</label> <input type="radio" required="" name="topname" value="5" /> 5 <input type="radio" required="" name="topname" value="20" /> 20 <input type="radio" name="topname" value="40" />40 <input type="radio" name="topname" value="80" /> 80 <input type="radio" required="" name="topname" value="100" /> 100
</p>
<p><label for="gender">GENDER:</label>    <input type="radio" name="gender" value="male" required="" /> Male <input type="radio" required="" value="female" name="gender"/> Female <input type="radio" required="" value="both" name="gender"/> Both
  </p>


                    

                    <p><input name="Search" style="margin-left: 150px;" class="formbutton" value="Search" type="submit" /></p>
                </form>
            </fieldset>
            
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
            <?php
            if(isset($_POST['Search']))
            {
                 require 'config.php';
                 $year= $_POST['year'];
                 $gender= $_POST['gender'];
                 $topname=$_POST['topname'];
                 $table= $gender.'_'.$year;
                 if($gender=="both")
                 {
                    $gender = "female";
                    $table= $gender.'_'.$year;
                    $qry="Select * from $table limit $topname ";
                $result=@mysql_query($qry) or die(mysql_error());
                echo "<h3> Top $topname $gender Name of the Year $year</h3>";
                echo "<table cellspacing='0'>";
                echo "<tr><th>Number</th><th>Name</th><th>Rank</th> </tr>";
                for($i=0;$i<$topname;$i++)
                {
                     mysql_data_seek($result,$i);
                     $row=mysql_fetch_array($result);
                     $srno=$i+1;
                     echo "<tr><td>$srno</td><td>$row[0]</td><td>$row[2]</td></tr>";
                }
                echo "</table>";
                
                echo "<br /><br />";
                $gender="male";
                $table= $gender.'_'.$year;
                $qry="Select * from $table limit $topname ";
                $result=@mysql_query($qry) or die(mysql_error());
                echo "<h3> Top $topname $gender Name of the Year $year</h3>";
                echo "<table cellspacing='0'>";
                echo "<tr><th>Number</th><th>Name</th><th>Rank</th> </tr>";
                for($i=0;$i<$topname;$i++)
                {
                     mysql_data_seek($result,$i);
                     $row=mysql_fetch_array($result);
                     $srno=$i+1;
                     echo "<tr><td>$srno</td><td>$row[0]</td><td>$row[2]</td></tr>";
                }
                echo "</table>";
                    
                 }
                 else{
                    
                 
   
                $qry="Select * from $table limit $topname ";
                $result=@mysql_query($qry) or die(mysql_error());
                echo "<h3> Top $topname $gender Name of the Year $year</h3>";
                echo "<table cellspacing='0'>";
                echo "<tr><th>Number</th><th>Name</th><th>No.of births</th> </tr>";
                for($i=0;$i<$topname;$i++)
                {
                     mysql_data_seek($result,$i);
                     $row=mysql_fetch_array($result);
                     $srno=$i+1;
                     echo "<tr><td>$srno</td><td>$row[0]</td><td>$row[1]</td></tr>";
                }
                echo "</table>";
                }
            }
            ?>
                        
            

           

            <p>&nbsp;</p>

            
            

		</article>
        </section>
        
       
        
        
        <aside class="sidebar big-sidebar right-sidebar">
    
    
            <ul> 
                
               

        
                </aside>
        <div class="clear"></div>
    </div>
    <footer>
        <div class="footer-content width">
            <ul>
                <li><h4>Home</h4></li>
                <li><a href="#">HOLA</a></li>
            </ul>
            
            <ul>
                <li><h4>Names</h4></li>
                <li><a href="#">vipul</a></li>
            </ul>

        <ul>
                <li><h4>Popularity</h4></li>
                <li><a href="#">hurr</a></li>
            </ul>
            
            <ul class="endfooter">
                <li><h4>About</h4></li>
                <li> mini project 5th semester <br /><br />

<div class="social-icons">

<a href="#"><i class="fa fa-facebook fa-2x"></i></a>

<a href="#"><i class="fa fa-twitter fa-2x"></i></a>

<a href="#"><i class="fa fa-youtube fa-2x"></i></a>

<a href="#"><i class="fa fa-instagram fa-2x"></i></a>

</div>

</li>
            </ul>
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; MySite 2015. <a href="http://babynames.com/">Contact: +91-9627774445</a> designed by Vipul</p>
         </div>
    </footer>
</div>
</body>
</html>
