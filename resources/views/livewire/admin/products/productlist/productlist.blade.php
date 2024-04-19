<div>
    <!-- Page Content -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card border rounded">
                   
                    <div class="card-body">
                        <h4 class="mb-2">UPRESS Product Information</h4>

                        <div class="d-flex justify-content-end mb-4">
                            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                Add Product
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center font-weight">Image</th>
                                        <th class="text-center font-weight">Product ID</th>
                                        <th class="text-center font-weight">Product Name</th>
                                        <th class="text-center font-weight">Description</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="public\assets\images\joe.png" class="img-fluid" alt="...">
                                        </td>
                                        <td class="text-dark text-center" >012345</td>
                                        <td class="text-dark text-center">ID lanyard</td>
                                        <td class="text-dark text-center">Id lace</td>
                                        <td class="text-dark text-center">Php 100.00</td>
                                        <td class="text-dark text-center">Available</td>
                                        <td class="text-center">
                                            <!-- Button to trigger Edit Product Modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </button>

                                            <form action="#" method="post" style="display: inline;">
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Confirm delete?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="7" class="text-center">No products found</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Product Pagination" class="mt-4 ">
                            <ul class="pagination justify-content-center">
                                <li class="page-item ">
                                    <a class="page-link bg-white text-black" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            
                                    <li class="page-item">
                                        <a class="page-link bg-white text-black">page</a>
                                    </li>
                            
                                <li class="page-item">
                                    <a class="page-link bg-white text-black" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: white; color: black;">
                <form action="#" method="post">

                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="addProductModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="product_name" class="form-label text-black">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label text-black">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="number" class="form-label text-black">Price</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" required>
                        </div>
                        <div class="mb-2">
                            <label for="number" class="form-label text-black">Price</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form> 
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="edit_product_name" name="edit_product_name" value="#" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="edit_description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_unit_price" class="form-label">Unit Price</label>
                            <input type="number" step="0.01" class="form-control" id="edit_unit_price" name="edit_unit_price" value="#" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
