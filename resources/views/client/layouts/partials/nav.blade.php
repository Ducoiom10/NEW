<div class="container">
    <a class="navbar-brand me-lg-5 me-0" href="/">
        <img src="/client/images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
    </a>

    <form action="{{ route('client.articles.index') }}" method="get" class="custom-form search-form flex-fill me-3"
        role="search">
        <div class="input-group input-group-lg">
            <input name="query" type="search" class="form-control" id="search" placeholder="Tìm kiếm sản phẩm"
                aria-label="Search" value="{{ request('query') }}"> <!-- Giữ giá trị tìm kiếm trước đó -->

            <button type="submit" class="form-control" id="submit">
                <i class="bi-search"></i>
            </button>
        </div>
    </form>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-lg-auto">
            <li class="nav-item">
                <a class="nav-link active" href=" {{ url('/') }} ">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
        </ul>

        <div class="ms-4 d-flex align-items-center">

            <!-- Nút Giỏ hàng -->
            {{-- <a href="section-cart" class="btn custom-btn custom-border-btn smoothscroll me-3"><i
                    class="bi bi-cart-plus-fill"></i> Giỏ hàng</a> --}}

            <!-- Nút Tài khoản với Dropdown Menu -->
            <div class="dropdown">
                <button class="btn custom-btn custom-border-btn" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> Tài khoản
                </button>
                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                    @if (auth()->check())
                        <li><a class="dropdown-item" href="{{ route('profiles', auth()->user()->id) }}">Quản lý tài khoản</a></li>

                        <li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                        </li>

                        @if (auth()->user()->role === 'admin') <!-- Kiểm tra xem người dùng có phải là admin không -->
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Trang quản trị</a></li>
                        @endif
                    @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                    @endif
                </ul>
            </div>


        </div>

    </div>
</div>
