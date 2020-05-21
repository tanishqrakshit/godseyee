<?php

$api='af972f0f23c21296b433526ee7137f54';

if (isset($_POST['find'])) {

  $trainnumber=$_POST['train-no'];

  $date=$_POST['date'];
  $d=strtotime($date);
  $day=date('d',$d );
  $month=date('m',$d );
  $year=2000+date('y',$d );


$url="https://indianrailapi.com/api/v2/livetrainstatus/apikey/$api/trainnumber/$trainnumber/date/$year$month$day/";

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
   $CurrentStation=$json['CurrentStation']['StationName'];
          $Code=$json['CurrentStation']['StationCode'];
          $ScheduleArrival=$json['CurrentStation']['ScheduleArrival'];
          if ($json['CurrentStation']['ActualArrival']>0) {
           $ActualArrival=$json['CurrentStation']['ActualArrival'];
          $DelayInArrival=$json['CurrentStation']['DelayInArrival'];
          }
          $ScheduleDeparture =$json['CurrentStation']['ScheduleDeparture'];
          $ActualDeparture=$json['CurrentStation']['ActualDeparture'];
          $DelayInDeparture=$json['CurrentStation']['DelayInDeparture'];

  }
}

?>


<!DOCTYPE html>

<html>

<head>

  <title>Live Train Status</title>

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

        <h1 class="t2"><b> Current Station <i class="fa fa-compass"></i></b></h1>

      </header>

      <div class="w3-container w3-xlarge">

        <p class="w3-text-black w3-large w3-serif w3-center w3-margin"><b>
          <?php  
         
          echo  "Current Station=<b class='w3-red'>".$CurrentStation."</b><br>";
          echo "Station Code=<b class='w3-red'>".$Code."</b><br>";
          echo "ScheduleArrival=<b class='w3-red'>".$ScheduleArrival."</b><br>";
            if ($json['CurrentStation']['ActualArrival']>0) {

          echo " ActualArrival=<b class='w3-red'>".$ActualArrival."</b><br>";
          echo "DelayInArrival=<b class='w3-red'>".$DelayInArrival."</b><br>";
        }
          echo "ScheduleDeparture=<b class='w3-red'>".$ScheduleDeparture."</b><br>";
          echo "ActualDeparture=<b class='w3-red'>".$ActualDeparture."</b><br>";
          echo "DelayInDeparture=<b class='w3-red'>".$DelayInDeparture."</b><br>";
          ?>
            </b>
          </p>



 </div>

      <header class="w3-container w3-round-large b2">

        <h1 class="t2"><b> Train Route<i class="fa fa-money"></i></b></h1>

      </header>

<table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Serial No </th>
        <th>Station Name</th>
        <th>Schedule Arrival/Actual Arrival</th>
        <th>Schedule Departure /Actual Departure</th>
        <th>Delay</th>
        
      </tr>
    </thead>
    <?php
$i=0;
while (isset($json['TrainRoute'][$i]['StationName'])) {
    ?>
    <tr>
      <td><?php echo $json['TrainRoute'][$i]['SerialNo'];?></td>
      <td><?php echo $json['TrainRoute'][$i]['StationName'];?></td>
      <td><?php echo $json['TrainRoute'][$i]['ScheduleArrival']."/<b class='w3-red'>".$json['TrainRoute'][$i]['ActualArrival'];?></td>
      <td><?php echo $json['TrainRoute'][$i]['ScheduleDeparture']."/ <b class='w3-red'>".$json['TrainRoute'][$i]['ActualDeparture'];?></td>
      <td><?php echo $json['TrainRoute'][$i]['DelayInArrival'];?></td>

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