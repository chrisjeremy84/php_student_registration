<!doctype html>
<html lang="en">
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
      <div class="container" >
    <h3>Welcome to the student portal, you may add students in the form below!</h3>
    <br>


    <?php include_once 'process.php'; ?>

    <?php
    $mysqli = new mysqli('localhost' , 'root' , '' , 'CMS') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM student") or die($mysqli->error);
    //pre_er($result);
    ?>

    <div class="row justify-center">
        <table class="table">
            <thread>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Parent name</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>city</th>
                    <th>street</th>
                    <th colspan="2" >action</th>
                </tr>
            </thread>
            <?php while($row=$result->fetch_assoc()): ?>

                <tr>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['street']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </table>
    </div> 

    <?php

    function pre_er($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    
    ?>
    <div class="row justify-content-center">
    <form action="process.php" method="post">
        
            <div class="form-group">
            <label>First Name</label>
            <input class="form-control" type='text' name='fname' placeholder="First name"/>
            </div>

            <div class="form-group">
            <label>Second Name</label>
            <input class="form-control" type='text' name='lname' placeholder="Last name"/>
            </div>

            <div class="form-group">
            <label>Parent Name</label>
            <input class="form-control" type='text' name='pname' placeholder="Parent name"/>
            </div>

            <br/>

            <div class="form-group">
            <label>Phone number</label>
            <input class="form-control" type='text' name='phone' placeholder="Phone number"/>
            </div>

            <br/>

            <div class="form-group">
            <label>Email</label>
            <input class="form-control" type='email' name='email' placeholder="someone@email.com"/>
            </div>

            <div class="form-group">
            <label>City</label>
            <input class="form-control" type='text' name='city' placeholder="city"/>
            </div>
            
            <div class="form-group">
            <label>Street</label>
            <input class="form-control" type='text' name='street' placeholder="street"/>
            </div>
            
            <br/>
            <button class="btn btn-primary" type="submit" name="save">save</button>
    </form>
    </div>
    
   
</div>
  </body>
</html>