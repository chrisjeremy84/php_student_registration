<?php
session_start();
include("connection.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username))
    {
        //READING USER FROM DATABASE
        $user_id = random_num(20);
        $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password){
                $_SESSION['user_id'] = $user_data['user_id'];
                header("location: index.php");
            }
        }
        }
        echo "WRONG USERNAME OR PASSWORD";
    }else
    {
        //IF DATA INPUT IS INCORRECT
        echo "Please enter valid information";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Student Portal!</title>
  </head>
    <body>
        <div class="container justify-content-center">
            <h3>Login</h3>
            <form class="form-group" method="POST">
                <input class="form-group" type="text" name="username">
                <br>
                <input class="form-group" type="password" name="password">
                <br>
                <button class="btn btn-info" value="login">LOGIN</button>
                <small>Don't have an account,<a href="signup.php">Sign up</a></small>
            </form>

        </div>
    </body>
</html>