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

$description = $today['weather'][0]['description'];

$humidity = $today['humidity'];

$deg = $today['deg'];

$clouds = $today['clouds'];



if ($deg > 348.75 || $deg < 11.25){

    $windDirection = "N";

} else if ($deg > 11.25 && $deg < 33.75){

    $windDirection = "NNE";

} else if ($deg > 33.75 && $deg < 56.25){

    $windDirection = "NE";

} else if ($deg > 56.25 && $deg < 78.75){

    $windDirection = "ENE";

} else if ($deg > 78.75 && $deg < 101.25){

    $windDirection = "E";

} else if ($deg > 101.25 && $deg < 123.75){

    $windDirection = "ESE";

} else if ($deg > 123.75 && $deg < 146.25){

    $windDirection = "SE";

} else if ($deg > 146.25 && $deg < 168.75){

    $windDirection = "SSE";
} else if ($deg > 168.75 && $deg < 191.25){

    $windDirection = "S";

} else if ($deg > 191.25 && $deg < 213.75){

    $windDirection = "SSW";

} else if ($deg > 213.75 && $deg < 236.25){

    $windDirection = "SW";

} else if ($deg > 236.25 && $deg < 258.75){

    $windDirection = "WSW";

} else if ($deg > 258.75 && $deg < 281.25){

    $windDirection = "W";

} else if ($deg > 281.25 && $deg < 303.75){

    $windDirection = "WNW";

} else if ($deg > 303.75 && $deg < 326.25){

    $windDirection = "NW";

} else if ($deg > 326.25 && $deg < 348.75){

    $windDirection = "NNW";

}

$time = date('H');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

    body {
        background-color: rgb(243 244 246 );
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    div1 {
        display: flex;
        background-color: white;
        border: 20px solid white;
        width: 97%;
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
        width: 55%;
        height: 97%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 40px;
    }

        div3 {
        display: flex;
        background-color: white;
        border: 20px solid white;
        width: 15%;
        height: 40%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 30px;
        margin-right: 50px;
        align-items: left;
        flex-direction: column; 
    }

    .container {
        display: flex;
        justify-content: left;
    }

    .container2 {
        display: flex;
        justify-content: left;
        height: 300px;
        flex-direction: column;
    }



    .container3 {
        display: flex;
        justify-content: left;
    }

        .container4 {
        display: flex;
        justify-content: left;
    }

    .title {
        color: rgba(0, 164, 240, 1);
    }

    .direction {
        display: flex;
        flex-direction: column;
        gap: 1px;
    }

    * {
        margin-left: 5px;
    }
    
    .text-size{
        font-size: 50px;
    }

        .text-size2{
        font-size: 20px;
    }

    .text-order{
        margin-left: 40px;
    }

        .text-order2{
        margin-left: -70px;
        margin-top: 20px;
    }

    .text-order3{
        align-items: flex-end;
        margin-top: 5px;
    }

    .text-order4{
        margin-left: -350px;
        margin-top: 60px;
    }

    .text-order5{
        margin-top: 1px;
    }

    .button{
                
    }

    </style>

</head>
<body>


<div class="container">

    <div1>

        <selection class="title">

        <h1 class="title">VTDT Sky</h1>


        <form>
        
        </form>

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
    <p class="text-order5">curent weather</p>

    <kk class="text-size2">

     <?php
     echo "local time: " . date('H:i');
     ?>   

    </kk>
    

<k class="container">

      <?php
    
      echo "<kkk class='text-size'>" .$temperature . " °C </kkk>" ;

    echo "<k class='text-order'>" . $description . "</k>";

    echo "<br>";

    if ($time >= 6 && $time < 20){
        echo "<kkkk class='text-order2'>feel like: " . $feelDay . " °C" . "☀️ </kkkk>";
    }else{
        echo "<kkkk class='text-order2'>feel like: " . $feelNight . " °C" . "🌙</kkkk>";
    }

    echo "<br><br><br><kkkkk class='text-order4'>" . "current wind direction: " . $windDirection;
      ?>  

</k>
      
    </div2>

</div>



        <div class="container2">


            <div class="container3">

            <div3>

                <?php
                echo "wind <h2 class='text-order3'>" . $wind . " m/s </h2>";
                ?>
            
            </div3>


                <div3>

                <?php
                echo "humidity <h2 class='text-order3'>" . $humidity . " % </h2>";
                ?>
            
                </div3>

            </div>



                <div class="container4">

                <div3>

                <?php
                echo "pressure <h2 class='text-order3'>" . $pressure . " ° </h2>";
                ?>

                </div3>


                    <div3>

                    <?php
                    echo "clouds <h2 class='text-order3'>" . $clouds . " % </h2>";
                    ?>

                    </div3>
            
                </div>



        </div>


</body>
</html>
  