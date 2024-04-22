<div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card border rounded">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Pending Services</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-1">
                            <!-- <button type="button" class="btn btn-success float-end mb-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                Add Service
                            </button> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-black">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Service Type</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Service Row (Replace with dynamic data) -->
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Printing</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendingServiceModal1">
                                                View Details
                                            </button>
                                        </td>
                                        <td>Pending</td>
                                        <td>
                                            <!-- Button to Approve Service Modal -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveServiceModal1">
                                                Approve
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Add more rows for other pending services -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Details Modal for Pending Service -->
    <div class="modal fade" id="pendingServiceModal1" tabindex="-1" aria-labelledby="pendingServiceModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="pendingServiceModal1Label">Service Details - Printing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <p><strong>Customer Name:</strong> John Doe</p>
                    <p><strong>Service Type:</strong> Printing</p>
                    <p><strong>Details:</strong> Brochure Printing, A4, 100 copies, Full Color</p>
                    <!-- Additional service details can be included here -->
                </div>
                
                <div class="modal-footer bg-white text-black">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Approve Service under pending Modal -->
    <div class="modal fade" id="approveServiceModal1" tabindex="-1" aria-labelledby="approveServiceModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="approveServiceModal1Label">Approve Service - Printing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <!-- Approval Form or Confirmation Message -->
                    <h5 style="font-weight: 500; font-size: 15px;margin-bottom: 7px;">Upload Payment OR</h5>
                    <label for="imageUpload" style="font-weight: 400"></label>
                    <input type="file" class="form-control-file border" id="imageUpload" accept="image/*" style="padding: 6px; border-radius: 8px; width: 80%;" required>
                    
                </div>
        
                <div class="modal-footer bg-white text-black">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success">Approve</button>
                </div>
            </div>
        </div>
    </div>
</div>
