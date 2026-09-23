<button
    type="button"
    class="mobile-menu-button"
    onclick="document.querySelector('.sidebar').classList.toggle('mobile-open')"
    aria-label="فتح القائمة"
>
    ☰
</button>

<aside class="sidebar">

    <div class="sidebar-logo">
        SOWLFA
    </div>

    <div class="sidebar-title">
        لوحة الإدارة
    </div>

    <nav class="sidebar-nav">

        <a
            href="{{ route('admin.dashboard') }}"
            class="sidebar-link"
        >
            لوحة الإدارة
        </a>

        <a
            href="{{ route('admin.users.index') }}"
            class="sidebar-link"
        >
            المستخدمون
        </a>

        <a
            href="{{ route('admin.users.create') }}"
            class="sidebar-link"
        >
            إنشاء مستخدم
        </a>

        <a
            href="{{ route('admin.offices.index') }}"
            class="sidebar-link"
        >
            المكاتب
        </a>

        <a
            href="{{ route('admin.offices.create') }}"
            class="sidebar-link"
        >
            إنشاء مكتب
        </a>

        <a
            href="{{ route('admin.subscriptions.index') }}"
            class="sidebar-link"
        >
            الاشتراكات
        </a>

        <a
            href="{{ route('admin.subscriptions.create') }}"
            class="sidebar-link"
        >
            إنشاء اشتراك
        </a>

        <a
            href="{{ route('admin.subscription-plans.index') }}"
            class="sidebar-link"
        >
            خطط الاشتراك
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