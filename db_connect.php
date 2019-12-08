<?php
ob_start();

 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
     
	 $db->query("CREATE DATABASE IF NOT EXISTS `MW_POLL`");
	 
             mysqli_select_db($db,"MW_POLL"); 			 
                       
				                
                 $stableR="CREATE TABLE IF NOT EXISTS Results (id int(11) NOT NULL auto_increment,
                 District varchar(1000)NOT NULL,
                 Party varchar(30)NOT NULL,
                 Date Varchar(300)NOT NULL,
                 MAC Varchar(30)NOT NULL,PRIMARY KEY(id) )";
                              $db->query($stableR);
			
                	     							 
?>

   
                              
                                         
                                        
    