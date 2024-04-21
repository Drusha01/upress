<div>
    
    <div class="page-heading products-heading header-text" style="background-image: url('../landingpage/assets/images/products-heading.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Upress</h4>
                        <h2>Services</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>error</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ session('error') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filters">
                        <ul>
                            <li class="active" data-filter="*">All Services</li>
                            <li id="filter">Category</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="filters-content">
                        <div class="row grid">
                            <div class="col-lg-4 col-md-4 all des">
                                <div class="product-item">
                                    <a href="#"><img src="/servicesimages" alt="" style="width: 100%; height: 200px;bservice-radius: 10px;"></a>
                                        <div class="down-content">
                                            <a href="#">
                                                <h4 class="">Category</h4>
                                            </a>
                                        <div class="" style="gap:5px;"><h6>Services Unit Price</h6></div>
                                        <p>Stocks: stocks</p> 
                                        <p>Stocks: service-stocks</p>
                                        <p>Status: service-staatus</p>
                                        <!-- Add Cart button with onclick event -->
                                        {{-- <button class="btn btn-primary" onclick="openModal('{{$service->product_name}}', '{{$service->unit_price}}', '{{$service->image}}')">Add Cart</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>                          
                    <!-- Modal -->
                    <div id="cartModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <h2>Add to Cart</h2>
                            <p id="productName"></p>
                        </div>
                            <!-- Form for color select, quantity input, and other color input -->
                            <form action="#" method="post" enctype="multipart/form-data">
                                
                                <div class="form-row">
                                    <div class="col-md-4 form-group">
                                        <label for="typeSelect">Type:</label>
                                        <select id="typeSelect" name="type" class="form-control">
                                            <option value="product">Product</option>
                                            <option value="services">Services</option>
                                        </select>
                                    </div>
                                    <!-- Color Select Column -->
                                    <div class="col-md-4 form-group">
                                        <label for="colorSelect">Select Color:</label>
                                        <select id="colorSelect" name="color" onchange="checkColor()" class="form-control">
                                            <option value="red">Red</option>
                                            <option value="blue">Blue</option>
                                            <option value="green">Green</option>
                                            <option value="other">Other</option>
                                            <!-- Add more color options as needed -->
                                        </select>
                                    </div>
                                    <!-- Quantity Input Column -->
                                    <div class="col-md-4 form-group">
                                        <label for="quantityInput">Quantity:</label>
                                        <input type="number" id="quantityInput" name="quantity" value="1" min="1" class="form-control" onchange="calculateTotal()">
                                    </div> 
                                    <div class="col-md-4 form-group">
                                        <label for="totalPrice">Total Price:</label>
                                        <input type="text" id="totalPrice" name="total_amount" class="form-control" readonly>
                                    </div>
                                </div>
                                
                                <!-- Other Color Input -->
                                <div class="form-group" id="otherColorInputContainer" style="display: none;">
                                    <label for="otherColorInput">Enter Color:</label>
                                    <input type="text" id="otherColorInput" name="othercolor"class="form-control" placeholder="Enter Color">
                                </div>
                                
                                <!-- Hidden input fields for product name, price, and user ID -->
                                <input type="hidden" id="productNameInput" name="item_name" value="">
                                <input type="hidden" id="productPriceInput" name="unit_price">
                                <input type="hidden" id="unitPriceInput" name="unit_price" value="">
                                <input type="hidden" name="product_id" value="">
                                <input type="hidden" name="users_id" value="">
                                <input type="hidden" id="userIdInput" name="image" value="">
                             
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
