    <?php


date_default_timezone_set('Europe/Riga');

$data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");

$weatherData = json_decode($data, true);

$time = date('H');

$city = $weatherData['city']['name'];

$country = $weatherData['city']['country'];

$today = $weatherData['list'][0];

$sunset = $today['sunset'];

$sunrise = $today['sunrise'];


$temperatureday = $today['temp']['day'];

$temperaturenight = $today['temp']['night'];

$minTemperature = $today['temp']['min'];

$maxTemperature = $today['temp']['max'];


if($time >= 6 && $time < 20){

    $temperature = $temperatureday;

}else{

    $temperature = $temperaturenight;}



$feelDay = $today['feels_like']['day'];

$feelNight = $today['feels_like']['night'];

$wind = $today['speed'];

$pressure = $today['pressure'];

$description = $today['weather'][0]['description'];

$humidity = $today['humidity'];

$deg = $today['deg'];

$clouds = $today['clouds'];

$info1 = "info1";

$info2 = "info2";

$info3 = "info3";

$info4 = "info4";

$info5 = "info5";

$info6 = "info6";

$info7 = "info7";



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


$sec = time(); 

if ($sec <= $sunrise) {
    $progress = 0;
} elseif ($sec >= $sunset) {
    $progress = 100;
} else {
    $progress = (($sec - $sunrise) / ($sunset - $sunrise)) * 100;
}


$sunrisehours = date("H:i", $sunrise);
$sunsethours = date("H:i", $sunset);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>

    :root{
        --base-color: rgb(243, 244, 246 );
        --base-variant: rgba(255, 255, 255, 1);
        --text-color: black;
        --secondary-text: rgba(196, 196, 196, 0);
        --primary-color: rgba(224, 224, 224, 1);
        --accent-color: rgba(0, 164, 240, 1);
        --button-color: rgba(33, 44, 49, 1);

    }

    .darkmode{
        --base-color: rgb(31, 41, 55 );
        --base-variant: rgba(52, 66, 83, 1);
        --text-color: rgba(255, 255, 255, 0.84);
        --secondary-text: rgba(39, 39, 39, 0.84);
        --primary-color: rgba(255, 255, 255, 0.86);
        --accent-color: rgba(0, 81, 119, 1);
        --button-color: rgba(33, 44, 49, 1);
    }

    body {
        background-color: var(--base-color);
        color: var(--text-color);
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin: 0;
    }

    divboss{
        display: inline-block;
        max-width: 55%;
        width: 100%;
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
        width: 1029px;
        height: 97%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 40px;
    }

        div3 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
        width: 100%;
        height: 40%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 30px;
        align-items: left;
        flex-direction: column;
    }

        div4 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px var(--base-variant) solid;
        width: 97%;
        height: 250px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        gap: 30px;
        align-items: center;
        justify-content: right; 

    }

    div5{
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
        width: 38%;
        height: 733px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-right: 50px;
        margin-top: -775px;
        align-items: right;
        margin-left: 10px;
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
        margin:0;
    }



    .container3 {
        display: flex;
        justify-content: left;
    }


        .container4 {
        display: flex;
        justify-content: left;
    }

    .container5{
    display: flex;
    justify-content: left;
    }

    .container6{
    display: flex;
    justify-content: right;
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
        background-color: var(--button-color);
    }

    #theme-switch {
        display: flex;
        border-radius: 10px;
        background-color: var(--button-color);
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 50%;
        margin-left: 100px;
        color: white;
        margin-left: 60%;
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

    .description{
        display: flex;
        margin-top: 5px;
        margin-left: -10px;
    }

    divc {
        width: 200px;
        aspect-ratio: 2 / 1;
        background: var(--base-variant);
        border-radius: 50% / 100% 100% 0 0;
        position: relative;
        overflow: hidden;
    }

    divc::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: conic-gradient(from 0.75turn at 50% 100%, orange calc(var(--value) * 1% / 2), grey 0);
        mask: radial-gradient(at 50% 100%,white 55%, transparent 0);
        mask-mode: alpha;
        -webkit-mask: radial-gradient(at 50% 100%, #0000 55%, #000 0);
        -webkit-mask-mode: alpha;
    }

    .sunrise{
        display: flex;
        margin-left: -75px;
        margin-top: 60px;
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

            .swiper-slide {
      font-size: 18px;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 30px;
    }
    

    @media (max-width: 1500px){


    

        div5{
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
        width: 100%;
        height: 500px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        align-items: left;
        margin-left: 10px ;
        margin-top: 30px;
        border: 0;
    }

    .container6{
    display: flex;
    justify-content: right;
    border: 0;
    }

        div2 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
        width: 100%;
        height: 97%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 40px;
    }

        div3 {
        display: flex;
        background-color: var(--base-variant);
        border: 20px solid var(--base-variant);
        width: 100%;
        height: 40%;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 10px;
        margin-top: 30px;
        align-items: left;
        flex-direction: column;
    }

        divboss{
        display: inline-block;
        max-width: 100%;
        width: 99%;
    }

    }

    



    hr{
        margin-top: 50px;
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

        <button id="theme-switch" class="cta-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EFEFEF"><path d="M600-640 480-760l120-120 120 120-120 120Zm200 120-80-80 80-80 80 80-80 80ZM483-80q-84 0-157.5-32t-128-86.5Q143-253 111-326.5T79-484q0-146 93-257.5T409-880q-18 99 11 193.5T520-521q71 71 165.5 100T879-410q-26 144-138 237T483-80Zm0-80q88 0 163-44t118-121q-86-8-163-43.5T463-465q-61-61-97-138t-43-163q-77 43-120.5 118.5T159-484q0 135 94.5 229.5T483-160Zm-20-305Z"/></svg>
        </button>

    </div1>

</div>

<divboss>

<div class="container">

    <div2 class="direction">
    <p class="text-order5">curent weather</p>

    <kk class="text-size2">

     <?php
     echo "local time: " . date('H:i');
     ?>   

    </kk>
    

<k class="container">

    <div class="description">
      <?php

      if($description == "sky is clear"){
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#a3a3a3ff"><path d="M440-760v-160h80v160h-80Zm266 110-55-55 112-115 56 57-113 113Zm54 210v-80h160v80H760ZM440-40v-160h80v160h-80ZM254-652 140-763l57-56 113 113-56 54Zm508 512L651-255l54-54 114 110-57 59ZM40-440v-80h160v80H40Zm157 300-56-57 112-112 29 27 29 28-114 114Zm283-100q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-160Z"/></svg>
        <?php
      }elseif($description == "light rain"){
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#a3a3a3ff"><path d="M558-84q-15 8-30.5 2.5T504-102l-60-120q-8-15-2.5-30.5T462-276q15-8 30.5-2.5T516-258l60 120q8 15 2.5 30.5T558-84Zm240 0q-15 8-30.5 2.5T744-102l-60-120q-8-15-2.5-30.5T702-276q15-8 30.5-2.5T756-258l60 120q8 15 2.5 30.5T798-84Zm-480 0q-15 8-30.5 2.5T264-102l-60-120q-8-15-2.5-30.5T222-276q15-8 30.5-2.5T276-258l60 120q8 15 2.5 30.5T318-84Zm-18-236q-91 0-155.5-64.5T80-540q0-83 55-145t136-73q32-57 87.5-89.5T480-880q90 0 156.5 57.5T717-679q69 6 116 57t47 122q0 75-52.5 127.5T700-320H300Zm0-80h400q42 0 71-29t29-71q0-42-29-71t-71-29h-60v-40q0-66-47-113t-113-47q-48 0-87.5 26T333-704l-10 24h-25q-57 2-97.5 42.5T160-540q0 58 41 99t99 41Zm180-200Z"/></svg>
        <?php
      }elseif($description == "few clouds"){
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#a3a3a3ff"><path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H260Zm0-80h480q42 0 71-29t29-71q0-42-29-71t-71-29h-60v-80q0-83-58.5-141.5T480-720q-83 0-141.5 58.5T280-520h-20q-58 0-99 41t-41 99q0 58 41 99t99 41Zm220-240Z"/></svg>
        <?php
      }elseif($description == "overcast clouds"){
          ?>
        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#a3a3a3ff"><path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H260Zm0-80h480q42 0 71-29t29-71q0-42-29-71t-71-29h-60v-80q0-83-58.5-141.5T480-720q-83 0-141.5 58.5T280-520h-20q-58 0-99 41t-41 99q0 58 41 99t99 41Zm220-240Z"/></svg>
        <?php
      }elseif($description == "broken clouds"){
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#a3a3a3ff"><path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H260Zm0-80h480q42 0 71-29t29-71q0-42-29-71t-71-29h-60v-80q0-83-58.5-141.5T480-720q-83 0-141.5 58.5T280-520h-20q-58 0-99 41t-41 99q0 58 41 99t99 41Zm220-240Z"/></svg>
        <?php
      }
      ?>
      </div>
      <?php
      echo "<kkk class='text-size'>" . $temperature . " °C </kkk>" ;

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

            <div3>

                <?php
                echo "visibility <h2 class='text-order3'>" . "???" . " </h2>";
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

                <div3>

                    <?php
                    echo "air quality <h2 class='text-order3'>" . "???" . " </h2>";
                    ?>

                </div3>
            
                </div>



        </div>

    <k class="container5">

        <div4>


        <p>sunrise</p>

        <h3 class="sunrise"><?php   echo $sunrisehours;?></h3>

        <divc style="--value: <?php echo $progress; ?>"></divc>

        <p>sunset</p>

        <h3 class="sunrise"><?php   echo $sunsethours; ?></h3>

        </div4>

    </k>
    </divboss>

    <k class="container6">
    

    <div5>

    <div class="swiper mySwiper">
    <div class="swiper-wrapper">
    <div class="swiper-slide">

    <h1>info1</h1>
    <hr>
    <h1>info2</h1>
    <hr>
    <h1>info3</h1>
    <hr>
    <h1>info4</h1>
    <hr>
    <h1>info5</h1>
    <hr>
    <h1>info6</h1>
    <hr>
    <h1>info7</h1>
    <hr>
    <h1>info8</h1>
    <hr>
    <h1>info9</h1>
    <hr>
    <h1>info10</h1>
    <hr>
    <h1>info11</h1>

      </div>
    <div class="swiper-pagination"></div>
    </div>

    <div class="swiper-scrollbar"></div>

  </div>
</div5>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper(".mySwiper", {
      direction: "vertical",
      slidesPerView: "auto",
      freeMode: true,
      scrollbar: {
        el: ".swiper-scrollbar",
      },
      mousewheel: true,
    });
  </script>

    

</k>
</body>
</html>
  