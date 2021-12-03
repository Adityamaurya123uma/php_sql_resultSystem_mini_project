<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srgs";

$con = mysqli_connect($servername,$username,$password,$dbname);

if($con){
    echo "Conection successful";
}else{
    die("Connection failed because ".mysqli_connect_error());
}
?>