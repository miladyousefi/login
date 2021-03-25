<nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column text-right" >
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary m-1" href="{{route('admin.home')}}">
                                <span data-feather="home"></span>
                                داشبورد <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary m-1" href="{{route('admins.list')}}">
                                <span data-feather="file"></span>
                                لیست ادمین ها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary m-1" href="{{route('post.admin')}}">
                                <span data-feather="shopping-cart"></span>
                                نوشته ها
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-danger m-1" href="{{route('setting.admin')}}">
                                <span data-feather="shopping-cart"></span>
                                تنظیمات
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

