<div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card border rounded">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Service List</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-2">
                            <button type="button" class="btn btn-success float-end mb-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                Add Service
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-black">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Image</th>
                                        <th>Service ID</th>
                                        <th>Service</th>
                                        <th>Type of Service</th>
                                        <th>Sizes</th>
                                        <th>Units</th>
                                        <th>Color</th>
                                        <th>Unit Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td>
                                            <img src="path_to_image.jpg" alt="Service Image" style="width: 50px;">
                                        </td>
                                        <td>Service123</td>
                                        <td>Printing</td>
                                        <td>Brochure Printing</td>
                                        <td>A4</td>
                                        <td>100</td>
                                        <td>Full Color</td>
                                        <td>$50.00</td>
                                        <td>Available</td>
                                        <td>
                                            <!-- Button to View Details Modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewServiceModal">
                                                View Details
                                            </button>
                                            <!-- Button to edit Details Modal -->
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editServiceModal">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="addServiceModalLabel">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <!-- Form to Add Service -->
                    <form>
                        <!-- Service Name Input -->
                        <div class="mb-3">
                            <label for="serviceName" class="form-label text-black">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" placeholder="Enter service name">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- View Details  -->
    <div class="modal fade" id="viewServiceModal" tabindex="-1" aria-labelledby="viewServiceModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="pendingServiceModal1Label">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <p class="mb-2"><strong>Image</strong> <img src="path_to_image.jpg" alt="Service Image" style="width: 50px;"> </p>
                    <p class="mb-2"><strong>Service</strong>Printing</p>
                    <p class="mb-2"><strong>Type of Service</strong> </p>
                    <p class="mb-2"><strong>Price</strong> 99 </p>
                    <p class="mb-2"><strong>Details</strong> </p>
                </div>
                
                <div class="modal-footer bg-white text-black">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- EDit Details -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="pendingServiceModal1Label">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <p class="mb-2"><strong>Image</strong> <img src="path_to_image.jpg" alt="Service Image" style="width: 50px;"> </p>
                    <p class="mb-2"><strong>Service</strong>Printing</p>
                    <p class="mb-2"><strong>Type of Service</strong> </p>
                    <p class="mb-2"><strong>Price</strong> 99 </p>
                    <p class="mb-2"><strong>Details</strong> </p>
                </div>
                
                <div class="modal-footer bg-white text-black">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
