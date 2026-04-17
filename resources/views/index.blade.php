<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Green Palm - Find Your Dream Home Today</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('gambar/logo_green_palm.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
      :root {
        --green: #0f9a6d;
        --dark-green: #0a6a4a;
        --ink: #0e1730;
        --muted: #4b5f78;
        --gold: #d5b025;
        --surface: #f5f7fb;
        --card: #ffffff;
        --border: #e7ebf2;
      }

      * {
        box-sizing: border-box;
      }

      html,
      body {
        margin: 0;
        padding: 0;
        font-family: Inter, system-ui, -apple-system, Segoe UI, sans-serif;
        color: var(--ink);
        background: var(--surface);
        scroll-behavior: smooth;
      }

      a {
        color: inherit;
      }

      .container {
        max-width: 1220px;
        margin: 0 auto;
        padding: 0 28px;
      }

      .site-header {
        position: fixed !important;
        top: 0;
        left: 0;
        right: 0;
        z-index: 2000;
        transform: translateZ(0);
        will-change: transform;
        background: linear-gradient(180deg, rgba(0, 82, 50, 0.7), rgba(0, 82, 50, 0.52));
        border-bottom: 1px solid rgba(255, 255, 255, 0.16);
        backdrop-filter: blur(10px);
      }

      .header-inner {
        width: 100%;
        max-width: none;
        margin: 0;
        padding: 14px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        transition: background 0.25s ease, padding 0.25s ease;
      }

      .site-header.scrolled .header-inner {
        background: transparent;
        padding-top: 10px;
        padding-bottom: 10px;
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 12px;
      }

      .brand img {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        object-fit: cover;
      }

      .brand-title {
        font-weight: 800;
        font-family: Montserrat, Inter, sans-serif;
        color: #ffffff;
      }

      .brand-sub {
        color: rgba(255, 255, 255, 0.72);
        font-size: 12px;
      }

      .site-nav {
        display: flex;
        align-items: center;
        gap: 18px;
      }

      .site-nav a {
        text-decoration: none;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.92);
        transition: color 0.2s ease, opacity 0.2s ease;
      }

      .site-nav a:hover {
        color: #ffffff;
      }

      .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .cta-apply {
        text-decoration: none;
        font-weight: 700;
        padding: 9px 16px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.92);
        border: 1px solid transparent;
        transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
      }

      .cta-apply.primary {
        background: linear-gradient(135deg, #0fb276, #0c9564);
        color: #ffffff;
        box-shadow: 0 8px 20px rgba(10, 149, 100, 0.28);
      }

      .cta-apply.gold {
        background: linear-gradient(135deg, #efd66d, #ddb842);
        color: #24300f;
        box-shadow: 0 8px 20px rgba(221, 184, 66, 0.3);
      }

      .cta-apply:hover {
        transform: translateY(-2px);
      }

      .cta-apply.primary:hover {
        filter: brightness(1.05);
        box-shadow: 0 12px 22px rgba(10, 149, 100, 0.35);
      }

      .cta-apply.gold:hover {
        filter: brightness(1.04);
        box-shadow: 0 12px 22px rgba(221, 184, 66, 0.38);
      }

      .hero {
        min-height: 100vh;
        background:
          linear-gradient(110deg, rgba(7, 15, 28, 0.72) 0%, rgba(6, 14, 27, 0.46) 45%, rgba(4, 12, 24, 0.64) 100%),
          url("{{ asset('gambar/home_page_green_palm.jpeg') }}") center center / cover no-repeat;
        display: grid;
        align-items: center;
        position: relative;
        overflow: hidden;
      }

      .hero::after {
        content: "";
        position: absolute;
        inset: auto 0 0 0;
        height: 180px;
        background: linear-gradient(to top, rgba(4, 9, 18, 0.45), transparent);
      }

      .hero-content {
        position: relative;
        z-index: 2;
        max-width: 640px;
        padding-top: 110px;
        padding-bottom: 70px;
      }

      .kicker {
        display: inline-flex;
        align-items: center;
        font-weight: 700;
        color: #74f0bf;
        background: rgba(15, 154, 109, 0.28);
        border: 1px solid rgba(85, 239, 176, 0.34);
        border-radius: 999px;
        padding: 9px 14px;
        font-size: 14px;
        margin-bottom: 18px;
      }

      .hero h1 {
        margin: 0;
        font-family: Montserrat, Inter, sans-serif;
        color: #fff;
        font-size: clamp(2.3rem, 5vw, 4rem);
        line-height: 1.08;
        letter-spacing: -0.02em;
      }

      .hero .lead {
        margin-top: 16px;
        margin-bottom: 24px;
        color: #e9eef7;
        font-size: clamp(1rem, 1.6vw, 1.2rem);
        line-height: 1.55;
        max-width: 560px;
      }

      .hero-ctas {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
      }

      .btn {
        border: none;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        padding: 13px 22px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, color 0.2s ease;
      }

      .btn.primary {
        background: var(--green);
        color: #fff;
        box-shadow: 0 10px 28px rgba(10, 154, 109, 0.28);
      }

      .btn.ghost {
        background: #fff;
        color: #0f2745;
      }

      .btn:hover {
        transform: translateY(-3px);
      }

      .btn.primary:hover {
        box-shadow: 0 16px 30px rgba(10, 154, 109, 0.33);
      }

      .btn.ghost:hover {
        background: #eef3fa;
      }

      .scroll-hint {
        position: absolute;
        left: 50%;
        bottom: 24px;
        transform: translateX(-50%);
        color: rgba(255, 255, 255, 0.92);
        font-size: 30px;
        z-index: 3;
        animation: up-down 1.8s infinite ease-in-out;
      }

      @keyframes up-down {
        0%,
        100% {
          transform: translateX(-50%) translateY(0);
        }
        50% {
          transform: translateX(-50%) translateY(-7px);
        }
      }

      section {
        padding: 84px 0;
      }

      .section-title-wrap {
        text-align: center;
        max-width: 900px;
        margin: 0 auto 44px;
      }

      .section-title {
        margin: 0;
        font-family: Montserrat, Inter, sans-serif;
        font-size: clamp(2rem, 3.5vw, 3.2rem);
        line-height: 1.15;
        letter-spacing: -0.02em;
      }

      .section-title .accent {
        color: var(--green);
      }

      .section-divider {
        width: 96px;
        height: 4px;
        border-radius: 999px;
        margin: 14px auto 20px;
        background: linear-gradient(90deg, var(--green), var(--gold));
      }

      .section-desc {
        margin: 0;
        font-size: 1.04rem;
        line-height: 1.55;
        color: var(--muted);
      }

      .feature-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
      }

      .feature-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 30px 26px;
        box-shadow: 0 8px 22px rgba(15, 24, 42, 0.05);
      }

      .feature-icon {
        width: 64px;
        height: 64px;
        border-radius: 14px;
        background: var(--green);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        box-shadow: 0 10px 18px rgba(15, 24, 42, 0.12);
      }

      .feature-icon svg {
        width: 30px;
        height: 30px;
        stroke: currentColor;
        fill: none;
        stroke-width: 1.9;
        stroke-linecap: round;
        stroke-linejoin: round;
      }

      .feature-card h4 {
        margin: 0 0 10px;
        font-family: Montserrat, Inter, sans-serif;
        font-size: 1.18rem;
      }

      .feature-card p {
        margin: 0;
        line-height: 1.5;
        color: var(--muted);
      }

      #clusters {
        background: #eef4f8;
      }

      .section-top-row {
        display: flex;
        justify-content: center;
        text-align: center;
      }

      .section-top-row h3 {
        margin: 0;
        font-family: Montserrat, Inter, sans-serif;
        font-size: clamp(1.9rem, 3.3vw, 2.8rem);
      }

      .section-top-row .accent {
        color: var(--green);
      }

      .clusters-sub {
        text-align: center;
        color: var(--muted);
        margin-top: 8px;
      }

      .grid.clusters {
        margin-top: 28px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 18px;
      }

      .card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 16px;
        box-shadow: 0 8px 24px rgba(16, 24, 40, 0.05);
      }

      .card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 10px;
      }

      .muted {
        color: var(--muted);
      }

      #facilities {
        background: var(--surface);
      }

      .facility-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 20px;
      }

      .facility-item {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 24px 16px;
        text-align: center;
        box-shadow: 0 8px 22px rgba(16, 24, 40, 0.05);
      }

      .facility-badge {
        width: 62px;
        height: 62px;
        margin: 0 auto 14px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 30px;
        box-shadow: 0 10px 18px rgba(15, 24, 42, 0.12);
      }

      .facility-badge svg {
        width: 30px;
        height: 30px;
        stroke: currentColor;
        fill: none;
        stroke-width: 1.9;
        stroke-linecap: round;
        stroke-linejoin: round;
      }

      .facility-item strong {
        display: block;
        font-size: 1.05rem;
        margin-bottom: 4px;
      }

      .facility-item .muted {
        font-size: 0.95rem;
      }

      #location {
        background: #eef4f7;
      }

      .location-layout {
        display: grid;
        grid-template-columns: 1fr 1.05fr;
        gap: 26px;
        align-items: stretch;
      }

      .location-map {
        min-height: 420px;
        border-radius: 18px;
        background: linear-gradient(170deg, #0da06f, #067c56);
        color: #fff;
        padding: 30px;
        display: grid;
        place-items: center;
        text-align: center;
        box-shadow: 0 14px 28px rgba(8, 92, 64, 0.24);
      }

      .location-map .map-icon {
        font-size: 70px;
        opacity: 0.94;
        margin-bottom: 8px;
      }

      .location-map h4 {
        margin: 0 0 10px;
        font-family: Montserrat, Inter, sans-serif;
        font-size: 2rem;
      }

      .location-map p {
        margin: 0;
        line-height: 1.45;
        color: rgba(255, 255, 255, 0.92);
      }

      .location-list {
        display: grid;
        gap: 14px;
      }

      .location-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 16px;
        box-shadow: 0 8px 20px rgba(16, 24, 40, 0.06);
      }

      .location-item-icon {
        min-width: 48px;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--green);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
      }

      .location-item-main {
        flex: 1;
      }

      .location-item-main h5 {
        margin: 2px 0 8px;
        font-family: Montserrat, Inter, sans-serif;
        font-size: 1.18rem;
      }

      .location-item-main ul {
        margin: 0;
        padding-left: 18px;
        color: var(--muted);
      }

      .location-item-main li {
        margin-bottom: 4px;
      }

      .distance-pill {
        background: #c8f4df;
        color: #07885e;
        font-weight: 700;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 0.93rem;
        white-space: nowrap;
      }

      .route-link {
        margin-top: 10px;
        display: inline-flex;
        color: var(--green);
        text-decoration: none;
        font-weight: 700;
        font-size: 0.95rem;
      }

      #promo .promo,
      #contact .contact-cta {
        border: 1px solid var(--border);
        background: linear-gradient(95deg, rgba(15, 154, 109, 0.07), rgba(213, 176, 37, 0.06));
        border-radius: 16px;
        padding: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        flex-wrap: wrap;
      }

      .callout-btn {
        border: 0;
        border-radius: 12px;
        text-decoration: none;
        color: #fff;
        font-weight: 700;
        padding: 12px 20px;
        min-width: 180px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--green), #0a7d59);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .callout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(10, 125, 89, 0.3);
      }

      footer {
        margin-top: 28px;
        background: #162e27;
        color: #e0e7ff;
        padding: 44px 0 24px;
      }

      .footer-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 40px;
        margin-bottom: 30px;
      }

      .footer-link {
        text-decoration: none;
        color: #d1d5db;
      }

      .footer-link:hover {
        color: #94f1ca;
      }

      .socials {
        display: flex;
        gap: 10px;
      }

      .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.14);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
      }

      .social-icon:hover {
        background: var(--green);
      }

      .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 10px;
        color: #a9b2be;
        font-size: 14px;
      }

      .whatsapp-fixed {
        position: fixed;
        right: 18px;
        bottom: 18px;
        width: 56px;
        height: 56px;
        border-radius: 999px;
        background: linear-gradient(135deg, #06be63, #0a9c55);
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 14px 24px rgba(8, 83, 50, 0.35);
        z-index: 999;
        padding: 0;
        overflow: hidden;
      }

      .whatsapp-fixed svg {
        width: 27px;
        height: 27px;
        display: block;
        flex-shrink: 0;
      }

      .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.65s ease, transform 0.65s ease;
      }

      .reveal.in-view {
        opacity: 1;
        transform: translateY(0);
      }

      @media (max-width: 1080px) {
        .feature-grid,
        .facility-grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .location-layout {
          grid-template-columns: 1fr;
        }

        .location-map {
          min-height: 300px;
        }
      }

      @media (max-width: 860px) {
        .site-nav {
          display: none;
        }

        .hero-content {
          padding-top: 120px;
        }

        .footer-grid {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 680px) {
        .container {
          padding: 0 18px;
        }

        .site-header {
          top: 0;
          left: 0;
          right: 0;
        }

        .header-inner {
          margin: 0;
          padding: 12px 14px;
        }

        .brand img {
          width: 44px;
          height: 44px;
        }

        .brand-title {
          font-size: 0.95rem;
        }

        .header-actions {
          gap: 8px;
        }

        .cta-apply {
          padding: 8px 12px;
          font-size: 0.85rem;
        }

        .hero {
          min-height: 92vh;
        }

        .feature-grid,
        .facility-grid {
          grid-template-columns: 1fr;
        }

        .section-title-wrap {
          margin-bottom: 30px;
        }

        section {
          padding: 64px 0;
        }
      }
    </style>
  </head>
  <body>
    <header class="site-header" aria-label="Main header">
      <div class="header-inner">
        <div class="brand">
          <img src="{{ asset('gambar/logo_green_palm.jpeg') }}" alt="Green Palm logo" />
          <div>
            <div class="brand-title">Green Palm</div>
            <div class="brand-sub">Asri - Modern - Terpercaya</div>
          </div>
        </div>

        <nav class="site-nav" role="navigation" aria-label="Primary">
          <a href="#about">Tentang</a>
          <a href="#clusters">Tipe</a>
          <a href="#facilities">Fasilitas</a>
          <a href="#location">Lokasi</a>
        </nav>

        <div class="header-actions">
          <a href="https://wa.me/6282227274058?text=Halo%20Green%20Palm" class="cta-apply primary" aria-label="Hubungi via WhatsApp">Hubungi</a>
          <a href="{{ asset('gambar/brosur_green_palm.pdf') }}" target="_blank" class="cta-apply gold" aria-label="Download brosur">Brosur</a>
        </div>
      </div>
    </header>

    <section class="hero" id="home">
      <div class="container hero-content">
        <span class="kicker">Hunian Nyaman & Modern</span>
        <h1>Green Palm - Cari rumah impian anda disini</h1>
        <p class="lead">Hunian nyaman, strategis, dan modern di lingkungan yang hijau. Lingkungan ramah keluarga dengan fasilitas modern dan desain berkelanjutan. 🌿</p>
        <div class="hero-ctas">
          <a href="#clusters" class="btn primary">Lihat Tipe</a>
          <a href="https://wa.me/6282227274058?text=Hello%20Green%20Palm%2C%20apakah%20tipe%20tersebut%20masih%20tersedia" class="btn ghost">Kontak via WhatsApp</a>
        </div>
      </div>
      <div class="scroll-hint">&#709;</div>
    </section>

    <main>
      <section id="about">
        <div class="container">
          <div class="section-title-wrap reveal">
            <h2 class="section-title">Tentang <span class="accent">kami</span></h2>
            <div class="section-divider"></div>
            <p class="section-desc">Developer terpercaya yang berfokus pada hunian modern dan ramah lingkungan, menggabungkan kenyamanan dan kemudahan dalam satu kawasan.</p>
          </div>

          <div class="feature-grid">
            <article class="feature-card reveal">
              <div class="feature-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 21s-6-4.8-6-10a6 6 0 1 1 12 0c0 5.2-6 10-6 10z"></path>
                  <circle cx="12" cy="11" r="2.2"></circle>
                </svg>
              </div>
              <h4>Lokasi strategis & akses transportasi yang mudah</h4>
              <p>Mudah menjangkau area bisnis, sekolah, dan pusat kebutuhan harian.</p>
            </article>
            <article class="feature-card reveal">
              <div class="feature-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 3l7 3v5c0 4.5-3 8.7-7 10-4-1.3-7-5.5-7-10V6l7-3z"></path>
                  <path d="M9.5 12.2l1.9 1.9 3.2-3.9"></path>
                </svg>
              </div>
              <h4>Keamanan 24 jam</h4>
              <p>Lingkungan aman dengan pengawasan berlapis untuk kenyamanan keluarga.</p>
            </article>
            <article class="feature-card reveal">
              <div class="feature-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 20V9"></path>
                  <path d="M8 20c0-4 1.8-6.5 4-6.5S16 16 16 20"></path>
                  <path d="M5 11c1.5-1.2 2.8-1.8 4.5-1.8S13 10 15 12c1.4-2.4 3.2-3.5 4.8-3.8"></path>
                  <path d="M7 8c1-2.2 2.7-3.4 5-3.4S16 5.8 17 8"></path>
                </svg>
              </div>
              <h4>Desain yang ramah lingkungan & ruang terbuka hijau</h4>
              <p>Udara lebih segar dengan tata kawasan yang hijau dan berkelanjutan.</p>
            </article>
            <article class="feature-card reveal">
              <div class="feature-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 21s-7-4.6-7-10a4.2 4.2 0 0 1 7-3.2A4.2 4.2 0 0 1 19 11c0 5.4-7 10-7 10z"></path>
                </svg>
              </div>
              <h4>Tempat tinggal nyaman untuk keluarga</h4>
              <p>Ruang hunian modern yang dirancang untuk aktivitas keluarga sehari-hari.</p>
            </article>
          </div>

          <div class="card reveal" style="margin-top:22px;">
            <h4 style="margin:0 0 8px;">Mengapa anda harus memilih kami?</h4>
            <p class="muted" style="margin:0;">Karena Green Palm menghadirkan hunian modern dengan lingkungan hijau yang asri. Kami mengutamakan keamanan, kenyamanan, dan keberlanjutan untuk keluarga yang mencari hunian jangka panjang.</p>
          </div>
        </div>
      </section>

      <section id="clusters">
        <div class="container">
          <div class="section-top-row reveal">
            <h3>Tipe Rumah Yang Kami <span class="accent">Miliki</span></h3>
          </div>
          <div class="section-divider"></div>
          <p class="clusters-sub">Pilih tipe rumah untuk melihat denah, harga, dan ketersediaan.</p>
          <p class="clusters-sub">Pilihan rumah</p>

          <div class="grid clusters">
            @foreach($rumah as $r)
              <div class="card reveal">
                @if($r->foto)
                  <img src="{{ asset('images/'.$r->foto) }}" alt="gambar" style="width:100%;height:260px;object-fit:cover;border-radius:10px">
                @endif

                <h4 style="margin:12px 0 6px;">{{ $r->nama_rumah }}</h4>

                <div class="muted">Rp {{ number_format($r->harga,0,',','.') }}</div>

                <p class="muted" style="font-size:14px;">{{ $r->deskripsi }}</p>

                <p class="text-sm text-gray-500">
                  @if($r->tipe)
                    {{ $r->tipe->nama_tipe }}
                  @else
                    -
                  @endif
                </p>

                <span style="display:inline-block;margin-top:6px;padding:4px 10px;border-radius:999px;font-size:12px;color:white;background: {{ $r->status == 'Tersedia' ? '#22c55e' : '#ef4444' }};">
                  {{ $r->status }}
                </span>

                <div style="margin-top:10px;">
                  <a href="/detail/{{ $r->id }}" class="btn" style="background:transparent;color:var(--green);font-weight:700;padding:0;">View Details</a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>

      <section id="facilities">
        <div class="container">
          <div class="section-title-wrap reveal">
            <h2 class="section-title">Facilities</h2>
            <div class="section-divider"></div>
            <p class="section-desc">Everything you and your family need - nearby and on-site.</p>
          </div>

          <div class="facility-grid">
            <div class="facility-item reveal">
              <div class="facility-badge" style="background:#2957f0;">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 3l7 3v5c0 4.5-3 8.7-7 10-4-1.3-7-5.5-7-10V6l7-3z"></path>
                  <path d="M9.5 12.2l1.9 1.9 3.2-3.9"></path>
                </svg>
              </div>
              <strong>24-hour Security</strong>
              <div class="muted">Gated community & CCTV</div>
            </div>
            <div class="facility-item reveal">
              <div class="facility-badge" style="background:#8b1eea;">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M7 7h10a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"></path>
                  <path d="M9 7l1.5-2h3L15 7"></path>
                  <circle cx="12" cy="13" r="2.5"></circle>
                </svg>
              </div>
              <strong>Mosque</strong>
              <div class="muted">Community prayer facility</div>
            </div>
            <div class="facility-item reveal">
              <div class="facility-badge" style="background:#0d9a6e;">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 20V9"></path>
                  <path d="M8 20c0-4 1.8-6.5 4-6.5S16 16 16 20"></path>
                  <path d="M5 11c1.5-1.2 2.8-1.8 4.5-1.8S13 10 15 12c1.4-2.4 3.2-3.5 4.8-3.8"></path>
                  <path d="M7 8c1-2.2 2.7-3.4 5-3.4S16 5.8 17 8"></path>
                </svg>
              </div>
              <strong>Green Park</strong>
              <div class="muted">Open spaces & landscaping</div>
            </div>
            <div class="facility-item reveal">
              <div class="facility-badge" style="background:#e3154d;">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 21s-7-4.6-7-10a4.2 4.2 0 0 1 7-3.2A4.2 4.2 0 0 1 19 11c0 5.4-7 10-7 10z"></path>
                </svg>
              </div>
              <strong>Comfort Zone</strong>
              <div class="muted">Family-focused living area</div>
            </div>
          </div>
        </div>
      </section>

      <section id="location">
        <div class="container">
          <div class="section-title-wrap reveal">
            <h2 class="section-title">Lokasi <span class="accent">Kami</span></h2>
            <div class="section-divider"></div>
            <p class="section-desc">Terletak di area strategis dengan akses mudah ke berbagai tujuan penting.</p>
          </div>

          <div class="location-layout">
            <div class="location-map reveal">
              <div>
                <div class="map-icon">&#128205;</div>
                <h4>Green Palm Location</h4>
                <p>Krajan, Sepande</p>
                <p>Kota Sidoarjo, 61271</p>
                <p>Indonesia</p>
              </div>
            </div>

            <div class="location-list">
              <article class="location-item reveal">
                <div class="location-item-icon">&#127979;</div>
                <div class="location-item-main">
                  <h5>Schools</h5>
                  <ul>
                    <li>SD Islam Al Azhar 52 SIDOARJO - 1 mins</li>
                  </ul>
                  <a href="https://maps.app.goo.gl/tbzBKBkqnLPawyoWA" target="_blank" rel="noopener noreferrer" class="route-link">Lihat rute</a>
                </div>
                <div class="distance-pill">500m - 2km</div>
              </article>

              <article class="location-item reveal">
                <div class="location-item-icon">&#127973;</div>
                <div class="location-item-main">
                  <h5>Hospitals</h5>
                  <ul>
                    <li>RSUD R.T. Notopuro Sidoarjo - 15 mins</li>
                  </ul>
                  <a href="https://maps.app.goo.gl/prz1H1xQdtNBySPt8" target="_blank" rel="noopener noreferrer" class="route-link">Lihat rute</a>
                </div>
                <div class="distance-pill">1km - 3km</div>
              </article>

              <article class="location-item reveal">
                <div class="location-item-icon">&#128722;</div>
                <div class="location-item-main">
                  <h5>Supermart</h5>
                  <ul>
                    <li>Greensmart - 1 mins</li>
                  </ul>
                  <a href="https://maps.app.goo.gl/6G3XhTrGfLmVX6cm6" target="_blank" rel="noopener noreferrer" class="route-link">Lihat rute</a>
                </div>
                <div class="distance-pill">1.5km</div>
              </article>

              <article class="location-item reveal">
                <div class="location-item-icon">&#128739;</div>
                <div class="location-item-main">
                  <h5>Pintu toll</h5>
                  <ul>
                    <li>Gerbang Toll Sidoarjo - 10 mins</li>
                  </ul>
                  <a href="https://maps.app.goo.gl/5vKUGcmY9L4YceoS8" target="_blank" rel="noopener noreferrer" class="route-link">Lihat rute</a>
                </div>
                <div class="distance-pill">800m</div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section id="promo">
        <div class="container">
          <div class="promo reveal">
            <div>
              <h4 style="margin:0;">Penawaran Spesial</h4>
              <div class="muted">Download brosur sekarang untuk melihat detail perumahan, harga, dan promo eksklusif.</div>
            </div>
            <div>
              <a href="{{ asset('gambar/brosur_green_palm.pdf') }}" class="callout-btn" target="_blank" download="brosur_green_palm.pdf">Get Brochure</a>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" style="padding-top: 0;">
        <div class="container">
          <div class="contact-cta reveal">
            <div>
              <h3 style="margin:0;">Chat Green Palm Sekarang</h3>
              <div class="muted">Hubungi kami melalui WhatsApp untuk mendapat informasi lengkap dan info ketersediaan unit.</div>
            </div>
            <div>
              <a href="https://wa.me/6282227274058?text=Hi%20Green%20Palm%2C%20apakah%20tipe%20ini%20masih%20tersedia" class="callout-btn">Chat on WhatsApp</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="container">
        <div class="footer-grid">
          <div>
            <div style="display:flex;gap:8px;align-items:center;margin-bottom:12px;">
              <img src="{{ asset('gambar/logo_green_palm.jpeg') }}" alt="Green Palm" style="width:40px;height:40px;object-fit:cover;border-radius:8px;"/>
              <div style="font-weight:700;font-size:18px;">Green Palm</div>
            </div>
            <p style="color:#9ca3af;margin:0 0 18px;line-height:1.6;">Your trusted partner in finding the perfect tropical modern home. Quality living spaces designed for families.</p>
            <div class="socials">
              <a href="#" class="social-icon">f</a>
              <a href="#" class="social-icon">i</a>
              <a href="#" class="social-icon">x</a>
              <a href="#" class="social-icon">in</a>
            </div>
          </div>

          <div>
            <h4 style="margin:0 0 18px;font-weight:700;font-size:16px;">Quick Links</h4>
            <ul style="margin:0;padding:0;list-style:none;">
              <li style="margin-bottom:10px;"><a href="#" class="footer-link">Home</a></li>
              <li style="margin-bottom:10px;"><a href="#about" class="footer-link">About Us</a></li>
              <li style="margin-bottom:10px;"><a href="#clusters" class="footer-link">Clusters</a></li>
              <li style="margin-bottom:10px;"><a href="#facilities" class="footer-link">Facilities</a></li>
              <li style="margin-bottom:10px;"><a href="#location" class="footer-link">Location</a></li>
              <li style="margin-bottom:10px;"><a href="#contact" class="footer-link">Contact</a></li>
            </ul>
          </div>

          <div>
            <h4 style="margin:0 0 18px;font-weight:700;font-size:16px;">Contact Us</h4>
            <div style="margin-bottom:16px;">
              <div style="display:flex;gap:10px;align-items:flex-start;">
                <span style="color:var(--green);margin-top:2px;">&#128205;</span>
                <div>
                  <div style="color:#d1d5db;">Krajan, Sepande</div>
                  <div style="color:#d1d5db;">Kota Sidoarjo, 61271</div>
                  <div style="color:#d1d5db;">Indonesia</div>
                </div>
              </div>
            </div>
            <div style="margin-bottom:10px;display:flex;gap:10px;align-items:center;">
              <span style="color:var(--green);">&#128222;</span>
              <a href="tel:+62 822-2727-4058" class="footer-link">+62 822-2727-4058</a>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <div>© 2026 Green Palm. All rights reserved.</div>
          <div>Developed with <span style="color:var(--green);">CornerFieldClub</span> for Modern Tropical Living</div>
        </div>
      </div>
    </footer>

    <a href="https://wa.me/6282227274058?text=Hello%20Green%20Palm%2C%20saya%20ingin%20tanya%20lebih%20lanjut" class="whatsapp-fixed" aria-label="Chat on WhatsApp">
      <svg viewBox="0 0 16 16" aria-hidden="true" focusable="false">
        <path fill="currentColor" d="M13.601 2.326A7.854 7.854 0 0 0 8.04 0C3.65 0 .073 3.577.073 7.967c0 1.4.366 2.77 1.06 3.98L0 16l4.173-1.094a7.93 7.93 0 0 0 3.867 1h.003c4.39 0 7.967-3.577 7.967-7.967a7.95 7.95 0 0 0-2.409-5.613zM8.043 14.63a6.57 6.57 0 0 1-3.351-.92l-.24-.144-2.475.649.66-2.413-.156-.247a6.56 6.56 0 0 1-1.008-3.505c0-3.626 2.95-6.576 6.578-6.576a6.53 6.53 0 0 1 4.648 1.93 6.53 6.53 0 0 1 1.92 4.65c-.001 3.626-2.95 6.575-6.576 6.575z"></path>
        <path fill="currentColor" d="M11.815 9.983c-.198-.099-1.17-.578-1.352-.644-.182-.066-.315-.099-.447.1-.132.198-.513.644-.628.776-.116.132-.231.149-.43.05-.198-.1-.836-.308-1.592-.983-.588-.525-.985-1.174-1.1-1.372-.116-.198-.012-.305.087-.404.089-.088.198-.231.297-.347.099-.115.132-.198.198-.33.066-.132.033-.248-.017-.347-.05-.099-.446-1.076-.611-1.473-.161-.387-.325-.334-.446-.34a7.004 7.004 0 0 0-.38-.006c-.132 0-.347.05-.53.248-.182.198-.694.677-.694 1.65s.71 1.914.81 2.046c.099.132 1.398 2.136 3.39 2.995.474.205.843.328 1.132.42.475.152.908.13 1.25.079.381-.057 1.17-.479 1.336-.942.165-.463.165-.86.116-.942-.05-.083-.182-.132-.38-.231z"></path>
      </svg>
    </a>

    <script>
      (function () {
        var header = document.querySelector('.site-header');
        if (!header) return;

        function onScroll() {
          if (window.scrollY > 20) {
            header.classList.add('scrolled');
          } else {
            header.classList.remove('scrolled');
          }
        }

        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
      })();

      (function () {
        var targets = Array.prototype.slice.call(document.querySelectorAll('.reveal'));
        if (!targets.length || !('IntersectionObserver' in window)) {
          targets.forEach(function (el) { el.classList.add('in-view'); });
          return;
        }

        var io = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('in-view');
              io.unobserve(entry.target);
            }
          });
        }, { threshold: 0.12 });

        targets.forEach(function (el) { io.observe(el); });
      })();
    </script>
  </body>
</html>
