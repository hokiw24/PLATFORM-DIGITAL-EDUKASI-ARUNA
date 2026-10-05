<?php

require_once "config/config.php";

$url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . GEMINI_API_KEY;

$response = file_get_contents($url);

$data = json_decode($response, true);

foreach($data["models"] as $m){

    echo $m["name"] . "<br>";

}