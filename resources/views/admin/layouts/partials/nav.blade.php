<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
</a>
<!-- Sidebar menu quản trị -->
<nav class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Trang quản trị</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">Quản lý người dùng</a> <!-- Đã bỏ 'admin.' -->
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">Quản lý bài viết</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">Quản lý chuyên mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comments.index') }}">Quản lý bình luận</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tags.index') }}">Quản lý thẻ tag</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">Trở lại</a>
        </li>
    </ul>

</nav>
