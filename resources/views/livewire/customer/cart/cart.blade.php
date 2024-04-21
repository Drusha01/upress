<div>
    <div class="container " style="">
    <div class="row" style="height:150px"></div>
        <div class="row">
            <div class="card card-body border rounded">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h3 class="display-5 mb-2 text-center"> Cart</h3>
                            <p class="mb-5 text-center">
                            <div class="table-responsive">
                                <table id="" class="table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Image</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Product Size</th>
                                            <th>Product Color</th>
                                            <th>Product Qty</th>
                                            <th>Order Qty</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;?>
                                        @forelse($customer_cart  as $key => $value )
                                        <tr @if($value->quantity > $value->product_quantity) class="bg-danger" @endif >
                                            <th scope="row" class="align-middle">{{$key+1 }}</th>
                                            <td class="text-center align-middle">
                                                <img src="{{asset('storage/content/products/'.$value->product_image)}}" alt="Product Image"  style="object-fit: cover;width:100px; max-height: 100px;">
                                            </td>
                                            <td class="align-middle">{{$value->product_code}}</td>
                                            <td class="align-middle">{{$value->product_name}}</td>
                                            <td class="align-middle">{{$value->product_size}}</td>
                                            <td class="align-middle">{{$value->product_color}}</td>
                                            <td class="align-middle">{{$value->product_quantity}}</td>
                                            <td class="align-middle">
                                                <input type="number" min="1" wire:change="update_cart_quantity({{$value->product_stock_id}})" wire:model="customer_cart.{{$key}}.quantity" max="{{$value->product_quantity}}" value="{{$value->quantity}}" class="form-control">
                                            </td>
                                            <td class="align-middle">{{$value->product_price}}</td>
                                            <td class="text-center align-middle">
                                                <button class="btn-danger btn">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $total += ($value->quantity *$value->product_price)?>
                                        @empty
                                            <tr>
                                                <td colspan="42" class="text-center text-dark">NO DATA</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="row mx-2">
                                <div class="mb-3 col-6">
                                    <label for="productCode" class="form-label text-black">Customer Name :</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col  d-flex justify-content-end">
                                    <h5 class="">
                                        Total: 
                                        <span class="h2 mb-0 ms-2">
                                            Php {{number_format($total, 2, '.', ',')}}
                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="row mt-4 d-flex align-items-center justify-content-end">
                                <div class="col-sm-6 order-md-1 text-right">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">Checkout</button>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="col-md-12 ">
                                        <span class="btn btn" data-bs-toggle="modal" style="display: flex; justify-content:end; font-size:32px">
                                            &times;
                                        </span> 
                                        <form wire:submit.prevent="add_order('confirmModal')">
                                            <div>
                                                <p> Are you sure you want to order?</p>
                                            </div>
                                            <div class="modal-footer bg-white">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 8px">Cancel</button>
                                                <button  class="btn btn-success" type="submit" style="border-radius: 8px">Confirm</button>
                                            </div>
                                        </form>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
