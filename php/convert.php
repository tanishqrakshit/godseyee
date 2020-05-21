<?php

$api='af972f0f23c21296b433526ee7137f54';

if (isset($_POST['btn1'])) {

	$text=$_POST['Search'];

	$url="http://indianrailapi.com/api/v2/StationCodeOrName/apikey/$api/SearchText/$text/";

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



if (isset($_POST['btn2'])) {

  $text=$_POST['Search'];

  $url="http://indianrailapi.com/api/v2/TrainNumberToName/apikey/$api/TrainNumber/$text/";

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

  <title>Converter</title>

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

        <h1 class="t2"><b> Result For Input <i class="w3-text-white"> <?php echo $text;?></i></b></h1>

      </header>

      <div class="w3-container w3-xlarge">

        <p class="w3-text-black w3-large w3-serif w3-center w3-margin"><b>
          <?php  
    if (isset($_POST['btn1'])) {
          $i=0;
          while (isset($json['Station'][$i]['NameEn'])) {
          echo  "English Name=<b class='w3-red'>".$json['Station'][$i]['NameEn']."</b><br>";
          echo "Hindi Name=<b class='w3-green'>".$json['Station'][$i]['NameHn']."</b><br>";
          echo "Station Code=<b class='w3-blue'>".$json['Station'][$i]['StationCode']."</b><br>";
          echo "++++++++++++++++++++++++++++++++++++++++++<br>"; 
           $i++;
          }
        }

    if (isset($_POST['btn2'])) {
         
         
          echo  "Train No.=<b class='w3-red'>".$json['TrainNo']."</b><br>";
          echo "Train Name=<b class='w3-green'>".$json['TrainName']."</b><br>";
          echo "Source Station Code=<b class='w3-blue'>".$json['Source']['Code']."</b><br>";
          echo "Source Station Code=<b class='w3-blue'>".$json['Destination']['Code']."</b><br>";

          
       
      }
          ?>
            </b>
          </p>



 </div>
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