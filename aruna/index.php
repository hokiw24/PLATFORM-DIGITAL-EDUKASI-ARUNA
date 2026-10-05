<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ARUNA - Platform Edukasi Konservasi Laut</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <main>

<?php

switch ($page) {

    case 'beranda':
        include 'pages/beranda.php';
        break;

    case 'pengetahuan':
        include 'pages/pengetahuan.php';
        break;

    case 'sampah':
        include 'pages/materi/sampah.php';
        break;

    case 'pencemaran':
        include 'pages/materi/pencemaran.php';
        break;

    case 'karang':
        include 'pages/materi/karang.php';
        break;

    case 'mangrove':
        include 'pages/materi/mangrove.php';
        break;

    case 'ekosistem':
        include 'pages/materi/ekosistem.php';
        break;

    case 'faq':
        include 'pages/materi/faq.php';
        break;

    case 'produk':
        include 'pages/produk.php';
        break;

    case 'games':
        include 'pages/games.php';
        break;

    case 'chatbot':
        include 'pages/chatbot.php';
        break;

    default:
        include 'pages/beranda.php';
        break;
}

?>

</main>

    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>

</body>

</html>