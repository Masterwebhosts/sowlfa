<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'لوحة الإدارة - SOWLFA')
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #222;
        }

        a {
            color: inherit;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           Sidebar
        ========================= */

        .sidebar {
            width: 250px;
            background: #222;
            color: white;
            padding: 24px 16px;

            display: flex;
            flex-direction: column;

            flex-shrink: 0;
        }

        .sidebar-logo {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 8px;
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
            transition: 0.2s;
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
           Main Content
        ========================= */

        .admin-content {
            flex: 1;
            min-width: 0;
            padding: 30px;
        }

        .admin-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* =========================
           Admin Page
        ========================= */

        .admin-page {
            width: 100%;
        }

        .admin-page-header {
            margin-bottom: 24px;
        }

        .admin-page-title {
            margin: 0;
            font-size: 28px;
            line-height: 1.4;
            font-weight: 700;
            color: #111827;
        }

        .admin-page-description {
            margin: 6px 0 0;
            font-size: 14px;
            color: #6b7280;
        }

        /* =========================
           Admin Card
        ========================= */

        .admin-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
        }

        /* =========================
           Form
        ========================= */

        .admin-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #fff;
            color: #111827;
            padding: 10px 14px;
            font-size: 14px;
            outline: none;
            transition:
                border-color 0.2s,
                box-shadow 0.2s;
        }

        .form-input {
            height: 44px;
        }

        .form-textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.12);
        }

        .form-error {
            margin: 0;
            font-size: 13px;
            color: #dc2626;
        }

        /* =========================
           Buttons
        ========================= */

        .admin-actions {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #f3f4f6;
        }

        .admin-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .admin-button-primary {
            background: #222;
            color: #fff;
        }

        .admin-button-primary:hover {
            background: #333;
        }

        .admin-button-secondary {
            background: #fff;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .admin-button-secondary:hover {
            background: #f9fafb;
        }

        /* =========================
           Alerts
        ========================= */

        .admin-alert-success {
            margin-bottom: 20px;
            padding: 12px 16px;
            border-radius: 8px;
            background: #ecfdf5;
            color: #047857;
            font-size: 14px;
        }

        .admin-alert-error {
            margin-bottom: 20px;
            padding: 12px 16px;
            border-radius: 8px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 14px;
        }

        /* =========================
           Table
        ========================= */

        .admin-table-wrapper {
            width: 100%;
            overflow-x: auto;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th {
            padding: 14px 16px;
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
            font-weight: 600;
            text-align: right;
            white-space: nowrap;
        }

        .admin-table td {
            padding: 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
            font-size: 14px;
            text-align: right;
        }

        .admin-table tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           Badge
        ========================= */

        .admin-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .admin-badge-success {
            background: #dcfce7;
            color: #15803d;
        }

        .admin-badge-neutral {
            background: #f3f4f6;
            color: #4b5563;
        }

        /* =========================
           Mobile Menu
        ========================= */

        .mobile-menu-button {
            display: none;
        }

        /* =========================
           Mobile
        ========================= */

        @media (max-width: 768px) {

            .admin-layout {
                display: block;
                width: 100%;
                min-height: 100vh;
            }

            .mobile-menu-button {
                display: block;
                position: fixed;
                top: 12px;
                right: 12px;
                z-index: 1001;

                width: 44px;
                height: 44px;

                border: none;
                border-radius: 8px;

                background: #222;
                color: white;

                font-size: 24px;
                line-height: 44px;
                text-align: center;

                cursor: pointer;
            }

            .sidebar {
                display: none;

                position: fixed;
                top: 0;
                right: 0;

                width: 250px;
                height: 100vh;

                z-index: 1000;

                overflow-y: auto;
            }

            .sidebar.mobile-open {
                display: flex;
            }

            .admin-content {
                width: 100%;
                max-width: 100%;
                min-width: 0;

                padding: 70px 16px 16px;

                overflow-x: hidden;
            }

            .admin-container {
                width: 100%;
                max-width: 100%;
                margin: 0;
            }

            .admin-page-title {
                font-size: 24px;
            }

            .admin-card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .admin-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .admin-button {
                width: 100%;
            }

            .sidebar-nav {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 6px;
                width: 100%;
            }

            .sidebar-link {
                width: 100%;
                padding: 10px 8px;
                font-size: 13px;
                text-align: center;
                white-space: normal;
                overflow-wrap: anywhere;
            }

            .sidebar-footer {
                width: 100%;
                margin-top: 16px;
                padding-top: 16px;
            }

            .logout-button {
                width: 100%;
                margin-top: 0;
                padding: 10px;
                font-size: 13px;
            }
        }

    </style>

</head>

<body>

<div class="admin-layout">

    @include('admin.layouts.sidebar')

    <main class="admin-content">

        <div class="admin-container">

            @yield('content')

        </div>

    </main>

</div>

</body>

</html>