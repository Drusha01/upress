<div>

    <div class="page-content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="title">Stock List</div>

                        <!-- Filter dropdown -->
                        <div class="row mb-3 justify-content-end"> 
                            <div class="col-auto">
                                <label for="stockTypeFilter" class="form-label">Filter:</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select form-select-sm" id="stockTypeFilter">
                                    <option value="all">All</option>
                                    <option value="stock-in">Stock In</option>
                                    <option value="stock-out">Stock Out</option>
                                </select>
                            </div>
                        <!-- Add stock list modal -->
                            <div class="col-auto">
                                <button type="button" class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#addStockList">
                                    Add Product
                                </button>
                            </div>

                        </div>

                        <!-- Stock list table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Stock ID</th>
                                        <th>Product Name</th>
                                        <th>Size Name</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Color</th>
                                        <th>Product Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                    <tr class="stock-in">
                                        <td>1</td>
                                        <td>Product A</td>
                                        <td>Size M</td>
                                        <td>100</td>
                                        <td>2024-04-18</td>
                                        <td>Stock In</td>
                                        <td>Red</td>
                                        <td>200</td>
                                        <td>
                                            <!-- Button to trigger modal -->
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewStockModal">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="stock-out">
                                        <td>2</td>
                                        <td>Product B</td>
                                        <td>Size L</td>
                                        <td>50</td>
                                        <td>2024-04-17</td>
                                        <td>Stock Out</td>
                                        <td>Red</td>
                                        <td>200</td>
                                        <td>
                                            <!-- Button to trigger modal -->
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewStockModal">
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

    <!-- Add stock modal -->
    <div class="modal fade" id="addStockList" tabindex="-1" aria-labelledby="addStockListLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="addStockListLabel">Add New Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <form id="addStockForm">
                        <div class="mb-3">
                            <label for="productName" class="form-label text-black">Product Name:</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="sizeName" class="form-label text-black">Size Name:</label>
                            <input type="text" class="form-control" id="sizeName" name="sizeName" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label text-black">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label text-black">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label text-black">Color:</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label text-black">Product Price:</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Add Stock</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- View Stock Modal -->
    <div class="modal fade" id="viewStockModal" tabindex="-1" aria-labelledby="viewStockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="viewStockModalLabel">Stock Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border" style="color: black; background-color: white;">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Stock ID:</strong></div>
                        <div class="col-md-8">1</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Product Name:</strong></div>
                        <div class="col-md-8">Product A</div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-4"><strong>Size Name:</strong></div>
                        <div class="col-md-8">Size M</div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-4"><strong>Quantity:</strong></div>
                        <div class="col-md-8">100</div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-4"><strong>Date:</strong></div>
                        <div class="col-md-8">2024-04-18</div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-4"><strong>Color</strong></div>
                        <div class="col-md-8">Red</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Product Price</strong></div>
                        <div class="col-md-8">200</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
