<?php

    class Weather{
        private $cityName;
        private $temperature;
        private $mainCondition;
        public function __construct($cityName, $temperature, $mainCondition){
            $this->cityName = $cityName;
            $this->temperature = $temperature;
            $this->mainCondition = $mainCondition;
        }
        // named constructor or factory method
        public static function fromJson($json){
            return new self(
                $json['name'],
                $json['main']['temp'],
                $json['weather'][0]['main']
            );
        }

        public function getCityName(){
            return $this->cityName;
        }

        public function getTemperature(){
            return $this->temperature;
        }

        public function getMainCondition(){
            return $this->mainCondition;
        }
    }