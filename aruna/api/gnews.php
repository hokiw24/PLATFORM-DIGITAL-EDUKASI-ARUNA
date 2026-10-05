<?php

require_once __DIR__ . '/../config/config.php';

// Kata kunci pencarian
$query = urlencode("marine pollution");

// URL API GNews
$url = "https://gnews.io/api/v4/search?q={$query}&max=6&apikey=" . GNEWS_API_KEY;

// Inisialisasi cURL
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => true,
]);

$response = curl_exec($curl);

if (curl_errno($curl)) {
    die("Gagal mengambil data: " . curl_error($curl));
}

curl_close($curl);

// Decode JSON
$data = json_decode($response, true);

// Ambil artikel
$articles = $data['articles'] ?? [];

?>