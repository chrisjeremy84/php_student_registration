<?php

$mysqli = new mysqli('localhost' , 'root' , '' , 'CMS') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $pname =$_POST['pname'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $city =$_POST['city'];
    $street =$_POST['street'];

    $mysqli->query("INSERT INTO student(fname, lname, pname, phone, email, city, street) 
                    VALUES ('$fname', '$lname', '$pname' ,'$phone', '$email', '$city', '$street')") 
                    or die($mysqli->error);
}