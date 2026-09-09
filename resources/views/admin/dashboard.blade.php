@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-wrapper">
        <h1 class="welcome-text">Hoş Geldiniz, {{ auth()->user()->name }}</h1>
        <img src="{{ asset('assets/img/general/wallpaper.webp') }}" alt="Wallpaper" class="center-wallpaper">
    </div>

    <style>
        .dashboard-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .welcome-text {
            margin-bottom: 3rem;
            text-align: center;
        }

        .center-wallpaper {
            width: 100%;
            max-width: 900px;
            height: auto;
            border-radius: 12px; /* Köşeleri hafif yumuşatır, isterseniz 0 yapabilirsiniz */
            box-shadow: 0 20px 50px rgba(0,0,0,0.5); /* Derinlik hissi için güçlü gölge */
            display: block;
        }

        /* Daha küçük ekranlarda görselin taşmasını engelle */
        @media (max-width: 992px) {
            .center-wallpaper {
                max-width: 100%;
                padding: 0 15px;
            }
        }
    </style>
@endsection
