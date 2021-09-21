<?php
function check_login($con){
    if($_SESSION['user_id']){

        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id='$id' LIMIT 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    header("location: login.php");
}

function random_num($num){

    $text = "";
    if($num < 5){
        $num = 5;
    }
    $len = rand(4, $num);
    for($i=0; $i < $len; $i++){
        $text .= rand(0,9);
    }
    return $text;
}