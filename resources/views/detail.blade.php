<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $rumah->nama_rumah }} - Detail Rumah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --forest: #014f36;
            --forest-deep: #003224;
            --mist: #eef2ef;
            --text: #101828;
            --line: #d8dfda;
            --card: #014f36;
            --accent: #d7b26d;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background: radial-gradient(circle at top left, #f6faf7 0%, #eef3ef 45%, #edf0ee 100%);
            color: var(--text);
            font-family: "Space Grotesk", sans-serif;
        }

        .container {
            width: min(1320px, 95vw);
            margin-inline: auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: linear-gradient(90deg, var(--forest-deep), var(--forest));
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.14);
        }

        .topbar-inner {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            color: #ffffff;
            text-decoration: none;
            letter-spacing: 0.04em;
        }

        .brand small {
            display: block;
            opacity: 0.82;
            font-size: 12px;
            margin-top: 2px;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: opacity 0.25s ease;
        }

        .nav a:hover {
            opacity: 0.72;
        }

        .hero {
            margin-top: 14px;
            position: relative;
            min-height: 400px;
            border-radius: 0 0 24px 24px;
            overflow: hidden;
            background: #d7ddd9;
        }

        .hero img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.82);
            transform: scale(1.01);
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.22) 0%, rgba(0, 0, 0, 0.46) 100%);
        }

        .hero-content {
            position: absolute;
            left: 52px;
            bottom: 58px;
            z-index: 2;
            color: #ffffff;
        }

        .hero-content .eyebrow {
            display: inline-flex;
            border: 1px solid rgba(255, 255, 255, 0.45);
            border-radius: 999px;
            padding: 6px 12px;
            font-size: 12px;
            margin-bottom: 16px;
            backdrop-filter: blur(4px);
        }

        .hero-content h1 {
            margin: 0;
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(42px, 7vw, 66px);
            line-height: 0.95;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .hero-line {
            margin-top: 14px;
            width: 96px;
            height: 2px;
            background: rgba(255, 255, 255, 0.8);
        }

        .content-wrap {
            position: relative;
            margin-top: 52px;
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(280px, 0.72fr);
            align-items: start;
            gap: 42px;
        }

        .stats-card {
            position: sticky;
            top: 84px;
            margin-top: -240px;
            background: var(--card);
            color: #ffffff;
            border-radius: 8px;
            padding: 28px 26px;
            box-shadow: 0 24px 42px rgba(1, 79, 54, 0.34);
            animation: liftIn 0.8s ease both;
            z-index: 5;
        }

        .stats-card p {
            margin: 0;
            font-size: 23px;
            font-weight: 600;
        }

        .stats-divider {
            margin: 22px 0;
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.35);
        }

        .metric-list {
            display: grid;
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .metric-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 500;
        }

        .metric-item .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            flex-shrink: 0;
        }

        .section-title {
            margin: 0;
            font-size: clamp(36px, 6vw, 56px);
            line-height: 1;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .section-line {
            margin-top: 14px;
            width: 54px;
            height: 2px;
            background: #c8ceca;
        }

        .summary {
            margin-top: 26px;
            font-size: 20px;
            line-height: 1.75;
            color: #455157;
            max-width: 64ch;
        }

        .main-photo {
            margin-top: 30px;
            width: 100%;
            border-radius: 4px;
            display: block;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .badges {
            margin-top: 18px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .badge {
            font-size: 13px;
            border-radius: 999px;
            padding: 8px 14px;
            background: #e9efec;
            color: #143328;
            border: 1px solid #d2dbd5;
        }

        .badge.available {
            background: rgba(16, 185, 129, 0.13);
            color: #057a55;
            border-color: rgba(16, 185, 129, 0.35);
        }

        .spec-block {
            margin-top: 82px;
            padding-bottom: 70px;
        }

        .spec-grid {
            margin-top: 34px;
            display: grid;
            grid-template-columns: minmax(0, 320px) minmax(0, 1fr);
            gap: 38px;
            align-items: start;
        }

        .thumb-wrap {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .thumb {
            width: 92px;
            height: 92px;
            object-fit: cover;
            border: 1px solid var(--line);
            border-radius: 2px;
        }

        .accordion {
            border-top: 1px solid var(--line);
        }

        details {
            border-bottom: 1px solid var(--line);
        }

        summary {
            list-style: none;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 4px;
            font-size: 19px;
            font-weight: 600;
            color: #263238;
        }

        summary::-webkit-details-marker {
            display: none;
        }

        .plus {
            font-size: 24px;
            line-height: 1;
            transition: transform 0.2s ease;
            color: #4f5b58;
        }

        details[open] .plus {
            transform: rotate(45deg);
        }

        .spec-content {
            margin: 0;
            padding: 0 4px 16px;
            color: #606d69;
            line-height: 1.7;
            font-size: 15px;
        }

        .cta-row {
            margin-top: 36px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 2px;
            border: 1px solid transparent;
            min-height: 48px;
            padding: 0 20px;
            font-weight: 600;
            transition: 0.25s ease;
        }

        .btn-primary {
            background: var(--forest);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #026043;
        }

        .btn-outline {
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            border-color: rgba(255, 255, 255, 0.42);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 255, 255, 0.68);
            color: #ffffff;
        }

        @keyframes liftIn {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 1050px) {
            .hero {
                min-height: 320px;
            }

            .hero-content {
                left: 24px;
                bottom: 36px;
            }

            .content-wrap {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .stats-card {
                margin-top: 0;
                position: static;
                order: -1;
            }

            .spec-grid {
                grid-template-columns: 1fr;
                gap: 22px;
            }
        }

        @media (max-width: 720px) {
            .topbar-inner {
                min-height: 64px;
            }

            .brand {
                font-size: 14px;
            }

            .brand small {
                font-size: 11px;
            }

            .nav {
                display: none;
            }

            .hero {
                border-radius: 0 0 18px 18px;
            }

            .stats-card p {
                font-size: 18px;
            }

            .metric-item {
                font-size: 17px;
            }

            .summary {
                font-size: 17px;
            }

            summary {
                font-size: 17px;
            }
        }
    </style>
</head>
<body>
    @php
        $fotoRumah = $rumah->foto ? asset('images/' . $rumah->foto) : asset('gambar/home_page_green_palm.jpeg');
        $statusClass = strtolower((string) $rumah->status) === 'tersedia' ? 'available' : '';
    @endphp

    <header class="topbar">
        <div class="container topbar-inner">
            <a href="/" class="brand">
               Green Palm Sepande
                <small>Candi, Sidoarjo</small>
            </a>
            <nav class="nav">
                <a href="/">Home</a>
                <a href="#overview">Produk</a>
                <a href="#specifications">Spesifikasi</a>
                <a href="https://wa.me/6282227274058?text=Halo%20saya%20tertarik%20dengan%20unit%20{{ urlencode($rumah->nama_rumah) }}">Contact</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <img src="{{ $fotoRumah }}" alt="{{ $rumah->nama_rumah }}">
            <div class="hero-content">
                <span class="eyebrow">Residential Product</span>
                <h1>{{ $rumah->nama_rumah }}</h1>
                <div class="hero-line"></div>
            </div>
        </section>

        <section id="overview" class="content-wrap">
            <div>
                <h2 class="section-title">{{ $rumah->nama_rumah }}</h2>
                <div class="section-line"></div>

                <p class="summary">
                    {{ $rumah->deskripsi ?: 'Hunian modern dengan desain elegan, tata ruang fungsional, dan lingkungan yang nyaman untuk keluarga. Lokasi strategis memberikan akses cepat ke fasilitas harian dan jalur utama kota.' }}
                </p>

                <img class="main-photo" src="{{ $fotoRumah }}" alt="Foto utama {{ $rumah->nama_rumah }}">

                <div class="badges">
                    <span class="badge">Rp {{ number_format($rumah->harga, 0, ',', '.') }}</span>
                    <span class="badge">{{ $rumah->tipe->nama_tipe ?? 'Tipe -' }}</span>
                    <span class="badge {{ $statusClass }}">{{ $rumah->status ?? 'Status -' }}</span>
                </div>
            </div>

            <aside class="stats-card">
                <p>Luas Tanah: {{ $rumah->luas_tanah ?? '-' }}, Luas Bangunan: {{ $rumah->luas_bangunan ?? '-' }}</p>
                <hr class="stats-divider">
                <ul class="metric-list">
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->lantai ?? '-' }} Lantai</li>
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->kamar_tidur ?? '-' }} Kamar Tidur</li>
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->kamar_mandi ?? '-' }} Kamar Mandi</li>
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->carport ?? '-' }} Carport</li>
                </ul>

                <div class="cta-row">
                    <a href="/" class="btn btn-outline">Kembali</a>
                </div>
            </aside>
        </section>

        <section id="specifications" class="spec-block">
            <h2 class="section-title">Specifications</h2>
            <div class="section-line"></div>

            <div class="spec-grid">
                <div class="thumb-wrap">
                    <img class="thumb" src="{{ $fotoRumah }}" alt="Denah 1 {{ $rumah->nama_rumah }}">
                    <img class="thumb" src="{{ $fotoRumah }}" alt="Denah 2 {{ $rumah->nama_rumah }}">
                </div>

                <div class="accordion">
                    <details open>
                        <summary>Pondasi <span class="plus">+</span></summary>
                        <p class="spec-content">Pondasi rumah menggunakan struktur kuat sesuai standar konstruksi untuk kenyamanan dan keamanan jangka panjang.</p>
                    </details>
                    <details>
                        <summary>Lantai <span class="plus">+</span></summary>
                        <p class="spec-content">Lantai utama didesain modern dengan material yang mudah dirawat dan memberi tampilan bersih elegan.</p>
                    </details>
                    <details>
                        <summary>Dinding <span class="plus">+</span></summary>
                        <p class="spec-content">Dinding eksterior dan interior diproses rapi dengan finishing yang tahan lama serta nyaman untuk hunian tropis.</p>
                    </details>
                    <details>
                        <summary>Plafond <span class="plus">+</span></summary>
                        <p class="spec-content">Plafond dibuat dengan ketinggian proporsional untuk sirkulasi udara yang baik dan ruang terasa lebih lapang.</p>
                    </details>
                    <details>
                        <summary>Railing <span class="plus">+</span></summary>
                        <p class="spec-content">Railing mengutamakan keamanan sekaligus tetap harmonis dengan karakter arsitektur rumah.</p>
                    </details>
                    <details>
                        <summary>Atap <span class="plus">+</span></summary>
                        <p class="spec-content">Atap dirancang untuk ketahanan cuaca tropis, menjaga suhu ruang lebih stabil, dan mendukung efisiensi hunian.</p>
                    </details>
                    <details>
                        <summary>Dapur <span class="plus">+</span></summary>
                        <p class="spec-content">Area dapur dirancang ergonomis sehingga aktivitas harian keluarga lebih nyaman dan fungsional.</p>
                    </details>
                </div>
            </div>
        </section>
    </main>
</body>
</html>