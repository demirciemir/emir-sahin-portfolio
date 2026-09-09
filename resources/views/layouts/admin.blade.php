<!DOCTYPE html>
<html lang="tr" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Yönetim Paneli') - Emir Şahin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.all.min.css') }}">
    
    <style>
        :root {
            --rdn-primary-color: #6b7f38;
            --rdn-black-color: #050505;
            --rdn-heading-color: #ffffff;
            --rdn-body-color: rgba(255, 255, 255, 0.7);
        }
        
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--rdn-black-color);
            color: var(--rdn-body-color);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Placeholder */
        .sidebar {
            width: 280px;
            background-color: rgba(255, 255, 255, 0.02);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo img {
            height: 35px;
            margin-bottom: 3rem;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
        }

        .sidebar-nav li {
            margin-bottom: 1rem;
        }

        .sidebar-nav a {
            color: var(--rdn-body-color);
            text-decoration: none;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
            border-radius: 12px;
            transition: all 0.3s;
        }
        
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background-color: rgba(107, 127, 56, 0.15);
            color: var(--rdn-primary-color);
        }

        .sidebar-footer form button {
            background: none;
            border: none;
            color: #ff6b6b;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
        }
        .sidebar-footer form button:hover {
            background: rgba(255, 107, 107, 0.1);
            border-radius: 12px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 3rem;
            background-image: radial-gradient(circle at top right, rgba(107, 127, 56, 0.05), transparent 40%);
            overflow-y: auto;
            max-height: 100vh;
        }

        h1 {
            color: var(--rdn-heading-color);
            font-weight: 600;
            margin-bottom: 2rem;
        }

        /* Custom Card & Table Styles for Admin */
        .admin-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 2rem;
        }
        .table {
            color: var(--rdn-body-color);
            vertical-align: middle;
        }
        .table th {
            color: var(--rdn-heading-color);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: 500;
            padding: 1rem;
        }
        .table td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem;
        }
        .table-dark {
            --bs-table-bg: transparent;
        }
        .btn-primary {
            background-color: var(--rdn-primary-color);
            border-color: var(--rdn-primary-color);
        }
        .btn-primary:hover {
            background-color: #7b9141;
            border-color: #7b9141;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--rdn-primary-color);
            color: #fff;
            box-shadow: none;
        }

        /* Mobile Responsiveness */
        @media (max-width: 991px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                padding: 1.5rem;
            }
            .sidebar-logo {
                text-align: center;
            }
            .sidebar-logo img {
                margin-bottom: 1.5rem;
                height: 45px;
            }
            .sidebar-nav {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                justify-content: center;
            }
            .sidebar-nav li {
                margin-bottom: 0;
            }
            .sidebar-nav a {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
            .sidebar-footer form button {
                justify-content: center;
                margin-top: 10px;
            }
            .main-content {
                padding: 1.5rem 1rem;
            }
            .admin-card {
                padding: 1rem;
            }
            /* Make tables scroll horizontally on mobile */
            .table {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                white-space: nowrap;
            }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/img/general/emir_sahin_flat_white_transparent.png') }}" alt="Logo">
        </div>

        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients.*') ? 'active' : '' }}"><i class="fa-solid fa-briefcase"></i> Markalar (Clients)</a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"><i class="fa-solid fa-video"></i> Projeler (Projects)</a>
            </li>
            <li>
                <a href="{{ route('admin.cv.index') }}" class="{{ request()->routeIs('admin.cv.*') ? 'active' : '' }}"><i class="fa-solid fa-file-pdf"></i> Özgeçmiş (CV)</a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Yetkililer</a>
            </li>
            <li>
                <a href="{{ route('admin.social-media.index') }}" class="{{ request()->routeIs('admin.social-media.*') ? 'active' : '' }}"><i class="fa-solid fa-hashtag"></i> Sosyal Medya</a>
            </li>
            <li>
                <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="fa-solid fa-address-book"></i> İletişim Bilgileri</a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Çıkış Yap</button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success" style="background: rgba(107, 127, 56, 0.2); border: 1px solid var(--rdn-primary-color); color: #fff;">
                <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>
