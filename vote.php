<?php 
 ob_start();
session_start();
include("db_connect.php"); 

//Get the ipconfig details using system commond
system('ipconfig /all');
 
// Capture the output into a variable
$mycom=ob_get_contents();
// Clean (erase) the output buffer
ob_clean();
 
$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);
$voterid = $_POST['voter'];
 
// Get Physical Address
$mac=substr($mycom,($pmac+36),17);
//Display Mac Address
//echo $mac;

$sqlu ="SELECT * FROM Results WHERE MAC='$mac'";
                    $retrieved = mysqli_query($db,$sqlu); 
					$totalvotes = mysqli_num_rows($retrieved);					                                      
                
				 
//Below is  the upload proposal button is clicked 
	if(isset($_POST['btnvote'])) 
     {
     	               
        if(1){
            	                    	
										
		if($_POST['district']!=''){											 	
   		    $district = mysqli_real_escape_string($db,$_POST['district']);			
			$bjp=mysqli_real_escape_string($db,$_POST['bjp']);
			$inc = mysqli_real_escape_string($db,$_POST['inc']);			
			$jds=mysqli_real_escape_string($db,$_POST['jds']);
			$jdu=mysqli_real_escape_string($db,$_POST['jdu']);
								 
						   
				if($bjp!='')
								{ $vote="BJP";}
				elseif($inc!='')
								{ $vote="INC";}
				elseif($jds!='')
								{ $vote="JDS";}
				elseif($jdu!='')
								{ $vote="JDU";}
				else {
                        $user="elections";					  
  	                	$_SESSION['sweetalertError2']="No district";
	                	header("Location:index.php");
					      
						    exit;		      		
						}
				 
						   		 
						  $date = date("d/m/y");
						 
               $query = "INSERT INTO Results (District,Party,Date,MAC) ".
			   "VALUES ('$district', '$vote','$date','$voterid')";
			   $result = mysqli_query($db,$query1);
                $db->query($query) or die('Error, query failed');
				//$user="elections";
				$_SESSION['sweetalertOK']="YoK";
	        	header("Location:index.php");						
				 }
				else
				{
            		$user="elections";  
  	                $_SESSION['sweetalertError1']="No district";
	                header("Location:index.php");		      		
                 }

                 }
            else{
  	                $_SESSION['sweetalertError']="Yo";
	                header("Location:index.php");		      		
	
                 }
  }
 ?>                                