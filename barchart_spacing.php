<?php   
 /* CAT:Bar Chart */
session_start();
$popularity=$_SESSION['popularity'];
$year=$_SESSION['year'];
$name=$_SESSION['name'];

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");

 /* Create and populate the pData object */
 $MyData = new pData();  
 $MyData->addPoints($popularity,"$name");
 //$MyData->addPoints(array(140,0,340,300,320,300,200,100,50),"Server B");
 $MyData->setAxisName(0,"Hits");
 $MyData->addPoints($year,"Months");
 $MyData->setSerieDescription("Months","Month");
 $MyData->setAbscissa("Months");
