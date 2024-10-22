<!doctype html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AWS-PHP</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<?php

$apiKey = '64f60853740a1ee3ba20d0fb595c97d5';
$location = 'casablanca,ma';  // Change to your desired location
$units = 'metric'; // Use 'imperial' for Fahrenheit

// Function to get current weather
function getCurrentWeather($location, $apiKey, $units) {
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units={$units}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Function to get 5-day forecast
function getFiveDayForecast($location, $apiKey, $units) {
    $url = "https://api.openweathermap.org/data/2.5/forecast?q={$location}&appid={$apiKey}&units={$units}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

try {
    $location = urlencode($location);
    // Fetch current weather
    $currentWeather = getCurrentWeather($location, $apiKey, $units);
    //echo "Current Weather:\n";
    $temperature = $currentWeather['main']['temp'];
    $weather = $currentWeather['weather'][0]['description'];
    $humidity = $currentWeather['main']['humidity'];
    $speed = $currentWeather['wind']['speed'];
    // echo "Temperature: " . $currentWeather['main']['temp'] . "°C\n";
    // echo "Weather: " . $currentWeather['weather'][0]['description'] . "\n";

    // Fetch 5-day forecast
    // $forecast = getFiveDayForecast($location, $apiKey, $units);
    // echo "\n5-Day Forecast:\n";
    // foreach ($forecast['list'] as $forecastEntry) {
    //     echo "Date: " . date('Y-m-d H:i:s', $forecastEntry['dt']) . "\n";
    //     echo "Temperature: " . $forecastEntry['main']['temp'] . "°C\n";
    //     echo "Weather: " . $forecastEntry['weather'][0]['description'] . "\n";
    //     echo "------------------------\n";
    // }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<body>
    <!-- ***************************** Head Starts Here *********************************-->
    <div class="head-cover">
         <header id="menu-jk" class="container-fluid">
            <div class="container">
                <div class="row head-ro">
                    <div class="col-md-3 logo">
                        <img src="./logo-new.png" alt="">
                          

                                 <a class="d-md-none small-menu" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">

                                <i class="fas d-lg-none  fa-bars"></i>
                           </a>
                    </div>
                    <div id="collapseExample" class="col-md-9  nav">
                      
                    </div>
                </div>
            </div>

        </header>
    </div>
   
    <!-- ***************************** Banner Starts Here *********************************-->
    <section class="container-fluid banner-container">
        <div class="container">
            <div class="row banner-row">
                <div class="col-md-6 banner-txt">
                    <h1>AWS WEATHER PHP</h1>
                    <p>Today's weather offers a mix of conditions, with clear skies in the morning giving way to partly cloudy skies in the afternoon. Temperatures will remain mild, ranging from 18°C to 24°C, perfect for outdoor activities. Light winds will breeze through at around 10 km/h, providing a refreshing feel. By evening, there’s a slight chance of rain, especially in coastal areas, as clouds gather. Overnight, temperatures will drop to a cooler 14°C. If you're heading out, it might be worth carrying an umbrella, just in case. Overall, a pleasant day with a slight chance of showers later.</p>
                    <div class="btn-row row">
                       <!-- <button class="btn btn-primary">Read More</button>
                       <button class="btn btn-outline-primary">Create Account</button> -->
                   </div>
               </div>
               <div class="col-md-6 banner-img">
                    <img src="./slider.png" alt="">
               </div>
           </div>
       </div>
   </section>



   <section id="features" class="features pt-0 container-fluid">
    <div class="container">
        <div class="row mt-5 feature-row">
            <div class="col-md-4">
                <div class="weather-box">
                    <div class="box">
                        <div class="info-weather">
                            <div class="weather">
                                <img src="https://i.postimg.cc/NfJV92Ks/cloud.png">
                                <p class="temp"><?php  echo $temperature ?><span>°C</span></p>
                                <p class="description">Broken Clouds</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="weather-details">
                    <div class="humidity">
                        <i class="bi bi-water"></i>
                        <div class="text">
                            <div class="info-humidity">
                                <span><?php echo $humidity; ?>%</span>
                            </div>
                            <p>Humidity</p>
                        </div>
                    </div>
    
                    <div class="wind">
                        <i class="bi bi-wind"></i>
                        <div class="text">
                            <div class="info-wind">
                                <span><?php echo $speed ?>Km/h</span>
                            </div>
                            <p>Wind Speed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
   
      








</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/testimonial/js/owl.carousel.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
</html>
