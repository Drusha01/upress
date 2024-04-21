<div>
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01" style="background-image: url('../landingpage/assets/images/wmsu.jpg');" >
                <div class="text-content">
                    <h4>WMSU</h4>
                    <h2>UPRESS</h2>
                </div>
            </div>
            <div class="banner-item-02" style="background-image: url('../landingpage/assets/images/slide_02.jpg');">
                <div class="text-content">
                    <h4>UPRESS</h4>
                    <h2>Products</h2>
                </div>
            </div>
            <div class="banner-item-03" style="background-image: url('../landingpage/assets/images/slide_03.jpg');">
                <div class="text-content">
                    <h4>UPRESS</h4>
                    <h2  >SERVICES</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="{{ route('page-products') }}">View all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="filters-content">
                        <div class="row grid">
                            @foreach ($stocks_data as $key => $value)
                                <div class="col-lg-4 col-md-4 all " >
                                    <div class="product-item">
                                        <a href="{{asset('storage/content/products/'.$value->product_image)}}" target="_blank">
                                            <img src="{{asset('storage/content/products/'.$value->product_image)}}" alt="" style="object-fit:contain; height: 200px; border-radius: 10px;">
                                        </a>
                                        <div class="down-content">
                                            <div class="row mx-2">
                                                <a href="#">
                                                    <h4>{{ $value->product_name }}</h4>
                                                </a>
                                                <div style="gap: 5px;">
                                                    <h6>
                                                        Php {{ $value->product_price }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="row mx-2">
                                                <p>Status: @if($value->is_active ) Available @else Unavailable @endif</p>
                                            </div>
                                            <div class="row mx-2" style="height:50px">
                                                @if($value->product_description)
                                                <h4>
                                                    Description:<p class="my-2">{{ $value->product_description }}</p>
                                                </h4>
                                                @endif
                                            </div>
                                            <div class="row mx-2 mt-4 ">
                                                <button class="btn btn-success" type="button" wire:click="add_to_cart({{$value->id}},'cartModalToggler')" >Add Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#cartModal" id="cartModalToggler" style="display:none">Add</button>
                    
                    <div wire:ignore.self class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="col-md-12 text-center">
                                    <span class="btn btn" data-bs-toggle="modal" style="display: flex; justify-content:end; font-size:32px">&times;</span> 
                                    <svg width="120px" height="120px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#8c8787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                <div>
                                <div class="modal-body bg-white">
                                    <div class="col-md-12 text-center">
                                        <h5 class="text-danger text-center">Are you sure you want to deactivate this?</h5>
                                    </div>
                                </div>
                                <div class="modal-footer bg-white" style="justify-content: center;">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="border-radius: 8px">Yes, Proceed</button>
                                    <button type="submit" class="btn btn-secondary" style="border-radius: 8px">No, Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-container mt-3">
                        <ul class="pagination">
                            <li>
                                <a href="{{ $stocks_data->previousPageUrl() }}">
                                    Previous
                                </a>
                            </li>
                            @foreach ($stocks_data->getUrlRange(1, $stocks_data->lastPage()) as $page => $url)
                                <li class="{{ $page == $stocks_data->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ $stocks_data->nextPageUrl() }}">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                    <h2>Latest Servicess</h2>
                    <a href="{{route('page-services')}}">view all services <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="filters-content">
                        <div class="row grid">
                            @foreach ([] as $service)
                                <div class="col-lg-4 col-md-4 all des">
                                    <div class="product-item">
                                        <a href="#"><img src="/servicesimages/{{$service->image}}" alt="" style="width: 100%; height: 200px;bservice-radius: 10px;"></a>
                                        <div class="down-content">
                                            <a href="#">
                                                <h4 class="">{{$service->category}}</h4>
                                            </a>
                                            <div class="" style="gap:5px;"><h6>Php {{$service->unit_price}}</h6></div>
                                            
                                            <h4>Description:<p>{{$service->descritpion}}</p></h4>
                                            <p>Stocks: {{$service->stocks}}</p>
                                            <p>Status: {{$service->status}}</p>
                                            <button class="btn btn-primary" onclick="openModal('{{$service->product_name}}', '{{$service->unit_price}}', '{{$service->image}}')">Add Cart</button> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                    <h2>About WMSU UPRESS</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                    <h4>Looking for the best products?</h4>
                    <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
                    <ul class="featured-list">
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Consectetur an adipisicing elit</a></li>
                        <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                        <li><a href="#">Corporis, omnis doloremque</a></li>
                        <li><a href="#">Non cum id reprehenderit</a></li>
                    </ul>
                    <a href="about.html" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                    <img src="/landingpage/assets/images/feature-image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Creative &amp; Unique <em>UPRESS</em> Products</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filled-button">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>