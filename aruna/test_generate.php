<?php

require_once "config/config.php";

$url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . GEMINI_API_KEY;

$response = json_decode(file_get_contents($url), true);

foreach ($response["models"] as $model) {

    if (in_array("generateContent", $model["supportedGenerationMethods"])) {

        echo $model["name"] . "<br>";

    }

}