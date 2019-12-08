<?php

define('DB_SERVER','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'mw_poll');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      //apc_store('name',$_POST['voter']);
      $myusername = $_POST['voter'];
      
      $sql = "SELECT status FROM voters WHERE voterId = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      $active = $row['status'];
      //$result = $conn->query($sql);
      
    
      //$count = mysqli_num_rows($result);
     
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($active == 1) {
          echo"You Already Voted.";
          //header("location:poll.php");
      }elseif($active == 2) {
         $sql = "UPDATE voters SET status='1' WHERE voterId = '$myusername'";
         $result = mysqli_query($db,$sql);
         echo"You Can Vote.";
         //header("location:poll.php");
     }else {
         $error = "Your Name Is Not In Voters List.";
         echo"$error";
      }
   }