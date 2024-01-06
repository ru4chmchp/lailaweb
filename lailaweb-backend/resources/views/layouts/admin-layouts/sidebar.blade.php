<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-gradient-dark">
    <a href="{{ route('order.dashboard') }}" class="brand-link">
        <img src="{{ asset('adminResource\docs\assets\img\fishlogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-normal">Dashboard</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-category'></i>
                        <p class="">
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('newsletters.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-news'></i>
                        <p class="">
                            Quảng cáo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-store-alt'></i>
                        <p class="">
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sliders.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-slideshow'></i>
                        <p class="">
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-cog'></i>
                        <p class="">
                            Setting
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-user-account'></i>
                        <p class="">
                            Danh sách người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-user-detail'></i>
                        <p class="">
                            Danh sách vai trò
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}" class="nav-link">
                        <i class='nav-icon bx-sm bx bxs-group'></i>
                        <p class="">
                            Danh sách khách hàng
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="user-panel mt-3 pb-3 d-flex rounded border-white">
            <div class="image">
                <img src="{{ asset('adminResource/dist/img/avatar3.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block user_name">{{ auth()->user()->name }}</a>
            </div>
            <div class="info">
                <a href="{{ route('logout') }}" class="bx bx-log-out bx-sm ml-3"></a>
            </div>
            
        </div>
    </div>
    
</aside>
