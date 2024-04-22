<div>
    <div class="page-heading products-heading header-text" style="background-image: url('{{url('landingpage')}}/assets/images/products-heading.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>View</h4>
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products vh-100">
        <div class="container">
            @livewire('components.customer-order-filters.customer-order-filters')
            <div class="card card-body border rounded">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <article class="card">
                            <div class="card-body row">
                                <div class="col-12">
                                    <img class="rounded-circles d-block mx-auto mb-4" style="max-width: 200%; height: auto; max-height: 300px;" src="{{url('landingpage')}}/assets/images/wmsu.png" alt="University Logo">
                                    <div class="text-center">
                                        <span>Western Mindanao State University</span><br>
                                        <h5>UNIVERSITY PRESS</h5>
                                        <span>Zamboanga City</span>
                                    </div>
                                    <div class="text-center d-none d-md-block">
                                        <h5>ORDER SLIP</h5>
                                    </div>
                                    <div class="d-flex justify-content-md-between flex-column flex-md-row text-center">
                                        <div class="mb-md-0">
                                            <p>
                                                WMSU-UPRESS
                                            </p>
                                        </div>
                                        <div class="mb-md-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:20%">Track No.</th>
                                    <th style="width:12%">Account Name</th>
                                    <th style="width:12%" class="text-center">Status</th>
                                    <th style="width:12%" class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customer_order as $key =>$value)
                                <tr>
                                    <td data-th="Price" class="align-middle">Track No: {{str_pad($value->id, 8, '0', STR_PAD_LEFT)}}</td>
                                    <td data-th="Price" class="align-middle">{{$value->first_name.' '.$value->middle_name.' '.$value->last_name}}</td>
                                    <td data-th="Price" class="align-middle text-center">{{$value->order_status}}</td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> View
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="42" class="text-center text-dark">NO DATA</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>