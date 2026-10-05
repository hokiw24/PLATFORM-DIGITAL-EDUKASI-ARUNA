<?php

header("Content-Type: application/json; charset=UTF-8");

require_once("../config/config.php");

// ==============================
// Ambil pesan
// ==============================
$data = json_decode(file_get_contents("php://input"), true);

$message = trim($data["message"] ?? "");

if ($message == "") {
    echo json_encode([
        "success" => false,
        "reply" => "Pesan kosong."
    ]);
    exit;
}

// ==============================
// Prompt
// ==============================
$prompt = "
Kamu adalah ARUNA AI, chatbot edukasi konservasi laut milik Universitas Negeri Jakarta (UNJ).

Tugas kamu HANYA menjawab pertanyaan yang berkaitan dengan:
- Konservasi laut
- Ekosistem laut
- Terumbu karang
- Mangrove
- Padang lamun
- Biota laut
- Sampah laut
- Pencemaran laut
- Perubahan iklim terhadap laut
- Keanekaragaman hayati laut
- Pengelolaan sampah
- Daur ulang
- Lingkungan hidup
- Kelestarian alam
- Edukasi lingkungan
- Teknologi yang berkaitan dengan konservasi lingkungan dan laut
- Platform ARUNA beserta fitur-fiturnya

Aturan:
1. Jawablah menggunakan Bahasa Indonesia yang sopan, jelas, dan mudah dipahami.
2. Berikan jawaban yang singkat namun informatif.
3. Jangan pernah mengaku sebagai ChatGPT, Google Gemini, atau model AI lainnya. Kamu selalu memperkenalkan diri sebagai ARUNA AI.
4. Jika pengguna bertanya di luar topik lingkungan, konservasi, atau ARUNA, jangan menjawab pertanyaannya.

Sebagai gantinya balas dengan:

'Maaf, saya adalah ARUNA AI, chatbot yang berfokus pada edukasi konservasi laut dan lingkungan. Saya hanya dapat membantu menjawab pertanyaan yang berkaitan dengan topik tersebut. Silakan ajukan pertanyaan seputar lingkungan, konservasi laut, mangrove, terumbu karang, sampah laut, atau fitur ARUNA.'

Pertanyaan pengguna:

$message
";

// ==============================
// Endpoint
// ==============================

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" . GEMINI_API_KEY;

// ==============================
// Body
// ==============================
$payload = [
    "contents" => [
        [
            "parts" => [
                [
                    "text" => $prompt
                ]
            ]
        ]
    ]
];

// ==============================
// cURL
// ==============================
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_TIMEOUT => 30
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {

    echo json_encode([
        "success" => false,
        "reply" => curl_error($ch)
    ]);

    curl_close($ch);
    exit;
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

// ==============================
// Decode
// ==============================
$result = json_decode($response, true);

// ==============================
// Kalau HTTP Error
// ==============================
if ($httpCode != 200) {
    echo json_encode([
        "success" => false,
        "reply" => json_encode($result, JSON_PRETTY_PRINT)
    ]);

    exit;
}

// ==============================
// Kalau Gemini Error
// ==============================
if (isset($result["error"])) {

    echo json_encode([
        "success" => false,
        "reply" => $result["error"]["message"]
    ]);

    exit;
}

// ==============================
// Ambil Jawaban
// ==============================
$reply = "";

if (isset($result["candidates"][0]["content"]["parts"][0]["text"])) {

    $reply = $result["candidates"][0]["content"]["parts"][0]["text"];

}

if ($reply == "") {

    echo json_encode([
        "success" => false,
        "reply" => "Jawaban kosong.",
        "debug" => $result
    ]);

    exit;
}

// ==============================
// Berhasil
// ==============================
echo json_encode([
    "success" => true,
    "reply" => $reply
]);