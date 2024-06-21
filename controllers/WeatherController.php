<?php
require_once '../models/Weather.php';

class WeatherController{
    private $apiKey;
    private const BASE_URL = "https://api.openweathermap.org/data/2.5/weather";
    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }
    public function getWeatherData($cityName){
        $url = self::BASE_URL . "?q={$cityName}&appid={$this->apiKey}&units=metric";
        $response = @file_get_contents($url);

        if ($response === false){
            return null;
        }

        $jsonData = json_decode($response, true);

        if($jsonData['cod'] !== 200){
            return null;
        }

        return Weather::fromJson($jsonData);
    }
}