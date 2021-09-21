<?php

$mysqli = new mysqli('localhost' , 'root' , '' , 'CMS') or die(mysqli_error($mysqli));


//DEFAULT VALUES

$id=0;
$fname =  "";
$lname =  "";
$pname =  "";
$phone =  "";
$email =  "";
$city = "";
$street =  "";
$update = false;

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
    
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM student WHERE id=$id") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM student WHERE id=$id") or die($mysqli->error);
    if($result->num_rows){
        $row = $result->fetch_array();
        $fname =$row['fname'];
        $lname =$row['lname'];
        $pname =$row['pname'];
        $phone =$row['phone'];
        $email =$row['email'];
        $city =$row['city'];
        $street =$row['street'];

    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $pname =$_POST['pname'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $city =$_POST['city'];
    $street =$_POST['street'];

    $mysqli->query("UPDATE student SET fname='$fname', lname='$lname', pname='$pname', phone='$phone', email='$email', city='$city' ,street='$street' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been Updated";
    $_SESSION['msg_type'] = "warning";

    header("location: index.php");
}