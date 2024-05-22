@auth
@if (Auth::user()->role == 'admin')
<a href="/" class="logo">CourseLab</a>
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