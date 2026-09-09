<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.site_title') }}</title>
    <meta name="description" content="Emir Şahin - Dijital İçerik Üreticisi ve Videographer. Yaratıcı ve profesyonel video prodüksiyon, kurgu ve görsel içerik çözümleri." />
    <meta name="keywords" content="videographer, video kurgu, reklam filmi, içerik üreticisi, video prodüksiyon, emir şahin, emir visuals, klip çekimi" />
    <meta name="author" content="Emir Şahin" />
    <meta name="robots" content="index, follow" />
    
    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ __('messages.site_title') }}" />
    <meta property="og:description" content="Emir Şahin - Dijital İçerik Üreticisi ve Videographer. Yaratıcı ve profesyonel video prodüksiyon işleri." />
    <meta property="og:image" content="{{ asset('assets/img/general/favicon.png') }}" />
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/general/favicon.png') }}" />
    <!-- PLUGIN CSS START -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/phosphor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/scrollCue.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plyr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />

    <!-- PLUGIN CSS END -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  </head>
  <body>
    @if(!session()->has('locale'))
    <style>
        body { overflow: hidden !important; }
    </style>
    @endif
    <div id="language-barrier" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(13, 14, 11, 0.75); backdrop-filter: blur(15px); z-index: 999999; display: {{ session()->has('locale') ? 'none' : 'flex' }}; align-items: center; justify-content: center;">
        <div class="lang-modal" style="position: relative; background-color: var(--rdn-black-color); border: 1px solid rgba(104, 128, 53, 0.3); border-radius: 12px; padding: 40px 30px; text-align: center; max-width: 400px; width: 90%; box-shadow: 0 25px 50px rgba(0,0,0,0.5);">
            @if(session()->has('locale'))
            <i class="ph ph-x" style="position: absolute; top: 15px; right: 15px; font-size: 24px; cursor: pointer; color: var(--rdn-heading-color); transition: opacity 0.3s;" onclick="document.getElementById('language-barrier').style.display='none'" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'"></i>
            @endif
            <img src="{{ asset('assets/img/general/emir_sahin_flat_white_transparent.png') }}" alt="Logo" style="height: 35px; margin-bottom: 25px; object-fit: contain;">
            <h2 style="color: var(--rdn-heading-color); margin-bottom: 10px; font-weight: 500; font-size: 22px;">Welcome / Hoş Geldiniz</h2>
            <p style="color: #999; margin-bottom: 30px; font-size: 15px;">Please select your preferred language.<br>Lütfen tercih ettiğiniz dili seçin.</p>
            <div style="display: flex; gap: 15px; justify-content: center;">
                <a href="{{ route('lang.switch', 'tr') }}" class="rdn_btn lang_btn" style="flex: 1; padding: 12px 0; text-align: center; justify-content: center; font-size: 16px;">
                    <span style="padding: 0; position: relative; z-index: 10;">TR</span>
                </a>
                <a href="{{ route('lang.switch', 'en') }}" class="rdn_btn lang_btn" style="flex: 1; padding: 12px 0; text-align: center; justify-content: center; font-size: 16px;">
                    <span style="padding: 0; position: relative; z-index: 10;">ENG</span>
                </a>
            </div>
        </div>
    </div>
    <style>
        .lang_btn {
            background-color: var(--rdn-heading-color) !important;
        }
        .lang_btn span {
            color: #000 !important;
            font-weight: 600;
            transition: color 0.3s ease !important;
        }
        .lang_btn:hover span {
            color: #fff !important;
        }
        .lang_btn:hover {
            border-color: rgba(255,255,255,0.3) !important;
        }
    </style>
    <!-- ======================================================================= -->
    <!--                             PRELOADER START                             -->
    <!-- ======================================================================= -->
    <div id="preloader">
      <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
      </div>
    </div>
    <!-- /#preloader -->
    <!-- ======================================================================= -->
    <!--                              PRELOADER END                              -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                              HEADER START                               -->
    <!-- ======================================================================= -->
    <header class="top_header py-2">
      <div class="container-fluid px-4">
        <div class="row align-items-center">
          <div class="col-lg-2 col-6">
            <a class="logo img-fluid" href="{{ url('/') }}">
              <img src="{{ asset('assets/img/general/logo.png') }}" alt="Main Logo" class="logo_main" />
              <img src="{{ asset('assets/img/general/emir_sahin_flat_white_transparent.png') }}" alt="Fixed Logo" class="logo_fixed" />
            </a>
          </div>
          <!-- /.col-lg-2 -->

          <div class="col-lg-8 justify-content-center d-none d-lg-flex">
            <!-- ======================================================================= -->
            <!--                        DESKTOP NAVIGATION START                         -->
            <!-- ======================================================================= -->
            <ul
              class="list-unstyled d-flex align-items-center justify-content-center gap-4 mb-0 rdn_menu scroll_menu">
              <li><a href="#about">{{ __('messages.menu_about') }}</a></li>
              <li><a href="#services">{{ __('messages.menu_services') }}</a></li>
              <li><a href="#works">{{ __('messages.menu_works') }}</a></li>
              <li><a href="#contact">{{ __('messages.menu_contact') }}</a></li>
            </ul>
            <!-- /.list-unstyled -->
            <!-- ======================================================================= -->
            <!--                         DESKTOP NAVIGATION END                          -->
            <!-- ======================================================================= -->
          </div>
          <!-- /.col-lg-8 -->

          <div class="col-lg-2 d-none d-lg-flex justify-content-end align-items-center">
            <div class="lang_btn_desktop cursor_big" onclick="document.getElementById('language-barrier').style.display='flex'" style="font-size: 24px; color: var(--rdn-heading-color);">
              <i class="ph ph-globe"></i>
            </div>
          </div>
          <!-- /.col-lg-2 -->
          <div class="col-6 d-lg-none mobile_menu_box align-items-center justify-content-end d-flex">
            <div class="lang_btn_mobile cursor_big" onclick="document.getElementById('language-barrier').style.display='flex'" style="font-size: 24px; color: var(--rdn-heading-color);">
              <i class="ph ph-globe"></i>
            </div>
          </div>
          <!-- /.col-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->

      <!-- ======================================================================= -->
      <!--                             OFFCANVAS START                             -->
      <!-- ======================================================================= -->
      <div
        class="top_offcanvas_container offcanvas offcanvas-end bg_black shadow-sm"
        tabindex="-1"
        data-bs-scroll="true"
        id="top_offcanvas">
        <button class="close_mb" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="ph ph-x"></i>
        </button>

        <a href="{{ url('/') }}" class="logo_offcanvas mb-auto">
          <img src="{{ asset('assets/img/general/logo.png') }}" alt="image" class="logo img-fluid" />
        </a>
        <div class="offcanvas_nav"></div>

      </div>
      <!-- top_offcanvas_container offcanvas offcanvas-start -->

      <!-- ======================================================================= -->
      <!--                              OFFCANVAS END                              -->
      <!-- ======================================================================= -->
    </header>

    <!-- ======================================================================= -->
    <!--                               HEADER END                                -->
    <!-- ======================================================================= -->
    <!-- ======================================================================= -->
    <!--                            HOME SLIDER START                            -->
    <!-- ======================================================================= -->
    <div
      class="home_slider bg-white text-dark overflow-hidden position-relative"
      data-delay="6000">
      <!-- ======================================================================= -->
      <!--                            SLIDER ITEM START                            -->
      <!-- ======================================================================= -->
      <div class="slider_item is-active">
        <div class="container mt-4 mb-0">
          <div class="row align-items-center">
            <div class="col-lg-6 position-relative z-2">
              <div class="slider_content_text">
                <p class="slider_subtitle">BUILT WITH VISION</p>
                <!-- slider_subtitle -->

                <h1 class="slider_title">
                  <span class="text-wrapper">
                    <span class="letters">
                      {{ __('messages.hero_greeting') }}<br>
                      {{ __('messages.hero_title1') }}<br>
                      {{ __('messages.hero_title2') }}
                    </span>
                    <!-- /.letters -->
                  </span>
                  <!-- text-wrapper -->
                </h1>
                <!-- /.slider_title -->

                <p class="slider_text">
                  {{ __('messages.hero_desc1') }}<br>
                  {{ __('messages.hero_desc2') }}<br>
                  {{ __('messages.hero_desc3') }}
                </p>
                <!-- /.slider_text -->
                <style>
                  .slider_btn_box .rdn_btn span {
                    font-size: 1.1rem;
                    letter-spacing: 0.5px;
                    padding: 14px 40px; /* Her iki butonun yükseklik dengesi için */
                  }
                  .slider_btn_box .cv-btn span {
                    padding: 14px 0 !important; /* Dikey padding aynı yapıldı */
                    width: 56px; /* Yükseklikle orantılı kare olması için */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.2rem;
                  }
                </style>
                <div class="slider_btn_box d-flex gap-3 align-items-center">
                  <a href="#contact" class="slider_btn rdn_btn go_btn">
                    <span class="btn_top">
                      {{ __('messages.contact_me') }}
                      <i class="ms-2 ph ph-arrow-right"></i>
                    </span>
                    <!-- /.btn_top -->
                    <span class="btn_bottom">
                      {{ __('messages.contact_me') }}
                      <i class="ms-2 ph ph-arrow-right"></i>
                    </span>
                    <!-- /.btn_bottom -->
                  </a>
                  @if(isset($activeCv))
                  <a href="{{ asset($activeCv->file_path) }}" target="_blank" class="slider_btn rdn_btn go_btn cv-btn" style="min-width: unset; width: 56px; padding: 0;">
                    <span class="btn_top">
                      CV
                    </span>
                    <span class="btn_bottom">
                      CV
                    </span>
                  </a>
                  @endif
                </div>
                <!-- /.slider_btn_box -->
              </div>
              <!-- /.slider_content_text -->
            </div>
            <!-- /.col-lg-6 -->

            <div class="slider_content_img col-lg-6 text-center">
              <div class="slider_img" style="height: auto; overflow: visible; background: transparent;">
                <img class="img-fluid" style="height: auto !important; max-height: 85vh; object-fit: contain; width: 100%;" src="{{ asset('assets/img/slider/emir.jpeg') }}" alt="Emir Sahin" />
              </div>
            </div>
            <!-- /.slider_content_img -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.slider_item -->
      <!-- ======================================================================= -->
      <!--                             SLIDER ITEM END                             -->
      <!-- ======================================================================= -->

      <img src="{{ asset('assets/img/slider/circle_img.svg') }}" alt="" class="circle_img" />

      <ul class="list-unstyled slider_social_icon">
        @foreach($socialLinks as $link)
        <li>
          <a href="{{ $link->url ?: '#!' }}" target="_blank" title="{{ $link->name }}">
            <i class="{{ $link->icon_class }}"></i>
          </a>
        </li>
        @endforeach
      </ul>
      <!-- /.list-unstyled -->
      
      <!-- Wave Transition to Next Section -->
      <div style="position: absolute; bottom: -1px; left: 0; width: 100%; overflow: hidden; line-height: 0; pointer-events: none; z-index: 10;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" style="display: block; width: 100%; height: 120px;">
          <path fill="var(--rdn-darker-color)" fill-opacity="1" d="M0,192L48,208C96,224,192,256,288,245.3C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,186.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
      </div>
    </div>
    <!-- /.home_slider -->

    <!-- ======================================================================= -->
    <!--                             HOME SLIDER END                             -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                           ABOUT SECTION START                           -->
    <!-- ======================================================================= -->
    <section id="about" class="py-10 bg_darker">
      <div class="container">
        <!-- /.text-center -->
        <div class="row align-items-stretch">
          <div class="col-lg-8 offset-lg-2 text-center">
            <p class="text-uppercase tc_heading-50">
            Videography & AI Visuals That Speaks
            </p>
            <h2 class="mb-4">
              {{ __('messages.about_hello') }}
            </h2>
          </div>
          <div class="clearfix mb-4"></div>
          <!-- /.clearfix -->
          <div class="col-lg-4 position-relative mb-4">
            <div class="p-4 bg_dark about_box overflow-hidden">
              <div class="about_stats_top">
                <h2 class="about_stats mb-4">
                  <span class="zs_count" data-end="400"></span>
                  <!-- /.count -->
                  <span class="tc_primary">+</span>
                </h2>
                <p class="text-uppercase tc_heading">{{ __('messages.about_completed') }}</p>
                <p class="mb-4">
                  {{ __('messages.about_desc') }}
                </p>
              </div>
              <!-- /.about_stats_top -->
              <div class="d-flex justify-content-between align-items-center">
                <ul
                  class="list-unstyled d-flex flex-row about_ava_list"
                  data-cues="slideInUp">
                  <li>
                    <img
                      src="{{ asset('assets/img/about/ava1.webp') }}"
                      class="img-fluid shadow-sm"
                      alt="" />
                  </li>
                  <li>
                    <img
                      src="{{ asset('assets/img/about/ava2.webp') }}"
                      class="img-fluid shadow-sm"
                      alt="" />
                  </li>
                  <li>
                    <img
                      src="{{ asset('assets/img/about/ava3.webp') }}"
                      class="img-fluid shadow-sm"
                      alt="" />
                  </li>
                </ul>
                <!-- /.list-unstyled d-flex flex-row -->
                <a href="#video" class="about_arrow_link go_btn">
                  <img src="{{ asset('assets/img/about/arrow.png') }}" class="img-fluid" alt="" />
                </a>
                <!-- /.about_arrow_link -->
              </div>
              <!-- /.d-flex -->
            </div>
            <!-- /.p-4 -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4 mb-4">
            <div class="about_detail">
              <a href="{{ isset($activeCv) ? asset($activeCv->file_path) : '#!' }}" {{ isset($activeCv) ? 'target="_blank"' : '' }} class="about_link">
                <i class="ph ph-read-cv-logo"></i>
                {{ __('messages.download_resume') }}
              </a>
              <!-- /.about_link -->
              <div class="about_detail_bottom">
                <div class="about_line"></div>
                <!-- /.about_line -->
                <p class="text-uppercase tc_heading mb-1 lh-1">
                  Videographer & AI Artist
                </p>
                <h3 class="mb-0 lh-1 fw-normal">Emir Şahin</h3>
              </div>
              <!-- /.about_detail_bottom -->
              <img src="{{ asset('assets/img/about/emir1.webp') }}" class="about_me_img" alt="" />
            </div>
            <!-- /.about_detail -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4 mb-4">
            <p class="text-uppercase tc_heading-50 mb-1">{{ __('messages.toolbox') }}</p>
            <h3 class="mb-4 fw-normal">{{ __('messages.tools_title') }}</h3>
            <p class="mb-4">
              {{ __('messages.tools_desc') }}
            </p>
            <!-- /.mb-4 -->

            <ul class="list-unstyled tool_list">
              <li>
                <img src="{{ asset('assets/img/about/pr.webp') }}" alt="" />
                <div>
                  <p class="text-uppercase tc_heading mb-0">Adobe Premiere Pro</p>
                  <p>{{ __('messages.tool_pr_desc') }}</p>
                </div>
              </li>

              <li>
                <img src="{{ asset('assets/img/about/ae.webp') }}" alt="" />
                <div>
                  <p class="text-uppercase tc_heading mb-0">Adobe After Effects</p>
                  <p>{{ __('messages.tool_ae_desc') }}</p>
                </div>
              </li>

              <li>
                <img src="{{ asset('assets/img/about/ps.webp') }}" alt="" />
                <div>
                  <p class="text-uppercase tc_heading mb-0">Adobe Photoshop</p>
                  <p>{{ __('messages.tool_ps_desc') }}</p>
                </div>
              </li>
            </ul>
            <!-- /.list-unstyled d-flex -->
          </div>
          <!-- /.col-lg-4 -->

          <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="about_video_container overflow-hidden position-relative rounded-2 shadow-sm" style="height: 100%; min-height: 450px;">
              <video id="about-loop-video" autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                <source src="{{ asset('assets/img/about/kesis1.webm') }}" type="video/webm">
              </video>
            </div>
            <!-- /.about_video_container -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-8">
            <div
              class="p-4 bg_dark rounded-2 shadow-sm position-relative overflow-hidden">
              <p class="text-uppercase tc_heading-50 mb-1">
                AI VISUALS
              </p>
              <h3 class="fw-normal">{{ __('messages.ai_title') }}</h3>
              <p class="mb-4">
                {{ __('messages.ai_desc') }}
              </p>
              <div class="d-flex gap-2 flex-column flex-md-row">
                <div class="col-12 col-md-6">
                  <ul class="list-unstyled d-flex flex-column abt_list">
                    <li data-cue="slideInUp">
                      <span class="achiv_icon"
                        ><i class="ph ph-magic-wand"></i
                      ></span>
                      <!-- /.achiv_icon -->
                      {{ __('messages.ai_list1') }}
                    </li>
                    <li data-cue="slideInUp" data-delay="200">
                      <span class="achiv_icon">
                        <i class="ph ph-film-strip"></i>
                      </span>
                      <!-- /.achiv_icon -->
                      {{ __('messages.ai_list2') }}
                    </li>
                  </ul>
                </div>
                <!-- /.col-12 col-md-6 -->
                <div class="col-12 col-md-6">
                  <ul class="list-unstyled d-flex flex-column abt_list">
                    <li data-cue="slideInUp" data-delay="100">
                      <span class="achiv_icon"
                        ><i class="ph ph-video-camera"></i
                      ></span>
                      <!-- /.achiv_icon -->
                      Video prompt & motion direction
                    </li>

                    <li data-cue="slideInUp" data-delay="300">
                      <span class="achiv_icon"
                        ><i class="ph ph-megaphone"></i
                      ></span>
                      <!-- /.achiv_icon -->
                      {{ __('messages.ai_list4') }}
                    </li>
                  </ul>
                </div>
                <!-- /.col-6 -->
              </div>
              <!-- /.d-flex gap-2 -->
              <svg
                class="achiv_svg"
                xmlns="http://www.w3.org/2000/svg"
                width="9rem"
                height="9rem"
                fill="var(--rdn-heading-color)"
                viewBox="0 0 256 256">
                <path
                  d="M207,44H49A13,13,0,0,0,36,57v49.21A13,13,0,0,0,43.62,118l70.72,32.14a44,44,0,1,0,27.32,0L212.38,118A13,13,0,0,0,220,106.21V57A13,13,0,0,0,207,44Zm-43,8v79.24l-36,16.37L92,131.24V52ZM44,106.21V57a5,5,0,0,1,5-5H84v75.61L46.93,110.76A5,5,0,0,1,44,106.21ZM164,192a36,36,0,1,1-36-36A36,36,0,0,1,164,192Zm48-85.79a5,5,0,0,1-2.93,4.55L172,127.61V52h35a5,5,0,0,1,5,5Z"></path>
              </svg>
            </div>
            <!-- /.p-4 bg_dark -->
          </div>
          <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /#about.py-10 -->

    <!-- ======================================================================= -->
    <!--                            ABOUT SECTION END                            -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                         SERVICES SECTION START                          -->
    <!-- ======================================================================= -->
    <section id="services" class="py-10 bg_dark">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-8 offset-lg-2 text-center">
            <p class="text-uppercase tc_heading-50">
              {{ __('messages.services_subtitle') }}
            </p>
            <h2 class="mb-8">
              {{ __('messages.services_title') }}
            </h2>
          </div>
          <!-- col-lg-8 offset-lg-2 -->
          <div class="clearfix"></div>
          <!-- /.clearfix -->
        </div>
        <!-- row -->
        <div class="services_tab">
          <div class="tab-content">
            <!-- ======================================================================= -->
            <!--                            TAB CONTENT START                            -->
            <!-- ======================================================================= -->
            <div
              class="tab-pane show active fade"
              id="services_one"
              role="tabpanel"
              aria-labelledby="sv_one_tab"
              tabindex="0">
              <div class="sv_tab_box shadow-sm">
                <div class="sv_tab_content">
                  <div class="row align-items-end">
                    <div class="col-lg-6">
                      <h3 class="fs-2">{{ __('messages.sv_title_4') }}</h3>
                      <!-- /.fs-2 -->
                      <p>
                        {{ __('messages.sv_long_4') }}
                      </p>
                    </div>
                    <!-- /.col-lg-6 -->

                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.sv_tab_content -->
                <video class="services_tab_img lazy_service_video" loop muted playsinline preload="none">
                  <source src="{{ asset('assets/img/services/aivisuals.webm') }}" type="video/webm">
                </video>
              </div>
              <!-- /.sv_tab_box -->
            </div>
            <!-- ======================================================================= -->
            <!--                             TAB CONTENT END                             -->
            <!-- ======================================================================= -->

            <!-- ======================================================================= -->
            <!--                            TAB CONTENT START                            -->
            <!-- ======================================================================= -->
            <div
              class="tab-pane show fade"
              id="services_two"
              role="tabpanel"
              aria-labelledby="sv_two_tab"
              tabindex="0">
              <div class="sv_tab_box shadow-sm">
                <div class="sv_tab_content">
                  <div class="row align-items-end">
                    <div class="col-lg-6">
                      <h3 class="fs-2">{{ __('messages.sv_title_3') }}</h3>
                      <!-- /.fs-2 -->
                      <p>
                        {{ __('messages.sv_long_3') }}
                      </p>
                    </div>
                    <!-- /.col-lg-6 -->

                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.sv_tab_content -->
                <video class="services_tab_img lazy_service_video" loop muted playsinline preload="none">
                  <source src="{{ asset('assets/img/services/reklam.webm') }}" type="video/webm">
                </video>
              </div>
              <!-- /.sv_tab_box -->
            </div>
            <!-- ======================================================================= -->
            <!--                             TAB CONTENT END                             -->
            <!-- ======================================================================= -->

            <!-- ======================================================================= -->
            <!--                            TAB CONTENT START                            -->
            <!-- ======================================================================= -->
            <div
              class="tab-pane show fade"
              id="services_three"
              role="tabpanel"
              aria-labelledby="sv_three_tab"
              tabindex="0">
              <div class="sv_tab_box shadow-sm">
                <div class="sv_tab_content">
                  <div class="row align-items-end">
                    <div class="col-lg-6">
                      <h3 class="fs-2">{{ __('messages.sv_title_1') }}</h3>
                      <!-- /.fs-2 -->
                      <p>
                        {{ __('messages.sv_long_1') }}
                      </p>
                    </div>
                    <!-- /.col-lg-6 -->

                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.sv_tab_content -->
                <img src="{{ asset('assets/img/services/viraluzun.webp') }}" alt="" class="services_tab_img" />
              </div>
              <!-- /.sv_tab_box -->
            </div>
            <!-- ======================================================================= -->
            <!--                             TAB CONTENT END                             -->
            <!-- ======================================================================= -->

            <!-- ======================================================================= -->
            <!--                            TAB CONTENT START                            -->
            <!-- ======================================================================= -->
            <div
              class="tab-pane show fade"
              id="services_four"
              role="tabpanel"
              aria-labelledby="sv_four_tab"
              tabindex="0">
              <div class="sv_tab_box shadow-sm">
                <div class="sv_tab_content">
                  <div class="row align-items-end">
                    <div class="col-lg-6">
                      <h3 class="fs-2">{{ __('messages.sv_title_2') }}</h3>
                      <!-- /.fs-2 -->
                      <p>
                        {{ __('messages.sv_long_2') }}
                      </p>
                    </div>
                    <!-- /.col-lg-6 -->

                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.sv_tab_content -->
                <video class="services_tab_img lazy_service_video" loop muted playsinline preload="none">
                  <source src="{{ asset('assets/img/services/viralkisa.webm') }}" type="video/webm">
                </video>
              </div>
              <!-- /.sv_tab_box -->
            </div>
            <!-- ======================================================================= -->
            <!--                             TAB CONTENT END                             -->
            <!-- ======================================================================= -->
          </div>
          <!-- tab-content -->

          <!-- ======================================================================= -->
          <!--                      SERVICES TAB NAVIGATION START                      -->
          <!-- ======================================================================= -->
          <ul
            class="d-flex list-unstyled services_nav_box shadow-sm"
            role="tablist">
            <li class="col-lg-3 col-sm-6" role="presentation">
              <div
                class="sv_tab_link cursor_big active"
                id="sv_one_tab"
                data-bs-toggle="tab"
                data-bs-target="#services_one"
                role="tab"
                aria-controls="services_one"
                aria-selected="true">
                <h4>{{ __('messages.sv_title_4') }}</h4>
                <p>{{ __('messages.sv_short_4') }}</p>
                <i class="ph ph-magic-wand"></i>
              </div>
            </li>

            <li class="col-lg-3 col-sm-6" role="presentation">
              <div
                class="sv_tab_link cursor_big"
                id="sv_two_tab"
                data-bs-toggle="tab"
                data-bs-target="#services_two"
                role="tab"
                aria-controls="services_two"
                aria-selected="false">
                <h4>{{ __('messages.sv_title_3') }}</h4>
                <p>{{ __('messages.sv_short_3') }}</p>
                <i class="ph ph-film-strip"></i>
              </div>
            </li>
            <li class="col-lg-3 col-sm-6" role="presentation">
              <div
                class="sv_tab_link cursor_big"
                id="sv_three_tab"
                data-bs-toggle="tab"
                data-bs-target="#services_three"
                role="tab"
                aria-controls="services_three"
                aria-selected="false">
                <h4>{{ __('messages.sv_title_1') }}</h4>
                <p>{{ __('messages.sv_short_1') }}</p>
                <i class="ph ph-video-camera"></i>
              </div>
            </li>
            <li class="col-lg-3 col-sm-6" role="presentation">
              <div
                class="sv_tab_link cursor_big"
                id="sv_four_tab"
                data-bs-toggle="tab"
                data-bs-target="#services_four"
                role="tab"
                aria-controls="services_four"
                aria-selected="false">
                <h4>{{ __('messages.sv_title_2') }}</h4>
                <p>{{ __('messages.sv_short_2') }}</p>
                <i class="ph ph-lightning"></i>
              </div>
            </li>
          </ul>
          <!-- services_nav_box -->
          <!-- ======================================================================= -->
          <!--                       SERVICES TAB NAVIGATION END                       -->
          <!-- ======================================================================= -->
        </div>
        <!-- services_tab -->

        <div class="d-flex mt-10 align-items-stretch flex-lg-row flex-column">
          <div class="col-lg-6 col-12">
            <div class="position-relative h-100">
              <div class="eq_heading shadow-sm">
                <p class="text-uppercase tc_heading-50">
                  {{ __('messages.eq_small_title') }}
                </p>
                <h2 class="fs-4 mb-0 fw-normal">
                  {{ __('messages.eq_main_title') }}
                </h2>
              </div>
              <div class="img_eq" data-list="eq_lists_one">
                <img src="{{ asset('assets/img/services/sony.webp') }}" alt="" class="eq_img_back" />
                <img src="{{ asset('assets/img/services/sony.webp') }}" alt="" class="eq_img_front" />
              </div>
              <!-- img_eq -->
            </div>
            <!-- /.position-relative -->
          </div>
          <!-- /.col-lg-6 -->
          <div class="col-lg-6 col-12">
            <!-- ======================================================================= -->
            <!--                            EQUIP LIST START                             -->
            <!-- ======================================================================= -->
            <ul class="list-unstyled eq_lists" data-list="eq_lists_one">
              <li
                class="eq_list cursor_big active"
                data-image="{{ asset('assets/img/services/sony.webp') }}">
                <i class="ph ph-camera"></i>
                <div class="eq_list_content">
                  <p class="eq_sub">{{ __('messages.eq_1_sub') }}</p>
                  <!-- /.eq_sub -->
                  <h3 class="fs-4">{{ __('messages.eq_1_title') }}</h3>
                  <p>
                    {{ __('messages.eq_1_desc') }}
                  </p>
                </div>
                <!-- /.eq_list_content -->
              </li>
              <li class="eq_list cursor_big" data-image="{{ asset('assets/img/services/dji.webp') }}">
                <i class="ph ph-airplane-tilt"></i>
                <div class="eq_list_content">
                  <p class="eq_sub">{{ __('messages.eq_2_sub') }}</p>
                  <!-- /.eq_sub -->
                  <h3 class="fs-4">{{ __('messages.eq_2_title') }}</h3>
                  <p>
                    {{ __('messages.eq_2_desc') }}
                  </p>
                </div>
                <!-- /.eq_list_content -->
              </li>
              <li class="eq_list cursor_big" data-image="{{ asset('assets/img/services/ronin.webp') }}">
                <i class="ph ph-faders"></i>
                <div class="eq_list_content">
                  <p class="eq_sub">{{ __('messages.eq_3_sub') }}</p>
                  <!-- /.eq_sub -->
                  <h3 class="fs-4">{{ __('messages.eq_3_title') }}</h3>
                  <p>
                    {{ __('messages.eq_3_desc') }}
                  </p>
                </div>
                <!-- /.eq_list_content -->
                <!-- ======================================================================= -->
                <!--                             EQUIP LIST END                              -->
                <!-- ======================================================================= -->
              </li>
            </ul>
            <!-- /.list-unstyled -->
          </div>
          <!-- /.col-lg-7 -->
        </div>
        <!-- /.row mt-10 -->
      </div>
      <!-- container -->
    </section>

    <!-- ======================================================================= -->
    <!--                          SERVICES SECTION END                           -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                           VIDEO SECTION START                           -->
    <!-- ======================================================================= -->
    <section id="video" class="py-10 bg-black position-relative overflow-hidden">
      <!-- Background Video -->
      <video class="video_bg" autoplay loop muted playsinline>
        <source src="{{ asset('assets/img/services/vans.webm') }}" type="video/webm">
      </video>
      <div class="container position-relative z-1 my-lg-10 video_outer">
        <div class="video_row">
          <div class="video_col video_title">
            <h2 class="mb-0">Stories in motion</h2>
          </div>
          <!-- /video_col -->




        </div>
        <!-- /.video_row -->
      </div>
      <!-- /.container -->
      <div class="bg_mask"></div>
      <!-- /.bg_mask -->
    </section>
    <!-- /#video.py-10 -->

    <!-- ======================================================================= -->
    <!--                            VIDEO SECTION END                            -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                            TESTIMONIAL START                            -->
    <!-- ======================================================================= -->
    <section id="testimonial" class="bg_darker">
      <div class="container">
        <div
          class="testi_slider mx-lg-10 rounded-2 testi_outer shadow-sm overflow-hidden">
          <div class="swiper-wrapper">
            <!-- ======================================================================= -->
            <!--                         TESTIMONIAL SLIDE START                         -->
            <!-- ======================================================================= -->
            <div class="swiper-slide bg_dark align-content-center d-flex">
              <img src="{{ asset('assets/img/about/ava3.webp') }}" alt="" class="testi_img" />
              <div class="testi_content">
                <p class="tc_heading">
                  {{ __('messages.testi_3_text') }}
                </p>
                <ul class="list-unstyled d-flex align-items-center testi_info">
                  <li>
                    <i class="ph ph-user-circle"></i>
                    {{ __('messages.testi_3_name') }}
                  </li>
                  <li>
                    <i class="ph ph-briefcase-metal"></i>
                    {{ __('messages.testi_3_title') }}
                  </li>
                </ul>
                <!-- /.list-unstyled d-flex -->
              </div>
            </div>
            <!-- /.swiper-slide  bg_dark -->

            <!-- ======================================================================= -->
            <!--                         TESTIMONIAL SLIDER END                          -->
            <!-- ======================================================================= -->

            <!-- ======================================================================= -->
            <!--                         TESTIMONIAL SLIDE START                         -->
            <!-- ======================================================================= -->
            <div class="swiper-slide bg_dark align-content-center d-flex">
              <img src="{{ asset('assets/img/about/ava2.webp') }}" alt="" class="testi_img" />
              <div class="testi_content">
                <p class="tc_heading">
                  {{ __('messages.testi_2_text') }}
                </p>
                <ul class="list-unstyled d-flex align-items-center testi_info">
                  <li>
                    <i class="ph ph-user-circle"></i>
                    {{ __('messages.testi_2_name') }}
                  </li>
                  <li>
                    <i class="ph ph-briefcase-metal"></i>
                    {{ __('messages.testi_2_title') }}
                  </li>
                </ul>
                <!-- /.list-unstyled d-flex -->
              </div>
            </div>
            <!-- /.swiper-slide  bg_dark -->
            <!-- ======================================================================= -->
            <!--                         TESTIMONIAL SLIDER END                          -->
            <!-- ======================================================================= -->

            <!-- ======================================================================= -->
            <!--                         TESTIMONIAL SLIDE START                         -->
            <!-- ======================================================================= -->
            <div class="swiper-slide bg_dark align-content-center d-flex">
              <img src="{{ asset('assets/img/about/ava1.webp') }}" alt="" class="testi_img" />
              <div class="testi_content">
                <p class="tc_heading">
                  {{ __('messages.testi_1_text') }}
                </p>
                <ul class="list-unstyled d-flex align-items-center testi_info">
                  <li>
                    <i class="ph ph-user-circle"></i>
                    {{ __('messages.testi_1_name') }}
                  </li>
                  <li>
                    <i class="ph ph-briefcase-metal"></i>
                    {{ __('messages.testi_1_title') }}
                  </li>
                </ul>
                <!-- /.list-unstyled d-flex -->
              </div>
            </div>
            <!-- /.swiper-slide  bg_dark -->
            <!-- ======================================================================= -->
            <!--                         TESTIMONIAL SLIDER END                          -->
            <!-- ======================================================================= -->
          </div>
          <!-- /.swiper-wrapper -->


          <!-- Testimonial Navigation -->
          <ul class="testi_nav list-unstyled mb-0">
            <li class="prev cursor_big">
              <i class="ph ph-arrow-left"></i>
            </li>
            <!-- /.prev -->
            <li class="next cursor_big">
              <i class="ph ph-arrow-right"></i>
            </li>
            <!-- /.next -->
          </ul>
          <!-- /.testi_nav -->
        </div>
        <!-- /.testi_slider -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /#testimonial -->

    <!-- ======================================================================= -->
    <!--                             TESTIMONIAL END                             -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                           WORKS SECTION START                           -->
    <!-- ======================================================================= -->
    <section id="works" class="bg_darker py-10">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <p class="text-uppercase tc_heading-50">{{ __('messages.portfolio_subtitle') }}</p>
            <h2 class="mb-8">
              {{ __('messages.portfolio_title') }}
            </h2>
          </div>
          <!-- /.col-lg-8 offset-lg-2 -->
        </div>
        <!-- /.row -->
        <div class="row mt-5">
          @foreach($clients as $client)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="port_box position-relative">
              <a href="{{ route('work.detail', ['slug' => $client->slug]) }}" style="position: absolute; inset: 0; z-index: 10;"></a>
              <div class="port_content">
                <div class="port_line"></div>
                <div class="port_bottom">
                  <div class="port_detail">
                    <p class="text-uppercase tc_heading-50 mb-1">{{ $client->title }}</p>
                    <h3>{{ $client->name }}</h3>
                  </div>
                  <div class="port_link_box">
                    <span class="port_link">
                      <i class="ph ph-arrow-up-right"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="port_mask"></div>
              @if($client->logo_image)
              <img src="{{ asset($client->logo_image) }}" alt="{{ $client->name }}" class="img-fluid" style="filter: brightness(0.8); border-radius: 8px;" />
              @else
              <div class="port_fallback" style="background: rgba(255,255,255,0.05); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                  <i class="fa-solid fa-image fa-3x" style="color: rgba(255,255,255,0.2);"></i>
              </div>
              @endif
            </div>
          </div>
          @endforeach
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /#works.bg_darker py-10 -->

    <!-- ======================================================================= -->
    <!--                            WORK SECTION END                             -->
    <!-- ======================================================================= -->

    <!--                          CONTACT SECTION START                          -->
    <!-- ======================================================================= -->
    <section id="contact" class="py-10 bg_darker">
      <div class="container">
        <div class="row align-items-center">
          <!-- Left: Photo -->
          <div class="col-lg-5 mb-5 mb-lg-0">
            <div class="contact_photo_wrap">
              <img src="{{ asset('assets/img/slider/emir.jpeg') }}" alt="Emir Şahin" class="contact_photo" />
            </div>
          </div>

          <!-- Right: Info -->
          <div class="col-lg-6 offset-lg-1">
            <p class="text-uppercase tc_heading-50 mb-2">
              {{ __('messages.contact_subtitle') }}
            </p>
            <h2 class="mb-5">{{ __('messages.contact_title') }}</h2>

            <div class="contact_info_grid">
              <!-- Name -->
              <div class="contact_info_item">
                <div class="contact_info_icon">
                  <i class="ph ph-user"></i>
                </div>
                <div>
                  <span class="contact_info_label">{{ $settings['contact_name'] ?? __('messages.contact_fullname') }}</span>
                </div>
              </div>

              <!-- Email -->
              <div class="contact_info_item">
                <div class="contact_info_icon">
                  <i class="ph ph-envelope"></i>
                </div>
                <div>
                  <a href="mailto:{{ $settings['contact_email'] ?? __('messages.contact_email') }}" class="contact_info_link">{{ $settings['contact_email'] ?? __('messages.contact_email') }}</a>
                </div>
              </div>

              <!-- Phone -->
              <div class="contact_info_item">
                <div class="contact_info_icon">
                  <i class="ph ph-phone"></i>
                </div>
                <div>
                  <a href="tel:{{ $settings['contact_phone'] ?? __('messages.contact_phone') }}" class="contact_info_link">{{ $settings['contact_phone'] ?? __('messages.contact_phone') }}</a>
                </div>
              </div>

              <!-- Location -->
              <div class="contact_info_item">
                <div class="contact_info_icon">
                  <i class="ph ph-map-pin"></i>
                </div>
                <div>
                  <span class="contact_info_label">{{ $settings['contact_address'] ?? __('messages.contact_location') }}</span>
                </div>
              </div>
            </div>

            <!-- Social Links -->
            <div class="contact_socials mt-5">
              @foreach($socialLinks as $link)
              <a href="{{ $link->url ?: '#!' }}" target="_blank" class="contact_social_link" title="{{ $link->name }}">
                <i class="{{ $link->icon_class }}"></i>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======================================================================= -->
    <!--                           CONTACT SECTION END                           -->
    <!-- ======================================================================= -->

    <!-- ======================================================================= -->
    <!--                              FOOTER START                               -->
    <!-- ======================================================================= -->

    <footer class="footer_new">
      <div class="container">
        <div class="footer_inner border-0 pb-0" style="display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 20px;">
          <!-- Left: Copyright -->
          <div class="footer_copyright" style="font-size: 0.85rem; color: rgba(255,255,255,0.4);">
            <span>© {{ date('Y') }} Emir Şahin. Tüm hakları saklıdır.</span>
          </div>

          <!-- Center: Logo -->
          <div class="footer_logo text-center">
            <img src="{{ asset('assets/img/general/emir_sahin_flat_white_transparent.png') }}" alt="Emir Şahin" style="height: 55px;" />
          </div>

          <!-- Right: Credit -->
          <div class="footer_credit text-end" style="font-size: 0.85rem;">
            <a href="https://www.linkedin.com/in/emir-demirci/" target="_blank" style="color: rgba(255,255,255,0.4); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
              Design by Emir Demirci
            </a>
          </div>
        </div>
      </div>
    </footer>

    <!-- ======================================================================= -->
    <!--                               FOOTER END                                -->
    <!-- ======================================================================= -->
    <!-- VENDOR JS START -->
    <script defer src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script defer src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script defer src="{{ asset('assets/js/scrollCue.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/anime.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/plyr.polyfilled.js') }}"></script>
    <script defer src="{{ asset('assets/js/zs-slider.js') }}"></script>
    <script defer src="{{ asset('assets/js/zs-script.js') }}"></script>
    <script defer src="{{ asset('assets/js/contact.js') }}"></script>

    <!-- VENDOR JS END -->

    <script defer src="{{ asset('assets/js/script.js') }}"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // About Section Looping Video Logic
        var aboutVideo = document.getElementById('about-loop-video');
        if (aboutVideo) {
          var sources = [
            "{{ asset('assets/img/about/kesis1.webm') }}",
            "{{ asset('assets/img/about/kesis2.webm') }}"
          ];
          var currentVidIndex = 0;
          aboutVideo.addEventListener('ended', function() {
            currentVidIndex = (currentVidIndex + 1) % sources.length;
            aboutVideo.src = sources[currentVidIndex];
            aboutVideo.play().catch(function(e){ console.log('Autoplay prevented', e); });
          });
        }

        // Services Lazy Play Video Logic
        var tabEls = document.querySelectorAll('div[data-bs-toggle="tab"]');
        
        // Play initial active tab video
        var activeTabContent = document.querySelector('.tab-pane.active');
        if (activeTabContent) {
            var activeVideo = activeTabContent.querySelector('.lazy_service_video');
            if (activeVideo) activeVideo.play().catch(function(e){});
        }

        tabEls.forEach(function(tabEl) {
            tabEl.addEventListener('shown.bs.tab', function (event) {
                // Pause previous tab's video
                if (event.relatedTarget) {
                    var previousTabId = event.relatedTarget.getAttribute('data-bs-target');
                    var prevPane = document.querySelector(previousTabId);
                    if (prevPane) {
                        var prevVideo = prevPane.querySelector('.lazy_service_video');
                        if (prevVideo) prevVideo.pause();
                    }
                }
                // Play new tab's video
                var currentTabId = event.target.getAttribute('data-bs-target');
                var currentPane = document.querySelector(currentTabId);
                if (currentPane) {
                    var currentVideo = currentPane.querySelector('.lazy_service_video');
                    if (currentVideo) {
                        // Preload trick for hidden videos
                        if (currentVideo.getAttribute('preload') === 'none') {
                            currentVideo.setAttribute('preload', 'auto');
                        }
                        currentVideo.play().catch(function(e){});
                    }
                }
            });
        });
      });
    </script>

    <script>
    // ==================== SMOOTH SCROLL ====================
    // Manual implementation using requestAnimationFrame.
    // Does NOT rely on browser's scrollTo behavior:'smooth' which can be
    // disabled by OS/browser settings (prefers-reduced-motion).
    function smoothScrollTo(targetY, duration) {
        var startY = window.pageYOffset;
        var diff = targetY - startY;
        var startTime = null;

        function ease(t) {
            // easeInOutCubic
            return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
        }

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var elapsed = timestamp - startTime;
            var progress = Math.min(elapsed / duration, 1);
            window.scrollTo(0, startY + diff * ease(progress));
            if (elapsed < duration) {
                requestAnimationFrame(step);
            }
        }

        requestAnimationFrame(step);
    }

    document.addEventListener('click', function(e) {
        var link = e.target.closest('a');
        if (!link) return;
        var href = link.getAttribute('href');
        if (!href || href.charAt(0) !== '#' || href.length < 2) return;
        var target = document.querySelector(href);
        if (!target) return;

        e.preventDefault();
        e.stopImmediatePropagation();

        // Close mobile menu if open
        var oc = document.getElementById('top_offcanvas');
        if (oc && oc.classList.contains('show')) {
            var inst = bootstrap.Offcanvas.getInstance(oc);
            if (inst) inst.hide();
        }

        // Calculate position with header offset
        var hdr = document.querySelector('.top_header');
        var offset = hdr ? hdr.offsetHeight : 0;
        var pos = target.getBoundingClientRect().top + window.pageYOffset - offset;

        smoothScrollTo(pos, 800); // 800ms duration
    }, true);
    </script>
  </body>
</html>
