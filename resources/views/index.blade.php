<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Green Palm — Find Your Dream Home Today</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('gambar/logo_green_palm.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
      :root{--green:#1E8B57;--dark-green:#166B44;--gold:#D4AF37;--muted:#6B7280;--glass:rgba(255,255,255,0.08)}
      html,body{height:100%;margin:0;font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial}
      body{background:linear-gradient(180deg,#f6fff5 0%, #ffffff 100%);color:#0f172a}
      .container{max-width:1200px;margin:0 auto;padding:28px}
      /* Header */
      header{display:flex;align-items:center;justify-content:space-between;padding:18px 0}
      .brand{display:flex;gap:12px;align-items:center}
      .logo{width:48px;height:48px;border-radius:10px;background:linear-gradient(135deg,var(--green),#4fb07a);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;box-shadow:0 6px 18px rgba(16,24,40,0.08)}
      nav a{margin-left:18px;color:var(--muted);text-decoration:none;font-weight:600}
      nav a.cta{background:var(--gold);color:#062828;padding:10px 14px;border-radius:10px}

      /* Hero */
      .hero{display:grid;grid-template-columns:1fr 440px;gap:28px;align-items:center;margin-top:20px}
      .hero-card{background:linear-gradient(180deg,rgba(255,255,255,0.6),rgba(255,255,255,0.4));padding:36px;border-radius:18px;box-shadow:0 10px 30px rgba(16,24,40,0.06);backdrop-filter: blur(6px)}
      .kicker{display:inline-block;background:var(--green);color:white;padding:8px 12px;border-radius:999px;font-weight:700;margin-bottom:14px}
      h1{font-family:Montserrat,Inter,Arial;font-size:38px;margin:0 0 12px;line-height:1.05;color:#063D2E}
      p.lead{color:var(--muted);margin:0 0 22px}
      .hero-ctas{display:flex;gap:12px}
      .btn{padding:12px 16px;border-radius:12px;font-weight:700;border:0;cursor:pointer}
      .btn.primary{background:var(--green);color:white}
      .btn.ghost{background:transparent;border:2px solid rgba(16,24,40,0.06)}

      .hero-image{border-radius:18px;overflow:hidden;box-shadow:0 20px 40px rgba(16,24,40,0.08)}
      .hero-image img{width:100%;height:100%;display:block;object-fit:cover}

      /* Sections */
      section{margin-top:48px}
      .section-head{display:flex;align-items:center;justify-content:space-between}
      .grid{display:grid;gap:18px}
      .clusters{grid-template-columns:repeat(auto-fit,minmax(240px,1fr));}
      .card{background:white;border-radius:14px;padding:16px;box-shadow:0 8px 24px rgba(16,24,40,0.04)}
      .card img{width: 100%;height: 260px;;object-fit:cover;border-radius:10px}
      .muted{color:var(--muted)}

      /* Facilities */
      .facilities{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:14px}
      .fac{display:flex;gap:12px;align-items:center;padding:12px;border-radius:12px;background:var(--glass);}

      /* Map preview */
      .map{height:260px;border-radius:12px;overflow:hidden}

      /* Promo */
      .promo{background:linear-gradient(90deg, rgba(30,139,87,0.06), rgba(212,175,55,0.04));padding:22px;border-radius:12px;display:flex;align-items:center;justify-content:space-between;gap:12px}

      /* Testimonials */
      .test-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px}
      .testimonial{padding:16px;border-radius:12px;background:#ffffff}

      /* Footer */
      footer{margin-top:48px;padding:30px 0;border-top:1px solid rgba(16,24,40,0.04)}

      /* Floating WhatsApp */
      .whatsapp-fixed{position:fixed;right:18px;bottom:18px;background:linear-gradient(135deg,var(--green),#27a16d);color:white;padding:14px;border-radius:999px;box-shadow:0 12px 30px rgba(16,24,40,0.12);display:flex;gap:12px;align-items:center;text-decoration:none}

      @media (max-width:980px){.hero{grid-template-columns:1fr;}.hero-image{order:-1}.hero-card{order:2}.hero{gap:18px}}

      /* Interaction & micro-animations */
      .reveal{opacity:0;transform:translateY(18px);transition:opacity .7s cubic-bezier(.16,.84,.44,1),transform .7s cubic-bezier(.16,.84,.44,1);will-change:opacity,transform}
      .reveal.in-view{opacity:1;transform:none}
      .card{transition:transform .28s ease,box-shadow .28s ease}
      .card:hover{transform:translateY(-8px) scale(1.01);box-shadow:0 18px 40px rgba(16,24,40,0.08)}
      .hero-image img{transition:transform .6s cubic-bezier(.16,.84,.44,1)}
      .whatsapp-fixed{transition:transform .28s ease,box-shadow .28s ease}
      .whatsapp-fixed.pulse{animation:pulse 2.6s infinite}
      @keyframes pulse{0%{transform:translateY(0)}50%{transform:translateY(-6px)}100%{transform:translateY(0)}}

      /* Typewriter for headline */
      .typewriter{display:inline-block;overflow:hidden;border-right:.12em solid rgba(0,0,0,0.06);white-space:nowrap}
      @keyframes typing{from{width:0}to{width:100%}}
      @keyframes blink{50%{border-color:transparent}} 
    </style>
  </head>
  <body>
    <div class="container">
        <header style="position:fixed;left:24px;right:24px;top:12px;z-index:99;pointer-events:auto;">
            <div style="width:100%;max-width:1200px;margin:0 auto;padding:12px 20px;box-sizing:border-box;
                                    background:rgba(255,255,255,0.9);backdrop-filter:blur(6px);
                                    box-shadow:0 6px 18px rgba(16,24,40,0.06);border:1px solid rgba(16,24,40,0.04);
                                    border-radius:12px;overflow:hidden;display:flex;align-items:center;justify-content:space-between;gap:40px;">
                <div class="brand" style="display:flex;gap:12px;align-items:center">
                    <img src="{{ asset('gambar/logo_green_palm.jpeg') }}" alt="gambar tidak tersedia"
                             style="width:60px;height:60px;object-fit:cover;border-radius:4px"/>
                    <div>
                        <div style="font-weight:800;color:var(--dark-green)">Green Palm</div>
                        <div class="muted" style="font-size:12px">Asri • Modern • Terpercaya</div>
                    </div>
                </div>

                <nav style="display:flex;gap:18px;align-items:center">
                    <a href="#clusters">Tipe</a>
                    <a href="#facilities">Fasilitas</a>
                    <a href="#location">Lokasi</a>
                </nav>
            </div>
        </header>

    <!-- spacer untuk mencegah konten tertutup header -->
    <div style="height:84px"></div>

      <main>
        <div class="hero">
          <div class="hero-card">
            <span class="kicker">Hunian Nyaman & Modern</span>
            <h1>Green Palm – Cari rumah impian anda disini</h1>
            <p class="lead">Hunian nyaman, strategis, dan modern di lingkungan yang hijau. Lingkungan ramah keluarga dengan fasilitas modern dan desain berkelanjutan. 🌿</p>
            <div class="hero-ctas">
              <a href="#clusters" class="btn primary">Lihat Tipe</a>
              <!-- Replace whatsapp number in href with your number -->
            <a href="https://wa.me/6282227274058?text=Hello%20Green%20Palm%2C%20apakah%20tipe%20tersebut%20masih%20tersedia" class="btn ghost" style="display:inline-flex;align-items:center;gap:8px;color:var(--green);border-color:rgba(30,139,87,0.12)">Kontak via WhatsApp</a>
            </div>
          </div>

          <div class="hero-image">
            <img src="{{ asset('gambar/home_page_green_palm.jpeg') }}" alt="gambar tidak tersedia"/>
          </div>
        </div>

        <!-- About -->
        <section id="about">
          <div class="section-head">
            <div>
              <h3 style="margin:0;font-family:Montserrat">Tentang kami</h3>
              <div class="muted">Developer terpercaya yang berfokus pada hunian modern dan ramah lingkungan, menggabungkan kenyamanan dan kemudahan dalam satu kawasan.</div>
            </div>
          </div>
          <div style="display:flex;gap:18px;margin-top:16px;flex-wrap:wrap">
            <div class="card" style="flex:1;min-width:260px">
              <h4 style="margin:0 0 8px">Keunggulan Kami</h4>
              <ul class="muted" style="margin:0;padding-left:18px">
                <li>Lokasi strategis & akses transportasi yang mudah</li>
                <li>Keamanan 24 jam</li>
                <li>Desain yang ramah lingkungan & ruang terbuka hijau</li>
                <li>Tempat tinggal nyaman untuk keluarga</li>
              </ul>
            </div>
            <div class="card" style="flex:1;min-width:260px">
              <h4 style="margin:0 0 8px">Mengapa anda harus memilih kami?</h4>
              <p class="muted">Karena Green Palm menghadirkan hunian modern dengan lingkungan hijau yang asri. Kami mengutamakan keamanan, kenyamanan, dan keberlanjutan untuk keluarga yang mencari hunian jangka panjang.</p>
            </div>
          </div>
        </section>

        <!-- Clusters -->
        <section id="clusters">
          <div class="section-head">
            <h3 style="margin:0;font-family:Montserrat">Tipe Rumah Yang Kami Miliki</h3>
          </div>
          <div class="muted" style="margin-top:6px">Pilih tipe rumah untuk melihat denah, harga, dan ketersediaan.</div>

          <div class="grid clusters" style="margin-top:16px">
            <!-- Card 1 -->
            <div class="card">
              <img src="{{ asset('foto/type_39.jpeg') }}" alt="gambar tidak tersedia"/>             
              <h4 style="margin:12px 0 6px">Type 39</h4>
              <div class="muted">Starting from <strong style="color:var(--dark-green)">IDR 300JT</strong></div>
              <p class="muted" style="font-size:14px">Luxury villas with panoramic views and private pools.</p>
              <div style="margin-top:8px"><a href="#" class="btn" style="background:transparent;color:var(--green);font-weight:700">View Details</a></div>
            </div>

            <!-- Card 2 -->
            <div class="card">
              <img src="{{ asset('foto/type_45.jpeg') }}" alt="gambar tidak tersedia"/>
              <div class="muted">Starting from <strong style="color:var(--dark-green)">IDR 400JT</strong></div>
              <p class="muted" style="font-size:14px">Smart layouts, community parks, and easy financing options.</p>
              <div style="margin-top:8px"><a href="#" class="btn" style="background:transparent;color:var(--green);font-weight:700">View Details</a></div>
            </div>

            <!-- Card  -->
            <div class="card">
              <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9d" alt="Cluster D">
              <h4 style="margin:12px 0 6px">Orchid Row</h4>
              <div class="muted">Starting from <strong style="color:var(--dark-green)">IDR 720M</strong></div>
              <p class="muted" style="font-size:14px">Compact modern homes with shared green courtyards.</p>
              <div style="margin-top:8px"><a href="#" class="btn" style="background:transparent;color:var(--green);font-weight:700">View Details</a></div>
            </div>
          </div>
        </section>

        <!-- Facilities -->
        <section id="facilities">
          <div class="section-head">
            <h3 style="margin:0;font-family:Montserrat">Facilities</h3>
            <div class="muted">Everything you and your family need — nearby and on-site.</div>
          </div>
          <div class="facilities" style="margin-top:16px">
            <div class="fac card"><div style="font-size:20px;color:var(--green)">🔒</div><div><strong>24-hour Security</strong><div class="muted">Gated community & CCTV</div></div></div>
            <div class="fac card"><div style="font-size:20px;color:var(--green)">🎥</div><div><strong>CCTV</strong><div class="muted">Surveillance across common areas</div></div></div>
            <div class="fac card"><div style="font-size:20px;color:var(--green)">🛝</div><div><strong>Playground</strong><div class="muted">Safe play areas for kids</div></div></div>
            <div class="fac card"><div style="font-size:20px;color:var(--green)">🕌</div><div><strong>Mosque</strong><div class="muted">Community prayer facility</div></div></div>
            <div class="fac card"><div style="font-size:20px;color:var(--green)">🌳</div><div><strong>Green Park</strong><div class="muted">Open spaces & landscaping</div></div></div>
            <div class="fac card"><div style="font-size:20px;color:var(--green)">🏃‍♂️</div><div><strong>Jogging Track</strong><div class="muted">Healthy lifestyle amenities</div></div></div>
          </div>
        </section>

        <!-- Location -->
        <section id="location">
          <div class="section-head">
            <h3 style="margin:0;font-family:Montserrat">Lokasi Kami</h3>
            <div class="muted">Terletak di area strategis dengan akses mudah ke berbagai tujuan penting.</div>
          </div>
          <div style="display:flex;gap:18px;margin-top:16px;flex-wrap:wrap">
            <div style="flex:1;min-width:300px">
              <div class="map card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d15824.168657686683!2d112.70329445!3d-7.46058765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2dd7e12b6cd6c8bb%3A0x76ba82b7cbdf1061!2sGreen%20Palm%20Sepande%20(GPS)%20Candi%20Sidoarjo%2C%20GMPR%2B7R3%2C%20Krajan%2C%20Sepande%2C%20Kec.%20Candi%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061271!3m2!1d-7.4641443!2d112.691963!5e0!3m2!1sen!2sid!4v1776132739843!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                  <img src="{{ asset('gambar/home_page_green_palm.jpeg') }}" alt="Map preview of Green Palm location" style="width:100%;height:100%;object-fit:cover;border-radius:10px" loading="lazy"/>
                </a>
              </div>
            </div>
            <div style="flex:1;min-width:260px">
              <ul class="muted" style="padding-left:18px;margin:0">
                <li style="margin-bottom:10px;display:flex;align-items:center;justify-content:space-between">
                  <div><strong>Schools:</strong> SD Islam Al Azhar 52 SIDOARJO - 1 mins</div>
                  <a href="https://maps.app.goo.gl/tbzBKBkqnLPawyoWA" target="_blank" rel="noopener noreferrer" class="btn ghost" style="padding:8px 10px;border-radius:8px;border-color:rgba(30,139,87,0.12);color:var(--green);background:transparent;white-space:nowrap">Lihat rute</a>
                </li>
                <li style="margin-bottom:10px;display:flex;align-items:center;justify-content:space-between">
                  <div><strong>Hospitals:</strong> RSUD R.T. Notopuro Sidoarjo - 15 mins</div>
                  <a href="https://maps.app.goo.gl/prz1H1xQdtNBySPt8" target="_blank" rel="noopener noreferrer" class="btn ghost" style="padding:8px 10px;border-radius:8px;border-color:rgba(30,139,87,0.12);color:var(--green);background:transparent;white-space:nowrap">Lihat rute</a>
                </li>
                <li style="margin-bottom:10px;display:flex;align-items:center;justify-content:space-between">
                  <div><strong>Supermart:</strong> Greensmart - 1 mins</div>
                  <a href="https://maps.app.goo.gl/6G3XhTrGfLmVX6cm6" target="_blank" rel="noopener noreferrer" class="btn ghost" style="padding:8px 10px;border-radius:8px;border-color:rgba(30,139,87,0.12);color:var(--green);background:transparent;white-space:nowrap">Lihat rute</a>
                </li>
                <li style="display:flex;align-items:center;justify-content:space-between">
                  <div><strong>Pintu toll:</strong> Gerbang Toll Sidoarjo - 10 mins</div>
                  <a href="https://maps.app.goo.gl/5vKUGcmY9L4YceoS8" target="_blank" rel="noopener noreferrer" class="btn ghost" style="padding:8px 10px;border-radius:8px;border-color:rgba(30,139,87,0.12);color:var(--green);background:transparent;white-space:nowrap">Lihat rute</a>
                </li>
              </ul>
            </div>
          </div>
        </section>

        <!-- Promo -->
        <section id="promo">
          <div class="promo">
            <div>
              <h4 style="margin:0">Penawaran Spesial</h4>
              <div class="muted">Download brosur sekarang untuk melihat detail perumahan, harga, dan promo eksklusif.</div>
            </div>
            <div style="display:flex;gap:12px;align-items:center">
            <a href="{{ asset('gambar/brosur_green_palm.pdf') }}" class="btn primary" style="display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px 0px;min-width:180px;border-radius:12px;" target="_blank" download="brosur_green_palm.pdf">Get Brochure</a>
            </div>
          </div>
        </section>

        <!-- WhatsApp CTA Banner -->
        <section id="contact" style="margin-top:22px">
          <div style="background:linear-gradient(90deg, rgba(30,139,87,0.06), rgba(212,175,55,0.04));padding:20px;border-radius:12px;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap">
            <div>
              <h3 style="margin:0">Chat Green Palm Sekarang</h3>
              <div class="muted">Hubungi kami melalui WhatsApp untuk mendapat informasi lengkap dan info ketersediaan unit.</div>
            </div>
            <div>
              <a href="https://wa.me/6282227274058?text=Hi%20Green%20Palm%2C%20apakah%20tipe%20ini%20masih%20tersedia" class="btn primary">Chat on WhatsApp</a>
            </div>
          </div>
        </section>

      </main>

      <footer>
        <div style="display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;align-items:flex-start">
          <div style="min-width:220px">
            <div style="font-weight:700;color:var(--dark-green)">Green Palm</div>
            <div class="muted">Jl. Green Palm Residence No.10 • Jakarta • Indonesia</div>
            <div class="muted" style="margin-top:8px">Phone: +62 812-3456-7890</div>
          </div>
          <div style="display:flex;gap:12px;flex-wrap:wrap">
            <div>
              <div style="font-weight:700">Quick Links</div>
              <div class="muted">Clusters • Facilities • Location • Contact</div>
            </div>
            <div>
              <div style="font-weight:700">Follow Us</div>
              <div class="muted">Instagram • Facebook • LinkedIn</div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Floating WhatsApp button (replace number) -->
    <a class="whatsapp-fixed" href="https://wa.me/6281234567890?text=Hello%20Green%20Palm%2C%20I%20want%20a%20brochure" aria-label="Chat on WhatsApp">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.52 3.478A11.883 11.883 0 0012 0C5.373 0 .03 5.343.03 11.97c0 2.108.55 4.18 1.6 6.02L0 24l6.27-1.61a11.92 11.92 0 005.73 1.46c6.628 0 11.97-5.343 11.97-11.97 0-3.19-1.243-6.19-3.44-8.31z" fill="#fff"/><path d="M17.2 14.3c-.3-.15-1.77-.85-2.04-.95-.27-.1-.47-.15-.67.15-.2.3-.75.95-.92 1.14-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.48-1.77-1.65-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.53.15-.17.2-.3.3-.5.1-.2 0-.38-.02-.53-.02-.15-.67-1.62-.92-2.22-.24-.58-.48-.5-.67-.51-.17-.02-.37-.02-.57-.02-.2 0-.53.07-.8.38-.27.3-1.03 1.01-1.03 2.46 0 1.45 1.05 2.85 1.2 3.05.15.2 2.07 3.25 5.02 4.56 2.05.9 2.91.96 3.95.8.22-.03.7-.28.8-.55.1-.27.1-.5.07-.55-.03-.05-.27-.1-.57-.22z" fill="#1E8B57"/></svg>
      <span style="font-weight:700">Chat WhatsApp</span>
    </a>

    <script>
      // Smooth scroll for internal links
      document.querySelectorAll('a[href^="#"]').forEach(a=>{
        a.addEventListener('click', e=>{
          const href=a.getAttribute('href');
          if(href.length>1){
            e.preventDefault();
            document.querySelector(href)?.scrollIntoView({behavior:'smooth',block:'start'});
          }
        })
      });

      // Reveal on scroll for cards, hero, promo, map
      (function(){
        const selectors=['.card','.hero-card','.promo','.map','.hero-image','.section-head'];
        const elems=[...new Set(selectors.flatMap(s=>Array.from(document.querySelectorAll(s))))];
        elems.forEach(el=>el.classList.add('reveal'));
        const io=new IntersectionObserver((entries)=>{
          entries.forEach(entry=>{
            if(entry.isIntersecting){entry.target.classList.add('in-view');}
          });
        },{threshold:0.12});
        elems.forEach(el=>io.observe(el));
      })();

      // Hero image subtle parallax on mouse move
      (function(){
        const heroImage=document.querySelector('.hero-image img');
        const heroWrap=document.querySelector('.hero-image');
        if(heroImage && heroWrap){
          heroWrap.addEventListener('mousemove', e=>{
            const rect=heroWrap.getBoundingClientRect();
            const x=(e.clientX-rect.left)/rect.width-0.5;
            const y=(e.clientY-rect.top)/rect.height-0.5;
            heroImage.style.transform=`translate(${x*6}px,${y*6}px) scale(1.03)`;
          });
          heroWrap.addEventListener('mouseleave', ()=>{heroImage.style.transform='translate(0,0) scale(1)'});
        }
      })();

      // Typewriter headline (non-blocking)
      (function(){
        const h1=document.querySelector('h1');
        if(!h1) return;
        const original=h1.textContent.trim();
        const parts=original.split('–');
        if(parts.length<2) return; // expect format Title – Subtitle
        const title=parts[0].trim()+ ' – ';
        const subtitle=parts.slice(1).join('–').trim();
        h1.textContent='';
        const span=document.createElement('span');
        span.className='typewriter';
        h1.appendChild(document.createTextNode(title));
        h1.appendChild(span);
        let i=0;
        const speed=35;
        function type(){
          if(i<=subtitle.length){span.textContent=subtitle.slice(0,i);i++;setTimeout(type,speed);} else {span.style.borderRight='none'}
        }
        setTimeout(type,600);
      })();

      // Floating WhatsApp pulse (gentle)
      (function(){
        const w=document.querySelector('.whatsapp-fixed');
        if(!w) return;
        setTimeout(()=>w.classList.add('pulse'),1200);
        w.addEventListener('mouseenter', ()=>w.classList.remove('pulse'));
        w.addEventListener('mouseleave', ()=>w.classList.add('pulse'));
      })();
    </script>

  </body>
</html>