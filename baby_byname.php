<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>byname.com</title>


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
            

        <h1><a href="index.php">Name<strong>s</strong></a></h1>

        <nav>
    
                <ul class="sf-menu dropdown">

            
                    <li><a href="index.php">Home</a></li>

                        <li>

                    <a href="byyear.php">Names by year</a>
                        
                    <ul>
                                <li><a href="male_names.php">Boys</a></li>
                        <li><a href="female_names.php">Girls</a></li>
                                    <li><a href="both_names.php">Both</a></li>
                            </ul>

                        </li>

            
                <li class="selected">

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
    
                    <h2>Search By Name</h2>
                   
                </div>
                
            </div>
            

    </div>

    <div id="body" class="width">

    <section id="content" class="two-column with-right-sidebar">

        <article>
                
        <h3>Popularity Of Name</h3>
            
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
                     <p><label for="name">Name:</label>
                    <input name="name" id="name" value="" required="" type="text" /></p>

                   <p><label for="gender">Gender:</label>    <input type="radio" name="gender" value="male" required="" /> Male <input type="radio" required="" value="female" name="gender"/> Female 
  </p>


                     

                    <p><input name="Popularity" style="margin-left: 150px;" class="formbutton" value="Popularity" type="submit"/> <input name="showgraph" style="margin-left: 150px;" class="formbutton" value="Show Graph" type="submit" /></p>

                     
                </form>
            </fieldset>
            
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <?php
            if(isset($_POST['Popularity']))
            {
                 require 'config.php';
                 $year= $_POST['year'];
                 $gender= $_POST['gender'];
                 $name=$_POST['name'];
                 $yeararr=array();
                 $popularity=array();
                 $rank=array();
                 $i=0;
                 
                 echo "<h3>Popularity Data for '$name' as $gender Name </h3><br />";
                 
                 echo "<table cellspacing='0'>";
                 echo "<tr><th>Year</th><th>Births in Year</th><th>Rank</th> </tr>";
                 for($year;$year<=2013;$year++)
                {
                     $yeararr[$i]=$year;
                     $table= $gender.'_'.$year;
    
    
                    $qry="Select * from $table where Name='$name' ";
                    $result=@mysql_query($qry) or die(mysql_error());
    
                    if(mysql_num_rows($result)>0)
                    {
                         $row=mysql_fetch_array($result);
                         $popularity[$i]=$row[1];
                         $rank[$i]=$row[2];
                          echo "<tr><td>$year</td><td>$row[1]</td><td>$row[2]</td></tr>";
                
                         //echo "<br />".$year."&nbsp &nbsp &nbsp &nbsp".$row[1]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$row[2];
        
                    }
                    else
                    {
                        echo "<tr><td>$year</td><td> 0 </td><td> 0 </td></tr>";
                        //echo "<br />".$year."&nbsp &nbsp &nbsp &nbsp".'0'."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".'0';
                        $rank[$i]=0;
                        $popularity[$i]=0;
                    }
                    $i++;
                }
                echo "</table><br /><br />";
                //echo '"<form  method="POST">"';
               // echo '<form  method="POST"><p><input name="showgraph" style="margin-left: 150px;" class="formbutton" value="Show Popularity Graph" type="submit"/></p></form>';
              
                
            }
            
            ?>
            
            
            <?php
            if(isset($_POST['showgraph']))
            {
                 require 'config.php';
                 $year= $_POST['year'];
                 $gender= $_POST['gender'];
                 $name=$_POST['name'];
                 $yeararr=array();
                 $popularity=array();
                 $rank=array();
                 $i=0;
                 
                 echo "<h3>Popularity Graph for '$name' as $gender Name </h3><br />";
                 
                 //echo "<table cellspacing='0'>";
                 //echo "<tr><th>Year</th><th>Births in Year</th><th>Rank</th> </tr>";
                 for($year;$year<=2013;$year++)
                {
                     $yeararr[$i]=$year;
                     $table= $gender.'_'.$year;
    
    
                    $qry="Select * from $table where Name='$name' ";
                    $result=@mysql_query($qry) or die(mysql_error());
    
                    if(mysql_num_rows($result)>0)
                    {
                         $row=mysql_fetch_array($result);
                         $popularity[$i]=$row[1];
                         $rank[$i]=$row[2];
                         // echo "<tr><td>$year</td><td>$row[1]</td><td>$row[2]</td></tr>";
                
                         //echo "<br />".$year."&nbsp &nbsp &nbsp &nbsp".$row[1]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$row[2];
        
                    }
                    else
                    {
                        $rank[$i]=0;
                        $popularity[$i]=0;
                    }
                    $i++;
                }
               session_start();
    $_SESSION['popularity']=$popularity;
    $_SESSION['year']=$yeararr;
    $_SESSION['name']=$name;


    echo "<img src='linechart.php' style='alignment-adjust: central; margin-left: 25%'/>";
                
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
