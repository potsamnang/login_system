<?php
include('connection.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email =$_POST['email'];
    $password =$_POST['password'];

    $duplicate = mysqli_query($conn,"SELECT * FROM tbstudent WHERE username='$username' OR email = '$email'");
    if($username==="" or $email==="" or $password==""){
        echo "
        <script>alert('please input data !')</script>
        ";
       
    }
    else {
        if(mysqli_num_rows($duplicate)>0){
            echo "
            <script>alert('username or email has taken !')</script>
            ";
        }
        else{
            $sql = mysqli_query($conn,"INSERT INTO tbstudent (username,email,password) VALUES ('$username','$email','$password')");
            echo "
            <script>alert('Create successfully !')</script>
            ";
             header('location: login.php');
        }
    }
    }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>interface</title>
  </head>
  <body>
      <form action="" method="post">
        <h1>Register</h1>
        <table>
          <tr>
            <td>Username :</td>
            <td>
              <input type="text" name="username" placeholder="enter username"  />
            </td>
          </tr>
          <tr>
            <td>Email :</td>
            <td>
              <input type="email" name="email" placeholder="enter email" />
            </td>
          </tr>
          <tr>
            <td>Password :</td>
            <td>
              <input
                type="password"
                name="password"
                placeholder="enter username"
              />
            </td>
          </tr>
        </table>
        <button type="submit" name="submit">Register</button>
        <a href="login.php">Alread has any account ?</a>
      </form>
  </body>
</html>
