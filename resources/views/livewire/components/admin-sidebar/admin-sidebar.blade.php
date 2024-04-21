<div>
    <nav class="sidebar">
        
        <div class="sidebar-header" style="background-color: #8d021f;">
            <a href="#" class="sidebar-brand">
                UPRESS
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">
                    Main
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-dashboard')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                    <li class="nav-item nav-category">
                        Components
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#stockin" role="button" aria-expanded="false" aria-controls="uiComponents">
                            <i class="link-icon" data-feather="hard-drive"></i>
                            <span class="link-title">Stock</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div wire:ignore.self class="collapse" id="stockin">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('admin-stocklist') }}" class="nav-link">Stock List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin-stock-in-records') }}" class="nav-link">Stock In Records</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin-stock-out-records') }}" class="nav-link">Stock Out Records</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                            <i class="link-icon" data-feather="shopping-bag"></i>
                            <span class="link-title">Products</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="uiComponents">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin-product-list')}}" class="nav-link @if( Route::is('admin-product-list')) active @endif">Product list</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin-product-size')}}" class="nav-link @if( Route::is('admin-product-size')) active @endif">Sizes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin-product-color')}}" class="nav-link @if( Route::is('admin-product-color')) active @endif">Color</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="layers"></i>
                            <span class="link-title">Services</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin-servicelist')}}" class="nav-link">Service Lists</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin-pendingservices')}}"class="nav-link">Pending Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Approved Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Completed Services</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#orders" role="button" aria-expanded="false" aria-controls="orders">
                            <i class="link-icon" data-feather="shopping-cart"></i>
                            <span class="link-title">Orders</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="orders">
                            <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('admin-product-orders') }}" class="nav-link">Product Ordering</a>
                            </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#transaction" role="button" aria-expanded="false" aria-controls="transaction">
                            <i class="link-icon" data-feather="credit-card"></i>
                            <span class="link-title">Transactions</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="transaction">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('admin-transactionrecords') }}" class="nav-link">Transaction Records</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @if($user_info->role_name == 'admin')
                        <li class="nav-item nav-category">Accounts</li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#generalpages" role="button" aria-expanded="false" aria-controls="general-pages">
                                    <i class="link-icon" data-feather="users"></i>
                                    <span class="link-title">Users</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="generalpages">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <a href="{{route('admin-user-admin')}}" class="nav-link @if( Route::is('admin-user-admin')) active @endif">Admins</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin-user-staff')}}" class="nav-link @if( Route::is('admin-user-admin')) active @endif">Staffs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin-user-customer')}}" class="nav-link @if( Route::is('admin-user-admin')) active @endif">Customers</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> 
                        </li> 
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</div>
