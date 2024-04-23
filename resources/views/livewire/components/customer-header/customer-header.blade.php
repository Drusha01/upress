<div>
<header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{route('customer-dashboard')}}"><h2>WMSU <em>UPRESS</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link @if( Route::is('customer-dashboard')) active @endif" href="{{route('customer-dashboard')}}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link @if( Route::is('customer-product')) active @endif" href="{{route('customer-product')}}"> Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if( Route::is('customer-services')) active @endif" href="{{route('customer-services')}}">Services</a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart">
                            <a class="nav-link @if( Route::is('customer-cart')) active @endif" href="{{route('customer-cart')}}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge bg-primary">{{$header_info['cart_items']}}</span>
                            </a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Orders">
                            <a class="nav-link @if( Route::is('customer-order-list')) active @endif" href="{{route('customer-order-list')}}">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="badge bg-primary">{{$header_info['pending_order']}}</span>
                            </a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services">
                            <a class="nav-link @if( Route::is('customer-order-list')) active @endif" href="{{route('customer-order-list')}}">
                                <i class="link-icon" data-feather="layers"></i>    
                                <span class="badge bg-primary">12</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Track Orders">
                            <a class="nav-link @if( Route::is('customer-track-order')) active @endif" href="{{route('customer-track-order')}}">
                                <i class="fas fa-truck"></i>
                                <span class="badge bg-primary">3</span>
                            </a>
                        </li> -->
                        <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>
                                <span class="badge bg-primary" id="notificationCount">{{$header_info['notification_items']}}</span>
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown" id="notificationDropdownMenu">
                            </div>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Contact us">
                            <a wire:navigate class="nav-link @if( Route::is('customer-contact')) active @endif" href="{{route('customer-contact')}}">
                                <i class="fas fa-address-book"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle"  src="{{asset('storage/profile/'.$user_info->image) }}" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="{{asset('storage/profile/'.$user_info->image) }}" alt="profile">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder"></p>
                                        <p class="tx-12 text-muted"></p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        <a wire:navigate href="{{route('customer-profile')}}" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="{{ route('logout') }}" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
