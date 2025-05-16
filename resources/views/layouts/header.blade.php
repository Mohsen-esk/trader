<!-- هدر و منو -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="لوگو" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'32\'><rect width=\'100\' height=\'32\' fill=\'%233861FB\'/><text x=\'50\' y=\'20\' font-size=\'16\' text-anchor=\'middle\' fill=\'white\' font-family=\'Arial\'>داشبورد</text></svg>'">
            داشبورد بازار
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">داشبورد</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('markets/gold*') ? 'active' : '' }}" href="/markets/gold">طلا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('markets/silver*') ? 'active' : '' }}" href="/markets/silver">نقره</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('markets/crypto*') ? 'active' : '' }}" href="/markets/crypto">ارز</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('markets/stocks*') ? 'active' : '' }}" href="/markets/stocks">بورس</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="#" class="btn btn-outline me-2">
                    <i class="fas fa-bell"></i>
                </a>
                <a href="#" class="btn btn-primary">ورود / ثبت نام</a>
            </div>
        </div>
    </div>
</nav>