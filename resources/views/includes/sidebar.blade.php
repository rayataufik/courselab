@auth
@if (Auth::user()->role == 'user')
<a href="#" class="logo">CourseLab</a>
<div class="menu-content">
    <ul class="menu-items">
        <div class="menu-title">Your menu title</div>
        <li class="item">
            <a href="#">Your first link</a>
        </li>
        <li class="item">
            <div class="submenu-item">
                <span>First submenu</span>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <ul class="menu-items submenu">
                <div class="menu-title">
                    <i class="fa-solid fa-chevron-left"></i>
                    Your submenu title
                </div>
                <li class="item">
                    <a href="#">First sublink</a>
                </li>
                <li class="item">
                    <a href="#">First sublink</a>
                </li>
                <li class="item">
                    <a href="#">First sublink</a>
                </li>
            </ul>
        </li>
        <li class="item">
            <div class="submenu-item">
                <span>Second submenu</span>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <ul class="menu-items submenu">
                <div class="menu-title">
                    <i class="fa-solid fa-chevron-left"></i>
                    Your submenu title
                </div>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
                <li class="item">
                    <a href="#">Second sublink</a>
                </li>
            </ul>
        </li>
        <li class="item">
            <a href="#">Your second link</a>
        </li>
        <li class="item">
            <a href="#">Your third link</a>
        </li>
    </ul>
</div>
@elseif (Auth::user()->role == 'admin')
<a href="#" class="logo">CourseLab</a>
<div class="menu-content">
    <ul class="menu-items">
        <li class="item">
            <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="item">
            <a href="/admin/categories">Categories</a>
        </li>
        <li class="item">
            <a href="/admin/subcategory">Subcategory</a>
        </li>
        <li class="item">
            <a href="/admin/content">Content</a>
        </li>
    </ul>
</div>
@endif
@endauth