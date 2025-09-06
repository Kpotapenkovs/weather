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

    :root{
        --base-color: rgb(243, 244, 246 );
        --base-variant: rgba(255, 255, 255, 1);
        --text-color: black;
        --secondary-text: rgba(78, 78, 78, 0);
        --primary-color: rgba(61, 76, 83, 1);
        --accent-color: rgba(0, 164, 240, 1);

    }

    .darkmode{
        --base-color: rgb(31, 41, 55 );
        --base-variant: rgba(52, 66, 83, 1);
        --text-color: rgba(255, 255, 255, 0.84);
        --secondary-text: rgba(139, 139, 139, 0.75);
        --primary-color: rgba(133, 160, 173, 1);
        --accent-color: rgba(0, 81, 119, 1);
    }

    body {
        background-color: var(--base-color);
        color: var(--text-color);
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    div1 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px var(--base-variant) solid;
        width: 97%;
        height: 60px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        gap: 30px;
        align-items: center; 
    }

        div2 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
        width: 55%;
        height: 97%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 40px;
    }

        div3 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
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

    .cta-button{
        background-color: var(--accent-color);
    }

    #theme-switch {
        display: flex;
        border-radius: 10px;
        background-color: var(--base-variant);
        justify-content: center;
        align-items: center;
        width: 4%;
        height: 50%;
        margin-left: 100px;
    }

    #theme-switch svg{
        fill: var(--primary-color);

    }

    #theme-switch svg:last-child{
        display: none;
    }

    .darkmode #theme-switch svg:first-child{
        display: none;
    }

    .darkmode #theme-switch svg:last-child{
        display: block;
    }

    </style>

    <script type="text/javascript" src="darkmode.js" defer>
    
    </script>

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

        <button id="theme-switch">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EFEFEF"><path d="M600-640 480-760l120-120 120 120-120 120Zm200 120-80-80 80-80 80 80-80 80ZM483-80q-84 0-157.5-32t-128-86.5Q143-253 111-326.5T79-484q0-146 93-257.5T409-880q-18 99 11 193.5T520-521q71 71 165.5 100T879-410q-26 144-138 237T483-80Zm0-80q88 0 163-44t118-121q-86-8-163-43.5T463-465q-61-61-97-138t-43-163q-77 43-120.5 118.5T159-484q0 135 94.5 229.5T483-160Zm-20-305Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
            
        </button>

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
  