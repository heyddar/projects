<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.user.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-user-plus"></i>
                                    <p>افزودن کاربر</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.user.index')}}" class="nav-link">
                                    <i class="fa fa-users"></i>
                                    <p>لیست کاربران</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.role.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> افزودن نقش</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.role.index')}}" class="nav-link">
                                    <i class="fa fa-list-alt"></i>
                                    <p>لیست نقش ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.permission.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> افزودن دسترسی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.permission.index')}}" class="nav-link">
                                    <i class="fa fa-list-alt"></i>
                                    <p>لیست  دسترسی ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endif
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                  وبلاگ
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.post.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن پست</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.post.index')}}" class="nav-link">
                                    <i class="fa fa-th-list"></i>
                                    <p>لیست پست ها</p>
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->can('grouping'))
                            <li class="nav-item">
                                <a href="{{route('admin.group.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن دسته بندی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.group.index')}}" class="nav-link">
                                    <i class="fa fa-th-list"></i>
                                    <p>لیست دسته بندی ها</p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route('admin.tag.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن کلمه کلیدی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.tag.index')}}" class="nav-link">
                                    <i class="fa fa-th-list"></i>
                                    <p>لیست کلمات کلیدی</p>
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->can('commenting'))
                            <li class="nav-item">
                                <a href="{{route('admin.comment.index')}}" class="nav-link">
                                    <i class="fa fa-th-list"></i>
                                    <p>لیست نظرات</p>
                                </a>
                            </li>
                             @endif

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                دسته بندی محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.category.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن دسته بندی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.category.index')}}" class="nav-link">
                                    <i class="fa fa-th-list"></i>
                                    <p>لیست دسته بندی ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-fa"></i>
                            <p>
                                برندها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.brand.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن برند</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.brand.index')}}" class="nav-link">
                                    <i class="fa fa-list"></i>
                                    <p>لیست برندها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-signal"></i>
                            <p>
                                سایزها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.size.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن سایز</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.size.index')}}" class="nav-link">
                                    <i class="fa fa-list"></i>
                                    <p>لیست سایزها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-paint-brush"></i>
                            <p>
                                رنگ ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.color.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن رنگ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.color.index')}}" class="nav-link">
                                    <i class="fa fa-list"></i>
                                    <p>لیست رنگ ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.product.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>افزودن محصول</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.product.index')}}" class="nav-link">
                                    <i class="fa fa-list"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
