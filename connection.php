<?php
 
 $conn = new mysqli("localhost", "root", "","author");

 if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
  }


?>