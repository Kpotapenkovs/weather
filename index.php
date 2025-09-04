    <?php


date_default_timezone_set('Europe/Riga');

$data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");

$weatherData = json_decode($data, true);

$city = $weatherData['city']['name'];

$country = $weatherData['city']['country'];

$today = $weatherData['list'][0];


$temperature = $today['temp']['day'];

$temperature = $today['temp']['night'];

$minTemperature = $today['temp']['min'];

$maxTemperature = $today['temp']['max'];



$feelDay = $today['feels_like']['day'];

$feelNight = $today['feels_like']['night'];

$wind = $today['speed'];

$pressure = $today['pressure'];


$time = date('H');



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

    body {
        background-color: rgba(240, 240, 240, 1);
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    div1 {
        display: flex;
        background-color: white;
        border: 20px solid white;
        width: 95%;
        height: 60px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        gap: 30px;
        align-items: center; 
    }

        div2 {
        display: flex;
        background-color: white;
        border: 20px solid white;
        width: 95%;
        height: 100%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 50px;
    }

    .container {
        display: flex;
        justify-content: center;
    }

    .title {
        color: rgba(0, 164, 240, 1);
    }

    .direction {
        display: flex;
        flex-direction: column;
        gap: 1px;
    }

    

    </style>

</head>
<body>


<div class="container">

    <div1>

        <selection class="title">

        <h1 class="title">VTDT Sky</h1>

        </selection>
    

        <selection>
<?php

echo $city . ", " . $country;

?>

        </selection>

    </div1>

</div>

<div class="container">

    <div2 class="direction">
    <p>curent weather</p>

    <h3>

     <?php
     echo "local time: " . date('H:i');
     ?>   

    </h3>
    

      <?php

      echo "<h1>".$temperature . " °C </h1> " ;

    if ($time >= 6 && $time < 18){
        echo "feel like: " . $feelDay . " °C" . "☀️";
    }else{
        echo "feel like: " . $feelNight . " °C" . "🌙";
    }

      ?>  

      
    </div2>

</div>




</body>
</html>
  