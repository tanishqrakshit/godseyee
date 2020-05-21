<?php

$api='af972f0f23c21296b433526ee7137f54';

if (isset($_POST['find'])) {

	$source=$_POST['source'];

	// $duration=$_POST['duration'];

	


	$url="http://indianrailapi.com/api/v2/LiveStation/apikey/$api/StationCode/$source/hours/4/";

$content=file_get_contents($url);
$json=json_decode($content,true);
$res=$json['ResponseCode'];
echo "<br>Res=".$res." <br>";
  
  if ($res!=200)

{

	 echo "unable to load";

  }

  else

  {
   $Status=$json['Status'];   

  
  }

	

}







?>



<!DOCTYPE html>

<html>

<head>

  <title>Home||God's Eye</title>

  <link rel="stylesheet" type="text/css" href="../css/style1.css">

  <link rel="stylesheet" type="text/css" href="../css/w3.css">
  <link rel="stylesheet" type="text/css" href="../css/font.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/hover.css">



</head>

<body>


<!-- Navbar -->

<div class="w3-top">

  <div class="w3-bar w3-white w3-card">

    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-train"></i></a>

    <a href="../index.html" class="w3-bar-item w3-light-gray w3-button w3-padding-large"><i class="fa fa-align-justify"></i> Home</a>

    <a href="../contact.html" class="w3-bar-item w3-button w3-right w3-padding-large w3-hide-small">Contact Us</a>

    <a href="../about.html" class="w3-bar-item w3-button w3-right w3-padding-large w3-hide-small">About Us</a>

    

   

  </div>

</div>



<div class="a">

  <h5 class="w3-center t1">GOD'S EYE <i class="fa fa-eye"></i></h5>
  <br><br>

<h3 class="type h1" ></h3>
</div>



<div class="body">
<div class="w3-card w3-margin-top w3-round-large"  style="background: white;margin-left:10%;margin-right: 10%">

   
      
      <header class="w3-container w3-round-large b2">

        <h1 class="t2"><b>UpComing  Trains on <?php echo $source; ?> <i class="fa fa-money"></i></b></h1>

      </header>

<table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Serial No </th>
        <th>Train Name/Number</th>
        <th>Schedule Arrival/Expected Arrival</th>
        <th>Schedule Departure /Expected Departure</th>
        <th>Delay In Arrival</th>
        
      </tr>
    </thead>
    <?php
$i=0;
while (isset($json['Trains'][$i]['Name'])) {
    ?>
    <tr>
      <td><?php echo $i+1 ;?></td>
      <td><?php echo $json['Trains'][$i]['Name']."/<b class='w3-green'>".$json['Trains'][$i]['Number'];?></td>
      <td><?php echo $json['Trains'][$i]['ScheduleArrival']."/<b class='w3-red'>".$json['Trains'][$i]['ExpectedArrival'];?></td>
      <td><?php echo $json['Trains'][$i]['ScheduleDeparture']."/ <b class='w3-red'>".$json['Trains'][$i]['ExpectedDeparture'];?></td>
      <td><?php echo $json['Trains'][$i]['DelayInArrival'];?></td>

    </tr>
    <?php
     $i++;

    }
  ?>
   
  </table>
</div>

</div>

</body>

<script type="text/javascript">

  // Used to toggle the menu on small screens when clicking on the menu button

function myFunction() {

  var x = document.getElementById("navDemo");

  if (x.className.indexOf("w3-show") == -1) {

    x.className += " w3-show";

  } else { 

    x.className = x.className.replace(" w3-show", "");

  }

}

</script>

<script type="text/javascript" src="../js/particles.js"></script>

<script type="text/javascript" src="../js/app.js"></script>



</html>