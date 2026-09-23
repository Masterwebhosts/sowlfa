<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'SOWLFA')
    </title>

    <link
        rel="icon"
        href="{{ asset('favicon.ico') }}"
        type="image/x-icon"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #222;
            overflow-x: hidden;
        }

        .app-layout {
            min-height: 100vh;
            display: flex;
            width: 100%;
        }

        /* =========================
           Sidebar
        ========================= */

        .sidebar {
            width: 250px;
            min-width: 250px;
            background: #222;
            color: white;
            padding: 24px 16px;

            display: flex;
            flex-direction: column;

            flex-shrink: 0;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            font-size: 28px;
            font-weight: bold;

            text-align: center;
            margin-bottom: 8px;
        }

        .sidebar-logo-icon {
            width: 38px;
            height: 38px;
            display: block;
        }

        .sidebar-title {
            text-align: center;
            color: #aaa;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sidebar-link {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 11px 12px;
            border-radius: 8px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .sidebar-link:hover {
            background: #333;
            color: white;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px solid #444;
        }

        .logout-button {
            width: 100%;
            border: none;
            background: #8b0000;
            color: white;
            padding: 11px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 8px;
        }

        .logout-button:hover {
            background: #a00000;
        }

        /* =========================
           Content
        ========================= */

        .app-content {
            flex: 1;
            min-width: 0;
            width: 100%;
            padding: 30px;
        }

        .app-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* =========================
           Mobile
        ========================= */

        .mobile-menu-button {
            display: none;
        }

        .mobile-overlay {
            display: none;
        }

        @media (max-width: 768px) {

            .app-layout {
                display: block;
                width: 100%;
                min-height: 100vh;
            }

            /* Menu button */

            .mobile-menu-button {
                display: flex;

                align-items: center;
                justify-content: center;

                position: fixed;
                top: 12px;
                right: 12px;

                width: 44px;
                height: 44px;

                padding: 0;

                border: none;
                border-radius: 8px;

                background: #222;
                color: white;

                font-size: 24px;
                line-height: 1;

                cursor: pointer;

                z-index: 1200;
            }

            /* Sidebar */

            .sidebar {
                display: flex;

                position: fixed;

                top: 0;
                right: 0;

                width: min(280px, 85vw);
                height: 100dvh;

                padding: 24px 16px;

                transform: translateX(100%);

                transition: transform 0.2s ease;

                z-index: 1100;

                overflow-y: auto;
                overflow-x: hidden;

                box-shadow: -5px 0 20px rgba(0, 0, 0, 0.2);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            /* Overlay */

            .mobile-overlay {
                display: block;

                position: fixed;

                inset: 0;

                background: rgba(0, 0, 0, 0.35);

                opacity: 0;
                visibility: hidden;

                transition:
                    opacity 0.2s ease,
                    visibility 0.2s ease;

                z-index: 1050;
            }

            .mobile-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            /* Content */

            .app-content {
                width: 100%;
                min-width: 0;

                padding: 70px 16px 20px;

                overflow-x: hidden;
            }

            .app-container {
                width: 100%;
                max-width: 100%;
                margin: 0;
            }

        }

        /* Small phones */

        @media (max-width: 400px) {

            .app-content {
                padding-left: 12px;
                padding-right: 12px;
            }

            .mobile-menu-button {
                top: 10px;
                right: 10px;

                width: 42px;
                height: 42px;
            }

            .sidebar {
                width: 85vw;
            }

        }

    </style>

</head>

<body>

<div class="app-layout">

    <button
        type="button"
        class="mobile-menu-button"
        id="mobileMenuButton"
        aria-label="فتح القائمة"
        aria-expanded="false"
    >
        ☰
    </button>


    <div
        class="mobile-overlay"
        id="mobileOverlay"
    ></div>


    <aside
        class="sidebar"
        id="sidebar"
    >

        <div class="sidebar-logo">

            <img
                src="{{ asset('favicon.ico') }}"
                alt="SOWLFA"
                class="sidebar-logo-icon"
            >

        </div>


        <div class="sidebar-title">
            مكتب SOWLFA
        </div>


        <nav class="sidebar-nav">

            <a
                href="{{ route('dashboard') }}"
                class="sidebar-link"
            >
                لوحة التحكم
            </a>

            <a
                href="{{ route('properties.index') }}"
                class="sidebar-link"
            >
                العقارات
            </a>

            <a
                href="{{ route('properties.search') }}"
                class="sidebar-link"
            >
                البحث عن عقار
            </a>

            <a
                href="{{ route('properties.create') }}"
                class="sidebar-link"
            >
                إضافة عقار
            </a>

            <a
                href="{{ route('agents.index') }}"
                class="sidebar-link"
            >
                الوسطاء
            </a>

            <a
                href="{{ route('agents.create') }}"
                class="sidebar-link"
            >
                إضافة وسيط
            </a>

        </nav>


        <div class="sidebar-footer">

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    تسجيل الخروج
                </button>

            </form>

        </div>

    </aside>


    <main class="app-content">

        <div class="app-container">

            @yield('content')

        </div>

    </main>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const menuButton =
            document.getElementById('mobileMenuButton');

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('mobileOverlay');

        const links =
            sidebar.querySelectorAll('.sidebar-link');


        function openMenu() {

            sidebar.classList.add('mobile-open');

            overlay.classList.add('show');

            menuButton.setAttribute(
                'aria-expanded',
                'true'
            );

            document.body.style.overflow = 'hidden';
        }


        function closeMenu() {

            sidebar.classList.remove('mobile-open');

            overlay.classList.remove('show');

            menuButton.setAttribute(
                'aria-expanded',
                'false'
            );

            document.body.style.overflow = '';
        }


        menuButton.addEventListener('click', function () {

            if (sidebar.classList.contains('mobile-open')) {

                closeMenu();

            } else {

                openMenu();

            }

        });


        overlay.addEventListener('click', function () {

            closeMenu();

        });


        links.forEach(function (link) {

            link.addEventListener('click', function () {

                closeMenu();

            });

        });


        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {

                closeMenu();

            }

        });


        window.addEventListener('resize', function () {

            if (window.innerWidth > 768) {

                closeMenu();

            }

        });

    });

</script>

</body>

</html>

