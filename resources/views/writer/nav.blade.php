<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column text-right" >

            <li class="nav-item m-1">
                <a class="nav-link btn btn-outline-primary" href="{{route('writer.home')}}">
                    <span data-feather="shopping-cart" class="fa fa-home"></span>
                    داشبورد 
                </a>
            </li>
            <li class="nav-item m-1">
                <a class="nav-link btn btn-outline-primary" href="{{route('writer.home')}}">
                    <span data-feather="shopping-cart" class="fa fa-book"></span>
                    نوشته ها
                </a>
            </li>

            <li class="nav-item m-1">
                <a class="nav-link btn btn-outline-primary " href="{{ route('social.writer') }}">
                    <span data-feather="shopping-cart" class="fa fa-phone"></span>
                    شبکه های اجتماعی
                </a>
            </li>

            <li class="nav-item m-1">
                <a class="nav-link btn btn-outline-danger" href="{{route('setting.writer',\Illuminate\Support\Facades\Auth::guard('writer')->user()->id)}}">
                    <span data-feather="shopping-cart" class="fa fa-adjust"></span>
                    تنظیمات
                </a>
            </li>
            

        </ul>
    </div>
</nav>
