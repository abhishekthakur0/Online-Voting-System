<?php 
 ob_start();
 session_start();
 include("db_connect.php");
 //Get the ipconfig details using system commond
system('ipconfig /all');
//$_SESSION['sweetalertError']="";
// Capture the output into a variable
$mycom=ob_get_contents();
$IndexPage = FALSE;
// Clean (erase) the output buffer
ob_clean();
 
$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);
 
// Get Physical Address
$mac=substr($mycom,($pmac+36),17);

$sqlu ="SELECT * FROM Results WHERE MAC='$mac'";
                   $retrieved = mysqli_query($db,$sqlu); 
				$Macadress = mysqli_num_rows($retrieved);					                                      


?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <meta property="og:title" content="MALAWI-MOCK ELECTION" />
    <meta property="og:url" content="http://www.malawimockelection.co.nf" />
    <meta property="og:description" content="This is a non-partisan event that mimic real elections please participate">
    <meta property="og:image" content="web3.png"> 
      
   
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
  
  
  
  
  <script src="script.js"></script>
  <script src="script.responsive.js"></script>
  
<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 0px;padding-left: 0px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
  
    
footer {
    padding: 20px;
    text-align: center;
    color: black;
    
}
</style>

             
</script>

<?php if(isset($_COOKIE['Voter'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "Your back!",
                                         text: "Since you arleady voted,do you want to see how these parties are perfoming? Click results",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes,Results!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: true,
                                        closeOnCancel:true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="poll.php";
                                                     } 
                                           else {
	                                           // swal("Cancelled", "Your Proposal file is safe :)", "error");
                                             }
                                         });
                                         
                                                    });
       
                    </script>
   <?php }?>        


<?php if(isset($_SESSION['sweetalertOK'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "You have voted successfully",
                                         text: "Click Results if you want to see how this election is going",
                                         type: "success",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes,Results!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="poll.php";
                                                     } 
                                                     else{
            window.location = "index.php";
          }
                                         });
                                         
                                                    });
       
                    </script>
   <?php  session_destroy(); }?>        

 <?php if(isset($_SESSION['sweetalertError'])) {?>
<script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("NO Way...", "You have arleady voted you cant vote again!", "error");     				              
                               });
                </script>
   <?php  session_destroy(); }?>  
   
   <?php if(isset($_SESSION['sweetalertError1'])) {?>
<script type="text/javascript"> 
 $(document).ready(function(){    	
    				              sweetAlert("Voting Mistake...", "You did not select the district your are voting for try again!", "error");     				              
                               });       
                    </script>
   <?php  
   
        session_destroy();
		
    }?>        
   <?php if(isset($_SESSION['sweetalertError2'])) {?>
<script type="text/javascript"> 
 $(document).ready(function(){    	
    				              sweetAlert("Voting Mistake...", "You did not select a party your are voting for try again!", "error");     				              
                               });       
                    </script>
   <?php  
   
        session_destroy();
		
    }?>        
   
   <?php if(!(isset($_SESSION['sweetalertOK'])) && !(isset($_SESSION['sweetalertError1'])) && !(isset($_SESSION['sweetalertError2']))){?>
<script type="text/javascript"> 
           $(document).ready(function(){ 
                           var myValue = "Load";
                           swal({
  title: "Voter Verification",
  type: "input",
  text:"\nWarning : Once you click PROCEED, You have to vote else you'll lose your vote.",
  showCancelButton: true,
  cancelButtonText: "See Results",
  cancelButtonColor: "red",
  confirmButtonColor: "green",
  confirmButtonText: "Proceed",
  closeOnConfirm: false,
  closeOnCancel: false,
  animation: "slide-from-top",
  inputPlaceholder: "Your Voter ID"
},

function(inputValue){
  
  if (inputValue === false){
    window.location = "poll.php";
  }

  if (inputValue === "") {
    swal.showInputError("You need to enter your voter ID!");
    return false
  }
  if (inputValue) {
  $.ajax({
        method: 'POST',
        data: {'voter': inputValue },
        url: 'checkVoter.php',
        success: function(data) {
          if(data === 'You Already Voted.'){
            swal({
              title: "Happy Democracy",
              text: "You Already Voted.",
              type: "success",
              showCancelButton: true,
              cancelButtonColor: "red",
              confirmButtonColor: "green",
              confirmButtonText: "See Results!",
              cancelButtonText: "No, cancel!",
              closeOnConfirm: true,
              closeOnCancel: true,
              buttonsStyling: false
        }, function(isConfirm) {
          if(isConfirm){
            window.location = "poll.php";
          }else{
            window.location = "index.php";
          }
        });
          } 
          else if(data === 'You Can Vote.'){
            swal({
              title: "Instructions",
              text: "1. Select your native state     \n\n2. Choose party of your choice\n\n3. Cast vote ",
              showCancelButton: false,
              confirmButtonColor: "green",
              confirmButtonText: "Yes,Vote!",
              closeOnConfirm: true,
              buttonsStyling: false
          },);}
          else{
            swal({
              title: "Oh !",
              text: "Your Name Is Not In Voters List. Meet Your BDO.",
              showCancelButton: true,
              cancelButtonColor: "red",
              confirmButtonColor: "green",
              confirmButtonText: "Re-enter Voter ID",
              cancelButtonText: "See Results",
              closeOnConfirm: true,
              closeOnCancel: true,
              buttonsStyling: false
        }, function(isConfirm) {
          if(isConfirm){
            window.location = "index.php";
          }else{
            window.location = "poll.php";
          }
        });
          }
        }
    });}
});
                                         
                                                    });
         
       </script>
       
 <?php   }elseif(!isset($_COOKIE['Voter'])&&$Macadress!=0){  ?>
 	
	<script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("NO Way...", "You have arleady voted you cant vote again!", "error");     				              
                               });
             </script>
	
 	
 <?php } ?>
 	
	

 
 </head>
<body>
<div id="art-main">
<header class="art-header" style="background-color: #FCFCFC;">

    <div class="art-shapes">
    <img style="margin-top: 10px; margin-left: 10px;" width="150" height="140" alt="" class="art-lightbox" src="images/eci.png" >

            </div>
<h1 class="art-headline">
   <a style="color: #FCFCFC;">Election Commission of India</a>
</h1>
<h2 class="art-slogan" style="margin-top: 15px;" >2019 General Election : Vote To Select Your PM</h2>

<marquee  scrollamount="4" style = "color:green" class="art-marquee">This election starts on 19th May 2019 and ends on 25th May 2019 : Vote India Vote !</marquee>                
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
                	<div class="art-content-layout">
    <div class="art-content-layout-row" >
    	        	
    <form method="post" action="vote.php" enctype='multipart/form-data'>       		
    <div style="margin-top:50px"></div>                          
    <div class="art-layout-cell layout-item-0" style="width: 50%" >
        <span style="font-weight: bold; font-size: 14px; font-family: 'Courier New'; margin-left:35%;">
        	Select Your State :<select style='width:220px;height:37px;border:1px solid;' name="district"  id='district' > 
            				        <option value="" disabled selected>State To Cast Your Vote</option>
            				                          
            				                            <option>Andhra Pradesh</option>
            				                           <option>Arunachal Pradesh</option>
            				                           <option>Assam</option>
            				                           <option>Bihar</option>
            				                           <option>Chhattisgarh</option>
            				                           <option>Goa</option>
            				                            <option>Gujarat</option>
            				                            <option>Haryana</option>
            				                            <option>Himachal Pradesh</option>
            				                            <option>Jharkhand</option>
            				                            <option>Karnataka</option>
							            				    <option>Kerala</option>
							            				<option>Madhya Pradesh</option>
							            				<option>Maharashtra</option>
							            				<option>Manipur</option>
							            				<option>Meghalaya</option>
							            				<option>Mizoram</option>
							            				<option>Nagaland</option>
							            				<option>Odisha</option>
							            				<option>Punjab</option>
							            				<option>Rajasthan</option>							            									            				
							            				<option>Sikkim</option>
							            				<option>Tamil Nadu</option>
							       	                    <option>Telangana</option>
							       	                    <option>Tripura</option>     				
							            				<option>Uttar Pradesh</option>
							            	            <option>Uttarakhand</option>			
							            				<option>West Bengal</option>
                                                        <option>Andaman and Nicobar Islands</option> 
                                                        <option>Chandigarh</option> 
                                                        <option>Dadra and Nagar Haveli</option> 
                                                        <option>Jammu and Kashmir</option> 
                                                        <option>Lakshadweep</option>
                                                        <option>Puducherry </option>        				          				
            				           </select>
        </span>&nbsp;   
        
        
        	<p style="text-align: left;">
        	<span style="font-weight: bold; font-family: 'Courier New'; font-size: 20px;">
        		</span>
        	</p>
        	
            <div style="margin-top:101px"></div>	  
      <table class="art-article" style="width: 100%; ">
      <tbody><tr>
      	<td style="width: 25%; "><img width="145" height="91" alt="" class="art-lightbox" src="images/bjp.jpg" radius="100%">
      <br><br><br>&nbsp;<label class="art-checkbox">
       <input type="checkbox" name="bjp"><span style="font-size: 16px; font-family: 'Times New Roman'; font-weight: bold;">BJP</span></label>
       </td>
       <td style="width: 25%; "><img width="145" height="91" alt="" class="art-lightbox" src="images/inc.jpg" ><br><label class="art-checkbox"><br><br>&nbsp;
     <input type="checkbox" name="inc"><span style="font-family: 'Times New Roman'; font-weight: bold; font-size: 16px;">INC</span></label><br>
     </td>
       <td style="width: 25%; "><img width="145" height="91" alt="" class="art-lightbox" src="images/jds.jpg" >
       <br><br><br><label class="art-checkbox"><input type="checkbox" name="jds"><span style="font-family: 'Times New Roman'; font-size: 16px; font-weight: bold;">JDS</span></label><br>
       </td>
       <td style="width: 25%; "><img width="145" height="91" alt="" class="art-lightbox" src="images/jdu.jpg" >
       <br><br><br><label class="art-checkbox"><input type="checkbox" name="jdu"><span style="font-family: 'Times New Roman'; font-size: 16px; font-weight: bold;">JDU</span></label><br>
       </td></tr>
        </tbody>
        </table>
        <div style="margin-top:50px"></div>
       <p style="text-align: left;"><span style="font-size: 14px; font-family: 'Courier New'; ">
       	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
     <span style="font-size: 14px; font-family: 'Courier New'; ">&nbsp;</span>
     
             <center><input type="submit" class="art-button" value="Cast Your Vote" id="btnvote" name="btnvote"></center> &nbsp;

   <span style="font-size: 14px; font-family: 'Courier New'; ">&nbsp;</span>
   <span style="color: rgb(255, 255, 255); "><span style="font-family: 'Courier New'; font-size: 14px;"></span></span>
   </p>
   <div style="margin-top:50px"></div>
    </div>
    </form>  
    </div>
</div>

</div>


</article></div>
                    </div>
                </div>
            </div>

    </div>
    
</div>
<footer ><p style ="margin-left: 80px;" >© Copyright Election Commission of India</p></div></footer>

</body>

</html>