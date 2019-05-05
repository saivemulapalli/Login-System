<?php
    //get values passed from form in login.php file
    $username = $_POST['username'];
    $password = $_POST['password'];

    //to prevent mysql injection

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $abc=mysqli_connect("localhost","root","");
    $username = mysqli_real_escape_string($abc,$username);
    $password = mysqli_real_escape_string($abc,$password);

    //connect to the server and select database
    
    
    mysqli_select_db($abc,"login");

    //query the database for user

    $result=mysqli_query($abc,"select * from users where username = '$username' and password = '$password'")
               or die("failed to query database".mysqli_error($abc));
    $row = mysqli_fetch_array($result);
    if($row['username'] == $username && $row['password'] == $password){
        echo "login success!!! welcome".$row['username'];
    }else{
        echo "failed to login!";
    }
?>
    