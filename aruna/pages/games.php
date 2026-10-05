<link rel="stylesheet" href="assets/css/game.css">

<section class="game-page">

    <div class="container">

        <!-- Header -->
        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2">
                ARUNA GAMES
            </span>

            <h1 class="game-title mt-3">
                🌊 Ocean Waste Challenge
            </h1>

            <p class="game-subtitle">
                Pilah sampah ke kategori yang benar sebelum waktu habis!
            </p>

        </div>

        <!-- Start Screen -->
        <div id="startScreen" class="game-card">

            <div class="game-icon">
                🌎
            </div>

            <h2>Selamat Datang!</h2>

            <p>

                Kamu memiliki waktu <strong>60 detik</strong>
                untuk memilah sampah sebanyak mungkin.

            </p>

            <ul class="rules">

                <li>✅ Jawaban benar +10 poin</li>

                <li>❌ Jawaban salah -5 poin</li>

                <li>⏱️ Waktu hanya 60 detik</li>

                <li>🏆 Raih skor tertinggi!</li>

            </ul>

            <button
                id="startBtn"
                class="btn btn-primary btn-lg px-5">

                ▶ Mulai Permainan

            </button>

        </div>

        <!-- Game Area -->

        <div
            id="gameArea"
            class="game-card d-none">

            <!-- Timer -->

            <div class="top-panel">

                <div class="panel-box">

                    <small>⏱️ Waktu</small>

                    <h2 id="timer">

                        60

                    </h2>

                </div>

                <div class="panel-box">

                    <small>⭐ Skor</small>

                    <h2 id="score">

                        0

                    </h2>

                </div>

            </div>

            <!-- Progress -->

            <div class="progress mb-4">

                <div
                    id="progressBar"
                    class="progress-bar bg-info"
                    style="width:100%">

                </div>

            </div>

            <!-- Sampah -->

            <div class="waste-card">

                <div class="waste-icon"
                    id="wasteEmoji">

                    🧴

                </div>

                <h2
                    id="wasteName">

                    Botol Plastik

                </h2>

            </div>

            <!-- Jawaban -->

            <div class="row g-3 mt-4">

                <div class="col-md-4">

                    <button
                        class="btn btn-success answer-btn w-100"
                        data-answer="organik">

                        🌿 Organik

                    </button>

                </div>

                <div class="col-md-4">

                    <button
                        class="btn btn-primary answer-btn w-100"
                        data-answer="anorganik">

                        ♻️ Anorganik

                    </button>

                </div>

                <div class="col-md-4">

                    <button
                        class="btn btn-danger answer-btn w-100"
                        data-answer="b3">

                        ☣️ B3

                    </button>

                </div>

            </div>

            <!-- Status -->

            <div
                id="status"
                class="status-box mt-4">

            </div>

        </div>

        <!-- Result -->

        <div
            id="resultScreen"
            class="game-card d-none">

            <div class="result-icon">

                🏆

            </div>

            <h2>

                Permainan Selesai

            </h2>

            <h1
                id="finalStars">

                ⭐⭐⭐⭐⭐

            </h1>

            <div class="row mt-4">

                <div class="col-6">

                    <div class="result-box">

                        <h5>Score</h5>

                        <h2 id="finalScore">

                            0

                        </h2>

                    </div>

                </div>

                <div class="col-6">

                    <div class="result-box">

                        <h5>Akurasi</h5>

                        <h2 id="accuracy">

                            0%

                        </h2>

                    </div>

                </div>

            </div>

            <div class="row mt-3">

                <div class="col-6">

                    <div class="result-box">

                        <h5>Benar</h5>

                        <h2 id="correct">

                            0

                        </h2>

                    </div>

                </div>

                <div class="col-6">

                    <div class="result-box">

                        <h5>Salah</h5>

                        <h2 id="wrong">

                            0

                        </h2>

                    </div>

                </div>

            </div>

            <button
                onclick="location.reload()"
                class="btn btn-primary btn-lg mt-5 px-5">

                🔄 Main Lagi

            </button>

        </div>

    </div>

</section>

<script src="assets/js/game.js"></script>