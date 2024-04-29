<div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card border rounded">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Ready to PickUp Services</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-1">
                            <!-- <button type="button" class="btn btn-success float-end mb-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                Add Service
                            </button> -->
                        </div>
                        <div class="table-responsive">
                            <table id="shoppingCart" class="table-condensed table text-black" >
                                <thead>
                                    <tr>
                                        <th style="width:20%">Track No.</th>
                                        <th style="width:12%">Account Name</th>
                                        <th style="width:12%" class="text-center">Status</th>
                                        <th style="width:12%" class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($availed_services as $key =>$value)
                                    <tr>
                                        <td data-th="Price" class="align-middle">Track No: {{str_pad($value->id, 8, '0', STR_PAD_LEFT)}}</td>
                                        <td data-th="Price" class="align-middle">{{$value->first_name.' '.$value->middle_name.' '.$value->last_name}}</td>
                                        <td data-th="Price" class="align-middle text-center">{{$value->service_status}}</td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-danger btn-sm" wire:click="view_availed_service({{$value->id}},'approveModalToggler')">
                                                Return to Approved Order
                                            </button>
                                            <button class="btn btn-success btn-sm" wire:click="view_availed_service({{$value->id}},'completeModalToggler')">
                                                Complete
                                            </button>
                                            <button class="btn btn-primary btn-sm" wire:click="view_availed_service({{$value->id}},'viewModalToggler')">
                                                View
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
                        </div>
                        <div class="pagination-container mt-3">
                            <ul class="pagination">
                                <li><a href="{{ $availed_services->previousPageUrl() }}">Previous</a></li>
                                @foreach ($availed_services->getUrlRange(1, $availed_services->lastPage()) as $page => $url)
                                    <li class="{{ $page == $availed_services->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                <li><a href="{{ $availed_services->nextPageUrl() }}">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#viewModal" id="viewModalToggler" style="display:none">Add</button>
    <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="viewModalLabel">Service Details</h5>
                    <button type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white text-black" id="to_print">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center mb-4">
                            <div class="col-6 col-md-3 text-center">
                                <img  src="{{url('landingpage')}}/assets/images/wmsu.png" alt="University Logo" style="max-width: 100px;max-height: 100px;">
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span>Western Mindanao State University</span><br>
                                <h5>UNIVERSITY PRESS</h5>
                                <span>Zamboanga City</span>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <img  src="{{url('assets')}}/logo/upress-logo.png" alt="University Logo" style="max-width: 100px;max-height: 100px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3 text-start">
                                <div class="mb-2">
                                    <p><strong>Service ID:</strong> @if($service_availed['availed_services']) {{str_pad($service_availed['availed_services']->id, 8, '0', STR_PAD_LEFT)}} @endif</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>Service Status:</strong> @if($service_availed['availed_services']) {{$service_availed['availed_services']->service_status}} @endif</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>Customer Name:</strong> @if($service_availed['availed_services']){{$service_availed['availed_services']->first_name.' '.$service_availed['availed_services']->middle_name.' '.$service_availed['availed_services']->last_name}}@endif</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>College:</strong>@if($service_availed['availed_services']) {{$service_availed['availed_services']->college_name}} @endif</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>Department :</strong>@if($service_availed['availed_services']) {{$service_availed['availed_services']->department_name}} @endif</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>Avail Service Date :</strong>@if($service_availed['availed_services']) {{date_format(date_create($service_availed['availed_services']->date_created),"M d, Y h:i a")}} @endif</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>Total Amount:</strong> @if(isset($service_availed['availed_services']->total_price)) {{number_format($service_availed['availed_services']->total_price, 2, '.', ',')}} @endif</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table id="" class="table ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">Image</th>
                                                <th>Service Name</th>
                                                <th >Service Desc</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $total = 0;
                                                $valid_cart = true;
                                            ?>
                                            @forelse($service_availed['availed_service_items']  as $key => $value )
                                                <?php if(!$value->is_active) {$valid_cart = false;}?>
                                                <tr @if(!$value->is_active) class="bg-danger" @endif>
                                                    <th scope="row" class="align-middle">{{$key +1 }}</th>
                                                    <td class="text-center align-middle">
                                                        <img src="{{asset('storage/content/services/'.$value->service_image)}}" alt="Product Image"  style="object-fit: cover;width:100px; max-height: 100px;">
                                                    </td>
                                                    <td class="align-middle">{{$value->service_name}}</td>
                                                    <td class="align-middle">{{$value->service_description}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="42" class="text-center text-dark">NO DATA</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
                <div class="modal-footer bg-white text-black">
                    <a href="#"  onclick="print_this('to_print')" class="btn btn-secondary">Print</a>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div> 
    
    <button class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#approveModal" id="approveModalToggler" style="display:none">Add</button>
    <div  wire:ignore.self class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="approveModalLabel">Approve Service</h5>
                    <button type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save_approve_availed_service(@if($service_availed['availed_services']) {{$service_availed['availed_services']->id}} @endif,'approveModalToggler')">
                    <div class="modal-body bg-white text-black">
                        <p class="text-danger text-center">
                            Are you sure you want to return this to Approve Service?
                        </p>
                    </div>
                    @if($error)
                    <div class="modal-body bg-white text-black">
                        <p class="text-danger text-center">
                            {{$error}}
                        </p>
                    </div>
                    @endif
                    <div class="modal-footer bg-white text-black">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" >Approve Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <button class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#completeModal" id="completeModalToggler" style="display:none">Add</button>
    <div wire:ignore.self class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="completeModalLabel">Complete Service</h5>
                    <button type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save_complete_availed_service(@if($service_availed['availed_services']) {{$service_availed['availed_services']->id}} @endif,'completeModalToggler')">
                    <div class="modal-body bg-white text-black">
                        <div class="container-fluid">
                            <div class="row justify-content-center align-items-center mb-4">
                                <div class="col-6 col-md-3 text-center">
                                    <img class="img-fluid rounded-circle mb-2" src="{{url('landingpage')}}/assets/images/wmsu.png" alt="University Logo" style="max-width: 100px;">
                                </div>
                                <div class="col-6 col-md-3 text-center">
                                    <span>Western Mindanao State University</span><br>
                                    <h5>UNIVERSITY PRESS</h5>
                                    <span>Zamboanga City</span>
                                </div>
                                <div class="col-6 col-md-3 text-center">
                                    <img class="img-fluid rounded-circle mb-2" src="{{url('assets')}}/logo/upress-logo.png" alt="University Logo" style="max-width: 100px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3 text-start">
                                    <div class="mb-2">
                                        <p><strong>Service ID:</strong> @if($service_availed['availed_services']) {{str_pad($service_availed['availed_services']->id, 8, '0', STR_PAD_LEFT)}} @endif</p>
                                    </div>
                                    <div class="mb-2">
                                        <p><strong>Service Status:</strong> @if($service_availed['availed_services']) {{$service_availed['availed_services']->service_status}} @endif</p>
                                    </div>
                                    <div class="mb-2">
                                        <p><strong>Customer Name:</strong> @if($service_availed['availed_services']){{$service_availed['availed_services']->first_name.' '.$service_availed['availed_services']->middle_name.' '.$service_availed['availed_services']->last_name}}@endif</p>
                                    </div>
                                    <div class="mb-2">
                                        <p><strong>College:</strong>@if($service_availed['availed_services']) {{$service_availed['availed_services']->college_name}} @endif</p>
                                    </div>
                                    <div class="mb-2">
                                        <p><strong>Department :</strong>@if($service_availed['availed_services']) {{$service_availed['availed_services']->department_name}} @endif</p>
                                    </div>
                                    <div class="mb-2">
                                        <p><strong>Avail Service Date :</strong>@if($service_availed['availed_services']) {{date_format(date_create($service_availed['availed_services']->date_created),"M d, Y h:i a")}} @endif</p>
                                    </div>
                                    <div class="mb-2">
                                        <p><strong>Total Amount:</strong> @if(isset($service_availed['availed_services']->total_price)) {{number_format($service_availed['availed_services']->total_price, 2, '.', ',')}} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="" class="table ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-center">Image</th>
                                                    <th>Service Name</th>
                                                    <th >Service Desc</th>
                                                    <th >Quantity</th>
                                                    <th >Price / Unit</th>
                                                    <th >Partial Price</th>
                                                    <th >Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $total = 0;
                                                    $valid_cart = true;
                                                ?>
                                                @forelse($service_availed['availed_service_items']  as $key => $value )
                                                    <?php if(!$value->is_active) {$valid_cart = false;}?>
                                                    <tr @if(!$value->is_active) class="bg-danger" @endif>
                                                        <th scope="row" class="align-middle">{{$key +1 }}</th>
                                                        <td class="text-center align-middle">
                                                            <img src="{{asset('storage/content/services/'.$value->service_image)}}" alt="Product Image"  style="object-fit: cover;width:100px; max-height: 100px;">
                                                        </td>
                                                        <td class="align-middle">{{$value->service_name}}</td>
                                                        <td class="align-middle">{{$value->service_description}}</td>
                                                        <td class="align-middle">
                                                            <input type="number"  class="form-control" wire:change="update_total_price()" required wire:model="service_availed.availed_service_items.{{$key}}.quantity">
                                                        </td>
                                                        <td class="align-middle">
                                                            <input type="number"  class="form-control" wire:change="update_total_price()" required step="0.01" wire:model="service_availed.availed_service_items.{{$key}}.price_per_unit">
                                                        </td>
                                                        <td class="align-middle">
                                                            <input type="text"  class="form-control bg-white" disabled wire:model="service_availed.availed_service_items.{{$key}}.total_price">
                                                        </td>
                                                        <td class="align-middle" class="form-control" >
                                                            <textarea type="text" wire:model="service_availed.availed_service_items.{{$key}}.remarks"></textarea>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="42" class="text-center text-dark">NO DATA</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="row my-4 d-flex justify-content-start">
                                <div class="col-6 " style="background-color:white">
                                    <label for="file-proof" class="form-label text-black"> Proof</label>
                                    <input type="file" id="file-proof" wire:model="service_availed.image_proof" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @if($error)
                    <div class="modal-body bg-white text-black">
                        <p class="text-danger text-center">
                            {{$error}}
                        </p>
                    </div>
                    @endif
                    <div class="modal-footer bg-white text-black">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" >Complete</button>
                    </div>
                </form>
                

            </div>
        </div>
    </div> 

</div>
