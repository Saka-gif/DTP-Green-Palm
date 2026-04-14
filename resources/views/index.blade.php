<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Green Palm — Find Your Dream Home Today</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="brand">
          <img src="{{ asset('gambar/logo_green_palm.jpeg') }}" alt="gambar tidak tersedia" style="width:36px;height:36px;object-fit:cover;border-radius:8px"/>
          <div>
            <div style="font-weight:700;color:var(--dark-green)">Green Palm</div>
            <div class="muted" style="font-size:12px">Eco-living • Modern • Trusted</div>
          </div>
        </div>
        <nav>
          <a href="#clusters">Clusters</a>
          <a href="#facilities">Facilities</a>
          <a href="#location">Location</a>
          <a href="#contact" class="cta">Contact via WhatsApp</a>
        </nav>
      </header>

      <main>
        <div class="hero">
          <div class="hero-card">
            <span class="kicker">Hunian Nyaman & Modern</span>
            <h1>Green Palm – Cari rumah impian anda disini</h1>
            <p class="lead">Hunian nyaman, strategis, dan modern di lingkungan yang hijau. Lingkungan ramah keluarga dengan fasilitas modern dan desain berkelanjutan. 🌿</p>
            <div class="hero-ctas">
              <a href="#clusters" class="btn primary">View Clusters</a>
              <!-- Replace whatsapp number in href with your number -->
              <a href="https://wa.me/6281234567890?text=Hello%20Green%20Palm%2C%20please%20send%20the%20brochure" class="btn ghost" style="display:inline-flex;align-items:center;gap:8px;">Contact via WhatsApp</a>
            </div>

            <div style="margin-top:18px;display:flex;gap:12px;flex-wrap:wrap">
              <div style="min-width:140px;background:white;padding:12px;border-radius:12px;box-shadow:0 6px 20px rgba(16,24,40,0.04)">
                <div style="font-weight:700;color:var(--dark-green)">Strategic Location</div>
                <div class="muted" style="font-size:13px">Close to schools, malls & tolls</div>
              </div>
              <div style="min-width:140px;background:white;padding:12px;border-radius:12px;box-shadow:0 6px 20px rgba(16,24,40,0.04)">
                <div style="font-weight:700;color:var(--dark-green)">24-hour Security</div>
                <div class="muted" style="font-size:13px">Safe & gated community</div>
              </div>
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
              <h3 style="margin:0;font-family:Montserrat">About Green Palm</h3>
              <div class="muted">A trusted developer focused on modern, eco-friendly residential clusters that combine comfort and convenience.</div>
            </div>
          </div>
          <div style="display:flex;gap:18px;margin-top:16px;flex-wrap:wrap">
            <div class="card" style="flex:1;min-width:260px">
              <h4 style="margin:0 0 8px">Our Values</h4>
              <ul class="muted" style="margin:0;padding-left:18px">
                <li>Strategic location & transit access</li>
                <li>24-hour security & CCTV</li>
                <li>Eco-friendly design & green open spaces</li>
                <li>Comfortable family living</li>
              </ul>
            </div>
            <div class="card" style="flex:1;min-width:260px">
              <h4 style="margin:0 0 8px">Why Choose Us</h4>
              <p class="muted">Green Palm blends modern architecture with lush tropical landscaping. We prioritize safety, community, and sustainability for families seeking a long-term home.</p>
            </div>
          </div>
        </section>

      <!-- Clusters -->
<!-- Clusters -->
<section id="clusters">
  <div class="section-head">
    <h3 style="margin:0;font-family:Montserrat">Featured Clusters</h3>
  </div>

  <div class="muted" style="margin-top:6px">
    Pilihan rumah
  </div>

  <div class="grid clusters" style="margin-top:16px">
    @foreach($rumah as $r)
    <div class="card">
      @if($r->foto)
        <img src="{{ asset('images/'.$r->foto) }}" alt="gambar" style="width:100%;height:260px;object-fit:cover;border-radius:10px">
      @endif

      <h4 style="margin:12px 0 6px">
        {{ $r->nama_rumah }}
      </h4>

      <div class="muted">
        Rp {{ number_format($r->harga,0,',','.') }}
      </div>

      <p class="muted" style="font-size:14px">
        {{ $r->deskripsi }}
      </p>

      <div style="margin-top:8px">
        <a href="/detail/{{ $r->id }}" 
           class="btn" 
           style="background:transparent;color:var(--green);font-weight:700">
           View Details
        </a>
      </div>
    </div>
    @endforeach
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
            <h3 style="margin:0;font-family:Montserrat">Location</h3>
            <div class="muted">Convenient access to key destinations.</div>
          </div>
          <div style="display:flex;gap:18px;margin-top:16px;flex-wrap:wrap">
            <div style="flex:1;min-width:300px">
              <div class="map card"><img src="https://images.unsplash.com/photo-1503264116251-35a269479413?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=7e" alt="Map preview" style="width:100%;height:100%;object-fit:cover;border-radius:10px"/></div>
            </div>
            <div style="flex:1;min-width:260px">
              <ul class="muted" style="padding-left:18px">
                <li><strong>Schools:</strong> Green Palm International School - 5 mins</li>
                <li><strong>Hospitals:</strong> Palm Care Hospital - 8 mins</li>
                <li><strong>Malls:</strong> Emerald Mall - 12 mins</li>
                <li><strong>Toll Road:</strong> Quick access to Jakarta toll - 10 mins</li>
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
              <h3 style="margin:0">Chat Green Palm now for brochure & best deals</h3>
              <div class="muted">Fast responses via WhatsApp — ask for floor plans, available units, and promos.</div>
            </div>
            <div>
              <a href="https://wa.me/6281234567890?text=Hi%20Green%20Palm%2C%20I%27d%20like%20the%20brochure" class="btn primary">Chat on WhatsApp</a>
            </div>
          </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials">
          <div class="section-head">
            <h3 style="margin:0;font-family:Montserrat">Testimonials</h3>
            <div class="muted">What our homeowners say</div>
          </div>
          <div class="test-grid" style="margin-top:16px">
            <div class="testimonial card">
              <div style="display:flex;gap:12px;align-items:center">
                <img src="https://i.pravatar.cc/60?img=5" alt="profile" style="width:48px;height:48px;border-radius:999px;object-fit:cover"/>
                <div>
                  <strong>Rina, 34</strong>
                  <div class="muted" style="font-size:13px">Bought a 2-story at Palm Grove</div>
                </div>
              </div>
              <p class="muted" style="margin-top:10px">"Excellent design and quick support. The neighborhood is perfect for our kids."</p>
            </div>

            <div class="testimonial card">
              <div style="display:flex;gap:12px;align-items:center">
                <img src="https://i.pravatar.cc/60?img=12" alt="profile" style="width:48px;height:48px;border-radius:999px;object-fit:cover"/>
                <div>
                  <strong>Andi, 41</strong>
                  <div class="muted" style="font-size:13px">Investor & homeowner</div>
                </div>
              </div>
              <p class="muted" style="margin-top:10px">"Great location, fast access to the toll road, and consistent value growth."</p>
            </div>

            <div class="testimonial card">
              <div style="display:flex;gap:12px;align-items:center">
                <img src="https://i.pravatar.cc/60?img=20" alt="profile" style="width:48px;height:48px;border-radius:999px;object-fit:cover"/>
                <div>
                  <strong>Siti, 29</strong>
                  <div class="muted" style="font-size:13px">New homeowner</div>
                </div>
              </div>
              <p class="muted" style="margin-top:10px">"The green spaces and playground make it perfect for young families."</p>
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

  </body>
</html>