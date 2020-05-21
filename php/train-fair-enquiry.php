<?php

$api='af972f0f23c21296b433526ee7137f54';

if (isset($_POST['find'])) {

	$source=$_POST['source'];
  $TrainNo=$_POST['train-no'];
  $Quota=$_POST['quota'];
	$destination=$_POST['destination'];

	// $date=$_POST['date'];

	// $ndate=date("d-m-Y", strtotime($date));



	$url="https://indianrailapi.com/api/v2/TrainFare/apikey/$api/TrainNumber/$TrainNo/From/$source/To/$destination/Quota/$Quota";

$content=file_get_contents($url);
$json=json_decode($content,true);
$res=$json['ResponseCode'];
//echo "<br>Res=".$res." <br>";
  
  if ($res!=200)

{

	 echo "unable to load";

  }

  else

  {
    $TrainNumber=$json['TrainNumber'];
$TrainName=$json['TrainName'];
$From=$json['From'];
$To=$json['To'];
$Distance=$json['Distance'];
$TrainType=$json['TrainType'];
  
  }

	

}







?>



<!DOCTYPE html>

<html>

<head>

  <title>Fair Enquiry</title>

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

<div class="w3-card w3-margin-top w3-round-large"  style="background:white;margin:10%">

     

      <header class="w3-container w3-round-large b2">

        <h1 class="t2"><b> General Info<i class="fa fa-money"></i></b></h1>

      </header>

<table class="w3-table-all">
    <thead>
      <tr >
        <th class="w3-red">Train Number </th>
        <th><?php echo $TrainNumber;?></th>
      </tr>
      <tr >
        <th class="w3-red">Train Name</th>
        <th><?php echo $TrainName;?></th>
      </tr>
      <tr >
        <th class="w3-red">Source</th>
        <th><?php echo $From;?></th>
      </tr>
      <tr >
        <th class="w3-red">Destination </th>
        <th><?php echo $To;?></th>
      </tr>
      <tr >
        <th class="w3-red">Distance </th>
        <th><?php echo $Distance;?></th>
      </tr>
      <tr >
        <th class="w3-red">Train Type </th>
        <th><?php echo $TrainType;?></th>
      </tr>
    </thead>
    </table>

    <header class="w3-container w3-round-large b2">

        <h1 class="t2"><b> Train Fares<i class="fa fa-money"></i></b></h1>

      </header>

<table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Coach</th>
        <th>Code</th>
        <th>Fare</th>
        <th>Availabelity</th>
        
      </tr>
    </thead>
    <?php
$i=0;
while (isset($json['Fares'][$i]['Name'])) {
    ?>
    <tr>
      <td><?php echo $json['Fares'][$i]['Name'];?></td>
      <td><?php echo $json['Fares'][$i]['Code'];?></td>
      <td><?php echo $json['Fares'][$i]['Fare'];?> </td>
      <td><a href="../seat-availability.html" class="w3-button w3-red">Check Seat</a></td>

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