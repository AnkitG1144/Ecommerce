<div class="l-navbar show" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class="fa fa-shopping-bag"></i> <span class="nav_logo-name">Ecommerce</span> </a>
            <div class="nav_list">
                <a href="{{ URL::to('vendor/home') }}" class="nav_link @if(request()->is('vendor/home') || request()->is('home')) active @endif"> 
                    <i class='fa fa-home nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> 
                </a>
                @if(Auth::guard('vendor')->check())
                    <a href="{{ URL::to('vendor/brands') }}" class="nav_link @if(request()->is('vendor/brands')) active @endif"> <i class='fa fa-bookmark nav_icon'></i> 
                        <span class="nav_name">Brand and Category</span> 
                    </a> 
                    <a href="{{ URL::to('vendor/products')}}" class="nav_link @if(request()->is('vendor/products')) active @endif"> <i class='fa fa-plus nav_icon'></i> 
                        <span class="nav_name">Add Product</span> 
                    </a>
                @endif
                @if(Auth::guard('user')->check())
                    <a href="{{ URL::to('checkout') }}" class="nav_link @if(request()->is('checkout')) active @endif"> <i class='fa fa-bookmark nav_icon'></i> 
                        <span class="nav_name">Cart</span> 
                    </a> 
                    <a href="{{ URL::to('order') }}" class="nav_link  @if(request()->is('order') || request()->is('orderDetails*')) active @endif"> <i class='fa fa-folder nav_icon'></i> 
                        <span class="nav_name">My Order</span> 
                    </a>
                @endif
            </div>
        </div>
        <a class="nav_link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out nav_icon"></i>
            <span class="nav_name">LogOut</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>