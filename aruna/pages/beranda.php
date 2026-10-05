<?php
include 'api/gnews.php';
?>

<!-- HERO -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h5 class="hero-subtitle">

                    PLATFORM DIGITAL EDUKASI

                </h5>

                <h1 class="hero-title">

                    ARUNA

                </h1>

                <p class="hero-text">

                    Platform Digital Edukasi Konservasi Laut
                    Berbasis Artificial Intelligence,
                    Internet of Things, dan Smart Monitoring.

                </p>

                <a href="?page=pengetahuan"
                    class="btn btn-aruna">

                    Jelajahi Sekarang

                </a>

            </div>

            <div class="col-lg-6 text-center">
            <img src="assets/images/aruna-logo.png"
            alt="Logo ARUNA"
            class="hero-image">

        </div>

    </div>

</section>


<!-- BERITA -->

<section class="news">

    <div class="container">

        <h2 class="section-title">

            🌊 Info Laut Hari Ini

        </h2>

        <div class="row">

            <?php if (!empty($articles)): ?>

                <?php foreach ($articles as $article): ?>

                    <div class="col-lg-4 mb-4">

                        <div class="news-card h-100">

                            <img src="<?= htmlspecialchars($article['image']) ?>"
                                class="img-fluid">

                            <div class="p-3">

                                <h5>

                                    <?= htmlspecialchars($article['title']) ?>

                                </h5>

                                <p>

                                    <?= htmlspecialchars($article['description']) ?>

                                </p>

                                <a href="<?= htmlspecialchars($article['url']) ?>"
                                    target="_blank"
                                    class="btn btn-primary">

                                    Baca Selengkapnya

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <h4 class="text-center">

                    Berita belum tersedia.

                </h4>

            <?php endif; ?>

        </div>

    </div>

</section>