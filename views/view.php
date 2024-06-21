<?php
require_once '../controllers/WeatherController.php';
include '../config/apiKey.php';

$weatherController = new WeatherController(API_KEY);

$weatherData = null;

if (isset($_POST['submit'])){
    $cityName = $_POST['cityName'];
    $weatherData = $weatherController->getWeatherData($cityName);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Weather App</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">
                            Weather App
                        </h2>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cityName">Enter City:</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="cityName" 
                                    name="cityName" 
                                    placeholder="e.g., New York" 
                                    required>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Get Weather
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if ($weatherData !== null) : ?>
                    <div class="alert alert-success bg-success text-white">
                        <p>
                            The current weather in <?= $weatherData->getCityName(); ?> is
                            <?= $weatherData->getTemperature(); ?> &deg;C with
                            <?= $weatherData->getMainCondition(); ?>
                        </p>
                    </div>
                <?php elseif (isset($_POST['submit']) && $weatherData === null) : ?>
                    <div class="alert alert-danger bg-danger text-white">
                        <p>
                            Sorry, the weather information for the specified city could not be found.
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>