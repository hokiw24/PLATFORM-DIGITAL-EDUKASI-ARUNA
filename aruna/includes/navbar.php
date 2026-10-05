<?php
$page = $_GET['page'] ?? 'beranda';
?>

<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container-fluid px-4">

        <!-- Logo -->
        <a class="navbar-brand" href="?page=beranda">

    <img src="assets/images/logo-navbar.png"
         alt="ARUNA"
         class="logo-navbar">

</a>

        <!-- Tombol HP -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link <?= ($page=='beranda') ? 'active' : '' ?>" href="index.php"> Beranda </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page=='pengetahuan') ? 'active' : '' ?>" href="?page=pengetahuan"> Pengetahuan </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page=='produk') ? 'active' : '' ?>" href="?page=produk"> Produk Kami </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page=='games') ? 'active' : '' ?>" href="?page=games"> Aruna Games </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link chatbot-btn <?= ($page=='chatbot') ? 'active' : '' ?>" href="?page=chatbot"> Chatbot AI</a>
                </li>

            </ul>

        </div>

    </div>

</nav