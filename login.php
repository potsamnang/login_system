<?php
include('connection.php');

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password =$_POST['password'];
  $confirmpassword =$_POST['confirmpassword'];

  $result = mysqli_query($conn,"SELECT * FROM tbstudent WHERE username = '$username' OR email = '$username'");
  $row = mysqli_fetch_assoc($result);

  if($username==="" or $password==="" or $confirmpassword===""){
    echo "
    <script>alert('please input data !')</script>
    ";
  }
  else{
    if($password===$confirmpassword){
      if(mysqli_num_rows($result)>0){
        if($password===$row["password"]){
          header('location: sigin.php');
        }
        else{
          echo "
          <script>alert('input data not match !')</script>
          ";
        }
      }
      else {
        echo "
        <script>alert('username not yet register !')</script>
        ";
      }
    }else{
      echo "
      <script>alert('incorrect password !')</script>
      ";
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
        <h1>Login</h1>
        <table>
          <tr>
            <td>Username :</td>
            <td>
              <input type="text" name="username" placeholder="enter username or email"  />
            </td>
          </tr>
          <tr>
            <td>Password :</td>
            <td>
              <input
                type="password"
                name="password"
                placeholder="enter password"
              />
            </td>
          </tr>
          <tr>
            <td>Confirm password :</td>
            <td>
              <input
                type="password"
                name="confirmpassword"
                placeholder="confirm password"
              />
            </td>
          </tr>
          
        </table> 
        <button type="submit" name="submit">Login</button>
        <a href="register.php">Don't have any account? </a>
      </form>
  </body>
</html>
