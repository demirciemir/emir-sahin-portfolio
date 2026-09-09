<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSS FILES -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

  <title>{{ $client['name'] }} - Emir Şahin Portfolio</title>
  <meta name="description" content="Emir Şahin - {{ $client['name'] }} markası için hazırlanan video prodüksiyon ve yaratıcı içerik projeleri." />
  <meta name="keywords" content="{{ strtolower($client['name']) }}, videographer, video kurgu, reklam filmi, emir şahin" />
  <meta name="author" content="Emir Şahin" />
  
  <!-- Open Graph / Social Media -->
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:title" content="{{ $client['name'] }} - Emir Şahin Portfolio" />
  <meta property="og:description" content="Emir Şahin - {{ $client['name'] }} markası için hazırlanan projeleri inceleyin." />
  <meta property="og:image" content="{{ asset('assets/img/general/favicon.png') }}" />
  <style>
    body {
      background-color: var(--rdn-black-color, #0a0a0a);
      color: #fff;
      font-family: 'Inter', sans-serif;
    }

    .page-wrapper {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 32px;
    }

    /* Top Navigation */
    .top-nav {
      padding: 24px 0;
    }
    .back-btn {
      color: rgba(255,255,255,0.4);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: all 0.3s ease;
    }
    .back-btn i {
      font-size: 16px;
      transition: transform 0.3s ease;
    }
    .back-btn:hover {
      color: var(--rdn-primary-color, #6B7F38);
    }
    .back-btn:hover i {
      transform: translateX(-4px);
    }

    /* Compact Header */
    .hero-header {
      padding: 60px 0 50px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
      margin-bottom: 40px;
    }
    .hero-category {
      color: var(--rdn-primary-color, #6B7F38);
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 3px;
      margin-bottom: 12px;
      font-weight: 500;
    }
    .hero-title {
      font-size: 2.8rem;
      font-weight: 700;
      letter-spacing: -1px;
      margin-bottom: 12px;
      color: #fff;
      line-height: 1.1;
    }
    .hero-desc {
      font-size: 0.95rem;
      color: rgba(255,255,255,0.4);
      max-width: 500px;
      line-height: 1.6;
    }

    /* Grid & Cards */
    .portfolio-grid {
      padding-bottom: 80px;
    }
    .grid-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }
    .project-card {
      display: block;
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      aspect-ratio: 16/9;
      background: #111;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
    }
    .project-card::after {
      content: '';
      position: absolute;
      inset: 0;
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 12px;
      pointer-events: none;
      transition: border-color 0.4s ease;
    }
    .project-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.85;
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .project-card:hover {
      transform: translateY(-4px);
    }
    .project-card:hover::after {
      border-color: rgba(107, 127, 56, 0.4);
    }
    .project-card:hover img {
      opacity: 1;
      transform: scale(1.05);
    }
    
    /* Play Button */
    .play-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.8);
      width: 44px;
      height: 44px;
      background: rgba(0,0,0,0.5);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 16px;
      border: 1px solid rgba(255,255,255,0.15);
      opacity: 0;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .project-card:hover .play-icon {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
      background: var(--rdn-primary-color, #6B7F38);
      border-color: var(--rdn-primary-color, #6B7F38);
    }

    @media (max-width: 992px) {
      .grid-row { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 768px) {
      .grid-row { grid-template-columns: repeat(2, 1fr); }
      .hero-title { font-size: 2rem; }
    }
    @media (max-width: 480px) {
      .grid-row { grid-template-columns: 1fr; }
    }

    /* Video Filters */
    .video-filters {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 40px;
      flex-wrap: wrap;
    }
    .filter-btn {
      background: transparent;
      color: rgba(255,255,255,0.6);
      border: 1px solid rgba(255,255,255,0.1);
      padding: 8px 24px;
      border-radius: 30px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .filter-btn:hover {
      color: #fff;
      border-color: rgba(255,255,255,0.3);
    }
    .filter-btn.active {
      background: var(--rdn-primary-color, #6B7F38);
      color: #fff;
      border-color: var(--rdn-primary-color, #6B7F38);
    }
    .project-card.hidden {
      display: none !important;
    }
  </style>
  
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>

  <!-- Top Navigation -->
  <div class="page-wrapper">
    <div class="top-nav">
      <a href="{{ url('/') }}" class="back-btn">
        <i class="ph ph-arrow-left"></i> {{ __('messages.work_back') }}
      </a>
    </div>
  </div>

  <!-- Hero Header -->
  <div class="page-wrapper">
    <div class="hero-header">
      <p class="hero-category">{{ $client->title }}</p>
      <h1 class="hero-title">{{ $client->name }}</h1>
      <p class="hero-desc">{{ $client->description ?? __('messages.work_default_desc') }}</p>
    </div>
  </div>

  <!-- Portfolio Grid -->
  <div class="page-wrapper portfolio-grid">
    
    <!-- Filters -->
    <div class="video-filters">
      <button class="filter-btn active" data-filter="all">Hepsi</button>
      <button class="filter-btn" data-filter="short">Kısa Video</button>
      <button class="filter-btn" data-filter="long">Uzun Video</button>
    </div>

    <div class="grid-row" id="projects-container">
      @foreach($projects as $project)
        @php
            $link = $project->type == 'video' ? $project->youtube_url : asset($project->image_path);
            $img = $project->type == 'video' ? asset($project->thumbnail_image) : asset($project->image_path);
            $videoLength = $project->type == 'video' ? ($project->video_length ?? 'short') : 'image';
        @endphp
        <a href="{{ $link }}" class="glightbox project-card" data-video-length="{{ $videoLength }}">
          <img src="{{ $img }}" alt="{{ $project->title }} Project">
          @if($project->type === 'video')
            <div class="play-icon">
              <i class="ph-fill ph-play"></i>
            </div>
          @endif
        </a>
      @endforeach
    </div>
  </div>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Lightbox init
      const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
      });

      // Video Filtering Logic
      const filterBtns = document.querySelectorAll('.filter-btn');
      const projectCards = document.querySelectorAll('.project-card');

      filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
          // Update active class
          filterBtns.forEach(b => b.classList.remove('active'));
          this.classList.add('active');

          const filterValue = this.getAttribute('data-filter');

          projectCards.forEach(card => {
            const length = card.getAttribute('data-video-length');
            if (filterValue === 'all') {
              card.classList.remove('hidden');
            } else {
              if (length === filterValue) {
                card.classList.remove('hidden');
              } else {
                card.classList.add('hidden');
              }
            }
          });
        });
      });
    });
  </script>
</body>
</html>
