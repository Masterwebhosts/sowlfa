
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#222222">

    <title>
        @yield('title', 'SOWLFA | منصة التعاون العقاري')
    </title>

    <meta
        name="description"
        content="@yield('meta_description', 'SOWLFA منصة B2B للمكاتب والوسطاء العقاريين للبحث عن العقارات والتعاون بين المكاتب من خلال قاعدة بيانات عقارية موحدة.')"
    >

    <meta
        name="robots"
        content="@yield('robots', 'index, follow')"
    >

    <link
        rel="canonical"
        href="{{ url()->current() }}"
    >

    <meta property="og:type" content="website">

    <meta property="og:locale" content="ar_AR">

    <meta property="og:site_name" content="SOWLFA">

    <meta
        property="og:title"
        content="@yield('og_title', 'SOWLFA | منصة التعاون العقاري')"
    >

    <meta
        property="og:description"
        content="@yield('og_description', 'SOWLFA منصة B2B للمكاتب والوسطاء العقاريين للبحث عن العقارات والتعاون بين المكاتب.')"
    >

    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >

    <meta name="twitter:card" content="summary">

    <meta
        name="twitter:title"
        content="@yield('twitter_title', 'SOWLFA | منصة التعاون العقاري')"
    >

    <meta
        name="twitter:description"
        content="@yield('twitter_description', 'SOWLFA منصة B2B للمكاتب والوسطاء العقاريين للبحث عن العقارات والتعاون بين المكاتب.')"
    >

    <link
        rel="icon"
        href="{{ asset('favicon.ico') }}"
    >


    @yield('head')

    <style>

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f8fafc;
    color: #0f172a;
    line-height: 1.7;
}

img {
    max-width: 100%;
    height: auto;
}

a {
    color: inherit;
}

.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* =========================
   Header
========================= */

.header {
    border-bottom: 1px solid #e2e8f0;
    background: rgba(255, 255, 255, 0.96);
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
}

.header-inner {
    min-height: 72px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.logo {
    font-size: 28px;
    font-weight: 700;
    text-decoration: none;
    color: #4f46e5;
    letter-spacing: -0.4px;
    transition: color 0.2s ease;
}

.logo:hover {
    color: #4338ca;
}

/* =========================
   Navigation
========================= */

.nav {
    display: flex;
    gap: 4px;
    flex-wrap: wrap;
    justify-content: center;
}

.nav a {
    text-decoration: none;
    padding: 8px 11px;
    color: #475569;
    border-radius: 9px;
    transition:
        background-color 0.2s ease,
        color 0.2s ease;
}

.nav a:hover {
    background: #eef2ff;
    color: #4338ca;
}

/* =========================
   Actions
========================= */

.actions {
    display: flex;
    gap: 8px;
}

.button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 42px;
    padding: 9px 17px;
    border-radius: 9px;
    text-decoration: none;
    border: 1px solid #c7d2fe;
    font-weight: 600;
    transition:
        background-color 0.2s ease,
        border-color 0.2s ease,
        color 0.2s ease,
        box-shadow 0.2s ease,
        transform 0.2s ease;
}

.button:hover {
    transform: translateY(-1px);
}

/* Primary */

.button-primary {
    background: #4f46e5;
    color: #ffffff;
    border-color: #4f46e5;
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.18);
}

.button-primary:hover {
    background: #4338ca;
    border-color: #4338ca;
    box-shadow: 0 6px 16px rgba(79, 70, 229, 0.24);
}

/* Secondary */

.button-secondary {
    background: #eef2ff;
    color: #3730a3;
    border-color: #c7d2fe;
}

.button-secondary:hover {
    background: #e0e7ff;
    border-color: #a5b4fc;
    color: #312e81;
}

/* =========================
   Main
========================= */

.main {
    min-height: 60vh;
}

/* =========================
   Footer
========================= */

.footer {
    margin-top: 60px;
    background: #0b1120;
    color: #ffffff;
}

.footer-inner {
    padding: 44px 0 24px;
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 40px;
}

.footer a {
    color: #cbd5e1;
    text-decoration: none;
    transition:
        color 0.2s ease;
}

.footer a:hover {
    color: #a5b4fc;
}

.footer-links {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.footer-bottom {
    margin-top: 30px;
    padding-top: 18px;
    border-top: 1px solid #263247;
    color: #94a3b8;
    font-size: 13px;
}

/* =========================
   Responsive
========================= */

@media (max-width: 900px) {

    .header-inner {
        flex-wrap: wrap;
        padding: 14px 0;
    }

    .nav {
        order: 3;
        width: 100%;
    }

    .footer-grid {
        grid-template-columns: 1fr 1fr;
    }

}

@media (max-width: 640px) {

    .container {
        padding: 0 14px;
    }

    .header-inner {
        min-height: 64px;
    }

    .logo {
        font-size: 24px;
    }

    .nav {
        width: 100%;
    }

    .nav a {
        font-size: 13px;
        padding: 7px 6px;
    }

    .actions {
        width: 100%;
    }

    .actions .button {
        flex: 1;
    }

    .footer-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }

}

    </style>

</head>

<body>

<header class="header">

    <div class="container">

        <div class="header-inner">

            <a
                href="{{ url('/') }}"
                class="logo"
                aria-label="SOWLFA - الصفحة الرئيسية"
            >
                SOWLFA
            </a>

            <nav
                class="nav"
                aria-label="التنقل الرئيسي"
            >

                <a href="{{ url('/') }}">
                    الرئيسية
                </a>

                <a href="{{ url('/about') }}">
                    من نحن
                </a>

                <a href="{{ url('/how-it-works') }}">
                    كيف تعمل
                </a>

                <a href="{{ url('/pricing') }}">
                    الأسعار
                </a>

                <a href="{{ url('/faq') }}">
                    الأسئلة الشائعة
                </a>

                <a href="{{ url('/contact') }}">
                    تواصل معنا
                </a>

            </nav>

            <div class="actions">

                <a
                    href="{{ route('login') }}"
                    class="button button-secondary"
                >
                    تسجيل الدخول
                </a>

                <a
                    href="{{ url('/subscribe') }}"
                    class="button button-primary"
                >
                    ابدأ الاشتراك
                </a>

            </div>

        </div>

    </div>

</header>

<main class="main">

    @yield('content')

</main>

<footer class="footer">

    <div class="container">

        <div class="footer-inner">

            <div class="footer-grid">

                <div>

                    <h2>
                        SOWLFA
                    </h2>

                    <p>
                        منصة B2B للمكاتب والوسطاء العقاريين
                        للبحث عن العقارات والتعاون بين المكاتب.
                    </p>

                </div>

                <div>

                    <h3>
                        روابط
                    </h3>

                    <div class="footer-links">

                        <a href="{{ url('/about') }}">
                            من نحن
                        </a>

                        <a href="{{ url('/how-it-works') }}">
                            كيف تعمل
                        </a>

                        <a href="{{ url('/pricing') }}">
                            الأسعار
                        </a>

                        <a href="{{ url('/faq') }}">
                            الأسئلة الشائعة
                        </a>

                    </div>

                </div>

                <div>

                    <h3>
                        معلومات
                    </h3>

                    <div class="footer-links">

                        <a href="{{ url('/contact') }}">
                            تواصل معنا
                        </a>

                        <a href="{{ url('/privacy-policy') }}">
                            سياسة الخصوصية
                        </a>

                        <a href="{{ url('/terms') }}">
                            الشروط والأحكام
                        </a>

                        <a href="{{ route('login') }}">
                            تسجيل الدخول
                        </a>

                    </div>

                </div>

            </div>

            <div class="footer-bottom">

                جميع الحقوق محفوظة © {{ date('Y') }} SOWLFA

            </div>

        </div>

    </div>

</footer>

</body>

</html>


