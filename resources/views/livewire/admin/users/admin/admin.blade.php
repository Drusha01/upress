<div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow">
                
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <h4 class="mb-3 mb-md-0">Admin Users</h4>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#" class="btn btn-success me-md-2" wire:click="add_user_default('addAccountModalToggler')">Add</a>
                        </div>
                        <br>
                        <div>
                            <div class="table-responsive tab" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                <table class="table table-info" >
                                    <thead class="thead-light">
                                        <tr>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">#</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">Image</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">Email</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">FirstName</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">Middle Name</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">LastName</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">College</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">Department</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">Contact #</th>
                                        <th style="padding:20px; font-weight: bold; background-color: #343a40; color: white;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users_data  as $key => $value )
                                            <tr class="table-light">
                                                <th scope="row" class="px-4 py-3 align-middle">{{(intval($users_data->currentPage()-1)*$users_data->perPage())+$key+1 }}</th>
                                                <td class="align-middle">
                                                    <img style="height:100px; width:100px;" src="{{asset('storage/profile/'.$value->image) }}">
                                                </td>
                                                <td class="align-middle">{{ $value->email}}</td>
                                                 <td class="align-middle">{{ $value->first_name}}</td>
                                                 <td class="align-middle">{{ $value->middle_name}}</td>
                                                 <td class="align-middle">{{ $value->last_name}}</td>
                                                 <td class="align-middle">{{ $value->college_name }}</td>
                                                 <td class="align-middle">{{ $value->department_name}}</td>
                                                 <td class="align-middle">{{ $value->contact_no}}</td>
                                                 <td class="align-middle">
                                                    <a href="" title="Edit">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                    </a>
                                                    <a href="" title="Edit">
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Deactivate
                                                        </button>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <button class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#addAccountModal" id="addAccountModalToggler" style="display:none">Add</button>
                            <div wire:ignore.self class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg modal-dialog-centered"> 
                                    <div class="modal-content bg-maroon">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white" id="addAccountModalLabel">Add Admin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-white text-black">
                                            <form wire:submit.prevent="add_user('addAccountModalToggler')">
                                                <input type="hidden" name="_token" value="giFBHnCrkDKLxxwYQxLNuY6iqeGUsJXXlDuUvbLR" autocomplete="off">                   
                                                 <div class="row g-3 mb-3"> 
                                                    <div class="col-md-6">
                                                        <label for="firstname" class="form-label text-dark">First Name:</label>
                                                        <input type="text"  wire:model="user.first_name" class="form-control " required name="firstname" id="firstname" placeholder="Enter firstname" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="firstname" class="form-label text-dark">Middle Name:</label>
                                                        <input type="text"  wire:model="user.middle_name" class="form-control " name="firstname" id="firstname" placeholder="Enter middlename" value="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="lastname" class="form-label text-dark">Last Name:</label>
                                                        <input type="text"  wire:model="user.last_name" class="form-control " required name="lastname" id="lastname" placeholder="Enter lastname" value="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="college" class="form-label text-dark">College:</label>
                                                        <select class="form-select "  wire:model.live="user.college_id"  required name="college" id="college" aria-label="Select College">
                                                            <option selected="" value="">Select college</option>
                                                            @foreach($colleges as $key =>$value)
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="college" class="form-label text-dark">Department:</label>
                                                        <select class="form-select "  wire:model="user.department_id" required name="college" id="college" aria-label="Select College">
                                                            <option selected="" value="" >Select department</option>
                                                            @foreach($departments as $key =>$value)
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="role" class="form-label text-dark">Role:</label>
                                                        <select class="form-select"  wire:model="user.role_id" name="role" required id="role" aria-label="Select Role">
                                                            @foreach($admin_roles as $key =>$value)
                                                            <option selected value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="email" class="form-label text-dark">Email:</label>
                                                        <input type="text"  wire:model="user.email" class="form-control " required name="email" id="email" placeholder="Enter email" value="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="contact_no" class="form-label text-dark">Contact No.:</label>
                                                        <input type="number"  wire:model="user.contact_no" class="form-control "  name="Contact #" id="" placeholder="Enter contact #" value="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="password" class="form-label text-dark">Password:</label>
                                                        <input type="password"  wire:model="user.password" class="form-control " required name="password" id="password" placeholder="Enter your password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="confirm_password" class="form-label text-dark">Confirm Password:</label>
                                                        <input type="password"  wire:model="user.confirm_password" class="form-control" required name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                                    </div>
                                                    @if($user['error'])
                                                        <div class="col-md-12">
                                                            <p style ="color:red">Error: {{$user['error']}}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2"></div>
                    {{$users_data->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
       
    </script>
</div>
