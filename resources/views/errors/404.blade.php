<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Sayfa Bulunamadı | Emir Şahin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/general/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    
    <style>
      body {
        background: radial-gradient(circle at center, #1a1e12 0%, var(--rdn-black-color, #050108) 100%);
        color: #fff;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
      }
      .error-container {
        text-align: center;
        z-index: 2;
        position: relative;
      }
      .error-title {
        font-size: 8rem;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 20px;
        background: -webkit-linear-gradient(45deg, #fff, #6B7F38);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
      .error-subtitle {
        font-size: 1.5rem;
        margin-bottom: 30px;
        color: rgba(255, 255, 255, 0.7);
      }
      .error-btn {
        background-color: #6B7F38;
        color: #fff;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
      }
      .error-btn:hover {
        background-color: #55662c;
        color: #fff;
        transform: translateY(-2px);
      }

    </style>
  </head>
  <body>


    <div class="error-container">
      <img src="{{ asset('assets/img/general/emir_sahin_flat_white_transparent.png') }}" alt="Logo" style="width: 150px; margin-bottom: 40px;" />
      <h1 class="error-title">404</h1>
      <p class="error-subtitle">Kurgu hatası! Aradığınız sahne bulunamadı.</p>
      <a href="{{ url('/') }}" class="error-btn">Ana Sayfaya Dön</a>
    </div>
  </body>
</html>
