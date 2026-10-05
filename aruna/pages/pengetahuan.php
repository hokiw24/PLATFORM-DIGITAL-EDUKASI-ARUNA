<section class="knowledge py-5">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                📚 Dashboard Pengetahuan
            </h2>

            <p class="text-muted">
                Pelajari berbagai materi mengenai konservasi laut secara interaktif.
            </p>

        </div>

        <?php

        $materi = [

            [
                "judul" => "Jenis Sampah",
                "gambar" => "assets/images/materi/sampah.jpg",
                "deskripsi" => "Pelajari jenis sampah organik, anorganik, dan B3 beserta cara pengelolaannya.",
                "page" => "sampah"
            ],

            [
                "judul" => "Pencemaran Laut",
                "gambar" => "assets/images/materi/pencemaran.jpg",
                "deskripsi" => "Kenali penyebab pencemaran laut serta dampaknya terhadap lingkungan.",
                "page" => "pencemaran"
            ],

            [
                "judul" => "Terumbu Karang",
                "gambar" => "assets/images/materi/karang.jpg",
                "deskripsi" => "Pelajari fungsi terumbu karang sebagai habitat berbagai biota laut.",
                "page" => "karang"
            ],

            [
                "judul" => "Mangrove",
                "gambar" => "assets/images/materi/mangrove.jpg",
                "deskripsi" => "Ketahui manfaat hutan mangrove dalam menjaga wilayah pesisir.",
                "page" => "mangrove"
            ],

            [
                "judul" => "Ekosistem Laut",
                "gambar" => "assets/images/materi/ekosistem.jpg",
                "deskripsi" => "Pahami keseimbangan ekosistem laut dan pentingnya konservasi.",
                "page" => "ekosistem"
            ],

            [
                "judul" => "FAQ",
                "gambar" => "assets/images/materi/faq.jpg",
                "deskripsi" => "Temukan jawaban dari pertanyaan yang sering diajukan mengenai ARUNA.",
                "page" => "faq"
            ]

        ];

        ?>

        <div class="row">

            <?php foreach($materi as $item){ ?>

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="materi-card">

                    <img src="<?= $item['gambar']; ?>" alt="<?= $item['judul']; ?>">

                    <div class="materi-content">

                        <h4><?= $item['judul']; ?></h4>

                        <p><?= $item['deskripsi']; ?></p>

                        <div class="materi-info">

                            <span>📖 Materi</span>

                        </div>

                        <a href="?page=<?= $item['page']; ?>" class="btn btn-aruna w-100">

                            Pelajari Sekarang →

                        </a>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

</section>