<?php session_start();
				 	//setcookie("Voter",$user,time()-(3600*24*365));
 include("db_connect.php");
				 	
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

    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
  
  
  
  
  <script src="script.js"></script>
  <script src="script.responsive.js"></script>
  
  
    <script type="text/javascript" src="images/canvasjs.min.js"></script>



<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 0px;padding-left: 0px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

footer {
    padding: 20px;
    text-align: center;
    color: black;
    
}
.art-button1
{ 
  background-color:#90090B; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
   
}

</style>
<?php
     $sqluser ="SELECT * FROM Results";
     $retrieved = mysqli_query($db,$sqluser);                                       
    $totalvotes = mysqli_num_rows($retrieved);
	                 
       $sqlamend ="SELECT * FROM Results WHERE Party='BJP'";
     $retr = mysqli_query($db,$sqlamend);                                       
      $totalbjp = mysqli_num_rows($retr);
	  
	   $sqlresub ="SELECT * FROM Results WHERE Party='INC' ";
     $retrre = mysqli_query($db,$sqlresub);                                       
      $totalinc = mysqli_num_rows($retrre);
	  
	   $sqlexpd ="SELECT * FROM Results WHERE Party='JDS'";
       $retexp = mysqli_query($db,$sqlexpd);                                       
       $totaljds = mysqli_num_rows($retexp);
	   
	   $sqlc ="SELECT * FROM Results WHERE Party='JDU'";
       $retc = mysqli_query($db,$sqlc);                                       
       $totaljdu = mysqli_num_rows($retc);
	   	
  	
  	if($totalbjp!=0){$bjp=round(( $totalbjp/$totalvotes)*100);}else{$bjp=0;} //this gives the initial submissions studies percentage							
    if($totalinc!=0){$inc=round(($totalinc/ $totalvotes)*100);}else{$inc=0;}  //this gives the resubmsion studies percentage							
  	if($totaljds!=0){$jds=round(($totaljds/ $totalvotes)*100);}else{$jds=0;}//this gives the expedited studies percentage							
    if($totaljdu!=0){$jdu=round(( $totaljdu/ $totalvotes)*100);}else{$jdu=0;}  //this gives amendments studies percentage							
  	 
 	
  if($bjp>$inc &&$bjp>$jds &&$bjp>$jdu){$bjpe='true';}else{$bjpe='false';}
  if($inc>$bjp &&$inc>$jds &&$inc>$jdu ){$ince='true';}else{$ince='false';}
  if($jds>$bjp &&$jds>$inc &&$jds>$jdu){$jdse='true';}else{$jdse='false';}
  if($jdu>$bjp &&$jdu>$inc &&$jdu>$jds){$jdue='true';}else{$jdue='false';}

?>



<script type="text/javascript">

window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "Current Poll Results",
			fontSize: 30
		},
		exportFileName: "Pie Chart",
		exportEnabled: false,
                animationEnabled: true,
		legend:{
			verticalAlign: "bottom",
			horizontalAlign: "center",
			fontSize: 15,
          fontFamily: "font-family: Times New Roman",
          fontColor: "black" 
		},
		
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{name}: <strong>{y}%Votes</strong>",
			indexLabel: "{name} {y}%Votes",
			dataPoints: [
				{ y:<?php echo $bjp; ?>,
				name: "BJP",
				 color: 'Orange',
				 exploded:<?php echo $bjpe; ?>
			   },
			   
			   { y:<?php echo $inc; ?>, 
				name: "INC",
				color: 'Blue', 
				exploded:<?php echo $ince; ?>
				},
				
			{ y:<?php echo $jds; ?>, 
				name: "JDS",
			 color:'Grey',                      
		  exploded:<?php echo $jdse; ?>
		  },
		  
			{ y:<?php echo$jdu; ?>,
				 name: "JDU",
			color: 'Green',
                exploded:<?php echo$jdue; ?>
                }
	
			]
	}
	]
	});
chart.render();
function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}

}
</script>              
</script>
 
</head>
<body>
<div id="art-main">
<header class="art-header" style="background-color: #FCFCFC;">

   <div class="art-shapes">
   <img style="margin-top: 10px; margin-left: 10px;" width="150" height="140" alt="" class="art-lightbox" src="images/eci.png" >

            </div>
<h1 class="art-headline">
    <a href="/" style="color: #FCFCFC;">Election Commission of India</a>
</h1>
<h2 class="art-slogan">2019 General Election Result</h2>

<marquee  scrollamount="4"  style="color: green;" class="art-marquee">This election starts on 19th May 2019 and ends on 25th May 2019 : Vote India Vote !</marquee>                
 
 <script>             
  <span id="date_time"></span>
            <script type="text/javascript">
            window.onload = date_time('date_time');
            </script>
                            
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                        	
                                
                        <div style="margin-top:100px"></div>         
                      
                <div style="margin-left:35%" class="art-postcontent art-postcontent-0 clearfix">
                	
    <div  class="art-layout-cell layout-item-0" style="width: 50%" >
        <p>
        	 <center> 

             <div id="chartContainer" style="height: 410px; width: 100%;">
             	
             </div>
             </center>
        </p>
        <div style="margin-top:50px"></div>
</div>
        		<center><a href="index.php"class="art-button"  style="font-family: 'Times New Roman'; font-size: 16px;  font-weight: bold; ">Go back</a></center>

</div>

<div style="margin-top:50px"></div>

</div>
                    </div>
                </div>
            </div>

    </div>
    
</div>
<footer ><p style ="margin-left: 80px;" >© Copyright Election Commission of India</p></div></footer>

</body></html>