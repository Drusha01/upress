<div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card border rounded">
                    <div class="card-body">
                        <h4 class="mb-1">Completed Services</h4>
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Service Row (Replace with dynamic data) -->
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Printing</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewCompletedServices">
                                                View Details
                                            </button>
                                        </td>
                                        <td>Approved</td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Details Modal for Pending Service -->
    <div class="modal fade" id="viewCompletedServices" tabindex="-1" aria-labelledby="viewCompletedServices" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="pendingServiceModal1Label">Service Details</h5>
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
    
</div>
