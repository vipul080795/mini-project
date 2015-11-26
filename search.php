<?php
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,'babynames')or die("error connecting to the database");
 
 $term=$_GET["term"];
