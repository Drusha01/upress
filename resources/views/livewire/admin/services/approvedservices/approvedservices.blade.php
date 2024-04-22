<div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card border rounded">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Approved Services</h3>
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
                                    <tr>
                                        <td>Jane Smith</td>
                                        <td>Binding</td>
                                        <td>Binding Service - Hardcover, A5, 50 copies</td>
                                        <td>Approved</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewApprovedServices">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Michael Johnson</td>
                                        <td>Printing</td>
                                        <td>Printing Service - Brochure, A4, 200 copies, Full Color</td>
                                        <td>Approved</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewApprovedServices">
                                                View
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
    <!-- View Details Modal for Pending Service -->
    <div class="modal fade" id="viewApprovedServices" tabindex="-1" aria-labelledby="viewApprovedServices" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="pendingServiceModal1Label">Approved Service </h5>
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