<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $rumah->nama_rumah }} - Detail Rumah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    @php
        $fotoRumah = $rumah->foto ? asset('images/' . $rumah->foto) : asset('gambar/home_page_green_palm.jpeg');
        $statusClass = strtolower((string) $rumah->status) === 'tersedia' ? 'available' : '';
        $profileKey = strtolower(trim(($rumah->tipe->nama_tipe ?? '') . ' ' . ($rumah->nama_rumah ?? '')));

        $presetSpesifikasi = [
            'como' => [
                'Pondasi' => 'Struktur pondasi bertipe tapak untuk stabilitas bangunan dua lantai pada area hunian padat.',
                'Lantai' => 'Lantai menggunakan perpaduan keramik matte dan finishing anti slip pada area servis.',
                'Dinding' => 'Dinding bata ringan dengan finishing cat eksterior weather shield untuk ketahanan cuaca.',
                'Plafond' => 'Plafond gypsum rangka hollow dengan elevasi ruang tamu lebih tinggi agar terasa lega.',
                'Railing' => 'Railing tangga memakai kombinasi besi hollow dan handrail kayu motif natural.',
                'Atap' => 'Atap rangka baja ringan dengan penutup genteng beton untuk reduksi panas yang lebih baik.',
                'Dapur' => 'Area dapur linear dengan bukaan ventilasi belakang untuk sirkulasi udara optimal.',
            ],
            'lakeside' => [
                'Pondasi' => 'Pondasi diperkuat pada titik beban utama untuk mendukung komposisi ruang keluarga yang luas.',
                'Lantai' => 'Lantai granit tile pada area utama dan keramik anti slip pada kamar mandi serta teras belakang.',
                'Dinding' => 'Dinding kombinasi bata merah dan bata ringan dengan cat interior low VOC yang lebih sehat.',
                'Plafond' => 'Plafond gypsum drop ceiling di area living untuk menambah karakter ruang modern.',
                'Railing' => 'Railing balkon memakai material galvanis dengan desain minimalis yang aman untuk keluarga.',
                'Atap' => 'Rangka atap baja ringan dengan kemiringan optimal agar aliran air hujan lebih cepat.',
                'Dapur' => 'Dapur model L-shape yang terhubung ke area servis sehingga aktivitas memasak lebih efisien.',
            ],
            'default' => [
                'Pondasi' => 'Pondasi rumah mengikuti standar konstruksi hunian untuk keamanan jangka panjang.',
                'Lantai' => 'Lantai didesain modern dengan material yang mudah dirawat dan tahan penggunaan harian.',
                'Dinding' => 'Dinding eksterior dan interior menggunakan finishing rapi dengan ketahanan yang baik.',
                'Plafond' => 'Plafond dibuat proporsional untuk memberi kesan ruang yang lebih nyaman dan lapang.',
                'Railing' => 'Railing dirancang aman sekaligus tetap menyatu dengan karakter desain bangunan.',
                'Atap' => 'Atap dirancang untuk iklim tropis agar suhu dalam rumah tetap nyaman.',
                'Dapur' => 'Area dapur ditata fungsional untuk mendukung aktivitas keluarga sehari-hari.',
            ],
        ];

        $spesifikasiAktif = null;
        foreach ($presetSpesifikasi as $key => $items) {
            if ($key !== 'default' && str_contains($profileKey, $key)) {
                $spesifikasiAktif = $items;
                break;
            }
        }

        if (!$spesifikasiAktif) {
            $spesifikasiAktif = [
                'Pondasi' => 'Pondasi disesuaikan untuk unit dengan luas tanah ' . ($rumah->luas_tanah ?? '-') . ' agar struktur bangunan tetap stabil.',
                'Lantai' => 'Unit ini memiliki ' . ($rumah->lantai ?? '-') . ' lantai dengan material lantai yang mudah dirawat untuk aktivitas harian.',
                'Dinding' => 'Dinding dirancang untuk kenyamanan termal sesuai karakter unit ' . ($rumah->nama_rumah ?? 'rumah ini') . '.',
                'Plafond' => 'Plafond menggunakan finishing rapi untuk menjaga ruang tetap terang dan lapang.',
                'Railing' => 'Railing mengikuti kebutuhan keamanan keluarga sesuai komposisi ruang unit.',
                'Atap' => 'Atap dibuat tahan cuaca tropis dan mendukung sirkulasi panas yang baik.',
                'Dapur' => 'Dapur disesuaikan dengan tata ruang unit sehingga alur memasak dan penyimpanan lebih efisien.',
            ];
        }

        $summaryText = $rumah->deskripsi ?: ($rumah->tipe->deskripsi ?? ('Tipe ' . ($rumah->tipe->nama_tipe ?? $rumah->nama_rumah) . ' dirancang untuk keluarga modern dengan komposisi ruang yang fungsional dan nyaman.'));

        $themeMap = [
            'como' => ['forest' => '#014f36', 'forest_deep' => '#003224', 'card' => '#015c3f', 'accent' => '#d7b26d'],
            'lakeside' => ['forest' => '#124b77', 'forest_deep' => '#0c3250', 'card' => '#0f3e64', 'accent' => '#7dc6f0'],
        ];
        $theme = ['forest' => '#014f36', 'forest_deep' => '#003224', 'card' => '#014f36', 'accent' => '#d7b26d'];
        foreach ($themeMap as $key => $value) {
            if (str_contains($profileKey, $key)) {
                $theme = $value;
                break;
            }
        }
    @endphp
    <style>
        :root {
            --forest: {{ $theme['forest'] }};
            --forest-deep: {{ $theme['forest_deep'] }};
            --mist: #eef2ef;
            --text: #101828;
            --line: #d8dfda;
            --card: {{ $theme['card'] }};
            --accent: {{ $theme['accent'] }};
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
                <span class="eyebrow">{{ $rumah->tipe->nama_tipe ?? 'Residential Product' }}</span>
                <h1>{{ $rumah->nama_rumah }}</h1>
                <div class="hero-line"></div>
            </div>
        </section>

        <section id="overview" class="content-wrap">
            <div>
                <h2 class="section-title">{{ $rumah->nama_rumah }}</h2>
                <div class="section-line"></div>

                <p class="summary">
                    {{ $summaryText }}
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
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->lantai ?? '1' }} Lantai</li>
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->kamar_tidur ?? '3' }} Kamar Tidur</li>
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->kamar_mandi ?? '2' }} Kamar Mandi</li>
                    <li class="metric-item"><span class="dot"></span> {{ $rumah->carport ?? '1' }} Carport</li>
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
                    @foreach($spesifikasiAktif as $judul => $isi)
                        <details {{ $loop->first ? 'open' : '' }}>
                            <summary>{{ $judul }} <span class="plus">+</span></summary>
                            <p class="spec-content">{{ $isi }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</body>
</html>