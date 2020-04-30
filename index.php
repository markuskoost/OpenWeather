<?php
    $url = 'http://api.openweathermap.org/data/2.5/forecast?q=Kuressaare&units=metric&appid=44a18a01649f13fcae66f93b4f3e6af7';
    $cacheFile = './cache.json';
    $cacheTime = 300;

    if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime ) {
        $content = file_get_contents($cacheFile);
    } else {
        $content = file_get_contents($url);

        $file = fopen($cacheFile, 'w');
        fwrite($file, $content);
        fclose($cacheFile);
    }

    $json = json_decode($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenWeatherMap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="maindesc"><?php echo $json->city->name . ", " . $json->city->country?></div>
    <div class="main">
        <div class="day">
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[0]->weather[0]->icon;?>@2x.png">
            <div class="desc"><?php echo $json->list[0]->weather[0]->description;?></div>
            <div class="temp"><?php echo $json->list[0]->main->temp;?> °C</div>
            <div class="feels_like">Feels like <?php echo $json->list[0]->main->feels_like;?> °C</div>
            <div class="wind">Wind <?php echo $json->list[0]->wind->speed;?> km/h</div>
            <div class="dt"><?php echo $json->list[0]->dt_txt;?></div>
        </div>
        <div class="day">    
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[1]->weather[0]->icon;?>@2x.png">
            <div class="desc1"><?php echo $json->list[1]->weather[0]->description;?></div>
            <div class="temp1"><?php echo $json->list[1]->main->temp;?> °C</div>
            <div class="feels_like1">Feels like <?php echo $json->list[1]->main->feels_like;?> °C</div>
            <div class="wind1">Wind <?php echo $json->list[1]->wind->speed;?> km/h</div>
            <div class="dt1"><?php echo $json->list[1]->dt_txt;?></div>
        </div>
        <div class="day">    
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[2]->weather[0]->icon;?>@2x.png">
            <div class="desc2"><?php echo $json->list[2]->weather[0]->description;?></div>
            <div class="temp2"><?php echo $json->list[2]->main->temp;?> °C</div>
            <div class="feels_like2">Feels like <?php echo $json->list[2]->main->feels_like;?> °C</div>
            <div class="wind2">Wind <?php echo $json->list[2]->wind->speed;?> km/h</div>
            <div class="dt2"><?php echo $json->list[2]->dt_txt;?></div>    
        </div>
        <div class="day">    
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[3]->weather[0]->icon;?>@2x.png">
            <div class="desc3"><?php echo $json->list[3]->weather[0]->description;?></div>
            <div class="temp3"><?php echo $json->list[3]->main->temp;?> °C</div>
            <div class="feels_like3">Feels like <?php echo $json->list[3]->main->feels_like;?> °C</div>
            <div class="wind3">Wind <?php echo $json->list[3]->wind->speed;?> km/h</div>
            <div class="dt3"><?php echo $json->list[3]->dt_txt;?></div>
        </div>
        <div class="day">
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[4]->weather[0]->icon;?>@2x.png">
            <div class="desc4"><?php echo $json->list[4]->weather[0]->description;?></div>
            <div class="temp4"><?php echo $json->list[4]->main->temp;?> °C</div>
            <div class="feels_like4">Feels like <?php echo $json->list[4]->main->feels_like;?> °C</div>
            <div class="wind4">Wind <?php echo $json->list[4]->wind->speed;?> km/h</div>
            <div class="dt4"><?php echo $json->list[4]->dt_txt;?></div>    
        </div>
    </div>
</body>
</html>