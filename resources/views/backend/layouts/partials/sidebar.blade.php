<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu Admin</li>
            <li><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> <span> {{ __('Dashboard') }}</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-table"></i><span>Berita</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('berita.index') }}">{{ __('Data-Berita') }}</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>