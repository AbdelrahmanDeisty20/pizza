<?php 

$conn = mysqli_connect("localhost","root","","deisty_pizza");
if(!$conn){
    echo"conniction is error" . mysqli_connect_error();
}

?>