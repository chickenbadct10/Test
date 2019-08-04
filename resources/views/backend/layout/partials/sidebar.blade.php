<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.dashboard') === 0) ? 'active' : '' }}" href="{{ route('backend.dashboard') }}">
                    <span data-feather="home"></span>
                    Bảng tin <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- Menu Loại - Start -->
            <li class="nav-item">
                <a href="#loaiSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.loai') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Loại laptop
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.loai') === 0) ? 'collapse show' : 'collapse' }}" id="loaiSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.loai.index') === 0) ? 'active' : '' }}" href="{{ route('backend.loai.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.loai.index') === 0) ? 'active' : '' }}" href="{{ route('backend.loai.index') }}/">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.loai.create') === 0) ? 'active' : '' }}" href="{{ route('backend.loai.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Loại - End -->
            <!-- Menu Sản phẩm - Start -->
            <li class="nav-item">
                <a href="#sanphamSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.sanpham') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Sản phẩm
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.sanpham') === 0) ? 'collapse show' : 'collapse' }}" id="sanphamSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.sanpham.index') === 0) ? 'active' : '' }}" href="{{ route('backend.sanpham.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.sanpham.create') === 0) ? 'active' : '' }}" href="{{ route('backend.sanpham.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Sản phẩm - End -->
            <!-- Menu Vận chuyển - Start -->
            <li class="nav-item">
                <a href="#vanchuyenSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.vanchuyen') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Phương thức vận chuyển
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.vanchuyen') === 0) ? 'collapse show' : 'collapse' }}" id="vanchuyenSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.vanchuyen.index') === 0) ? 'active' : '' }}" href="{{ route('backend.vanchuyen.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.vanchuyen.create') === 0) ? 'active' : '' }}" href="{{ route('backend.vanchuyen.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Vận chuyển - End -->  
            <!-- Menu Thanh toán - Start -->
            <li class="nav-item">
                <a href="#thanhtoanSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.thanhtoan') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Phương thức thanh toán
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.thanhtoan') === 0) ? 'collapse show' : 'collapse' }}" id="thanhtoanSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.thanhtoan.index') === 0) ? 'active' : '' }}" href="{{ route('backend.thanhtoan.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.thanhtoan.create') === 0) ? 'active' : '' }}" href="{{ route('backend.thanhtoan.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Thanh toán - End -->        
            <!-- Menu Xuất xứ - Start -->
            <li class="nav-item">
                <a href="#XuatXuSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.xuatxu') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Xuất xứ
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.thanxuatxuhtoan') === 0) ? 'collapse show' : 'collapse' }}" id="XuatXuSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.xuatxu.index') === 0) ? 'active' : '' }}" href="{{ route('backend.xuatxu.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.xuatxu.create') === 0) ? 'active' : '' }}" href="{{ route('backend.xuatxu.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Xuất xứ - End -->   
            <!-- Menu Nhà cung cấp - Start -->
            <li class="nav-item">
                <a href="#nhacungcapSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.nhacungcap') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Nhà cung cấp
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.nhacungcap') === 0) ? 'collapse show' : 'collapse' }}" id="nhacungcapSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhacungcap.index') === 0) ? 'active' : '' }}" href="{{ route('backend.nhacungcap.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhacungcap.create') === 0) ? 'active' : '' }}" href="{{ route('backend.nhacungcap.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Nhà cung cấp - End -->            
            <!-- Menu Quyền - Start -->
            <li class="nav-item">
                <a href="#nquyenSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.quyen') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Quyền
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.quyen') === 0) ? 'collapse show' : 'collapse' }}" id="nquyenSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.quyen.index') === 0) ? 'active' : '' }}" href="{{ route('backend.quyen.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.quyen.create') === 0) ? 'active' : '' }}" href="{{ route('backend.quyen.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Quyền- End -->                                            
            <!-- Menu Báo cáo - Start -->
            <li class="nav-item">
                <a href="#baocaoSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.baocao') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Báo cáo - Thống kê
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.baocao') === 0) ? 'collapse show' : 'collapse' }}" id="baocaoSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.baocao.donhang') === 0) ? 'active' : '' }}" href="{{ route('backend.baocao.donhang') }}/">
                            <span data-feather="list"></span>
                            Đơn hàng
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Báo cáo - End -->
        </ul>
    </div>
</nav>