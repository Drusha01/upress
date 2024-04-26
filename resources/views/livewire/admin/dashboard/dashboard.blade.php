<div>
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button type="button" class="btn btn-outline-primary me-2 mb-2 mb-md-0" id="printButton" onclick="printReport()">
                    <i data-feather="printer"></i>
                    Print
                </button>
                <!-- <button type="button" class="btn btn-primary mb-2 mb-md-0" onclick="downloadReport()">
                    <i data-feather="download-cloud"></i>
                    Download Report
                </button> -->
                <div class="col">
                    <select name="" id="" class="form-select" wire:model.live="dashboard.current_year">
                        @foreach($dashboard['years'] as $key => $value)
                            <option value="{{ $value['year']}}">Year {{  $value['year']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">No. of Customers</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"><br>
                                    <h5 class="mb-2">{{$dashboard['no_of_customer']}}</h5>
                                    <div class="d-flex align-items-baseline">
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="customersChart" class="mt-md-3 mt-xl-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">No. of Complete Orders</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"><br>
                                    <h5 class="mb-2">{{$dashboard['no_of_complete_orders']}}</h5>
                                <div class="d-flex align-items-baseline">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Total Product Revenue</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5"><br>
                                <h5 class="mb-2">PHP {{number_format($dashboard['total_product_revenue'],2)}}</h5>
                                <div class="d-flex align-items-baseline">
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="growthChart" class="mt-md-3 mt-xl-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Services Revenue</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5"><br>
                                        <h5 class="mb-2">PHP {{number_format($dashboard['total_service_revenue'],2)}}</h5>
                                        <div class="d-flex align-items-baseline">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Amount Revenue(Php)</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5"><br>
                                        <h5 class="mb-2">PHP {{number_format($dashboard['total_service_revenue'] + $dashboard['total_product_revenue'],2)}}</h5>
                                        <div class="d-flex align-items-baseline">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="ordersChart" class="mt-md-3 mt-xl-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">No. of Products </h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5"><br>
                                        <h5 class="mb-2">{{$dashboard['no_of_products']}}</h5>
                                        <div class="d-flex align-items-baseline">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="ordersChart" class="mt-md-3 mt-xl-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Product Revenue</h6>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-md-5 d-flex justify-content-md-end mb-10">
                                <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                </div>
                            </div>
                        </div>
                        <canvas id="productRevenueChart" width="100%" height="30"></canvas>

                    </div>
            </div>
        </div>    
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                                <h6 class="card-title mb-0">Order Status</h6>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-md-5 d-flex justify-content-md-end mb-10">
                                    <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                    </div>
                                </div>
                            </div>
                            <canvas id="orderStatusChart" width="100%" height="18"></canvas>

                        </div>
                </div>
            </div>                
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Avail Service Status</h6>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-md-5 d-flex justify-content-md-end mb-10">
                                <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                </div>
                            </div>
                        </div>
                        <canvas id="availServiceStatusChart" width="100%" height="18"></canvas>

                    </div>
            </div>
        </div>    

        </div>
    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            // Sample static data for charts
            const productRevenueData = [1000, 1500, 800, 920];
            const orderStatusData = 80;
            const availServiceStatusData = 100;



            // Service Overview Chart
            var productRevenueCtx = document.getElementById('productRevenueChart').getContext('2d');
            var productRevenueChart = new Chart(productRevenueCtx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php 
                        foreach($dashboard['product_revenue'] as $key =>$value){
                            if ($key === array_key_last($dashboard['product_revenue'])) {
                            echo "'".$value->month."'";
                            }else{
                                echo "'".$value->month."',";
                            }
                        }
                        ?>
                    ],
                    datasets: [{
                        label: [
                            <?php 
                            foreach($dashboard['product_revenue'] as $key =>$value){
                                if ($key === array_key_last($dashboard['product_revenue'])) {
                                echo "'".$value->month."'";
                                }else{
                                    echo "'".$value->month."',";
                                }
                            }
                            ?>
                        ],
                        data: [
                            <?php 
                            foreach($dashboard['product_revenue'] as $key =>$value){
                                if ($key === array_key_last($dashboard['product_revenue'])) {
                                echo "".$value->total."";
                                }else{
                                    echo "".$value->total.",";
                                }
                            }
                            ?>
                        ],
                        backgroundColor: [
                            <?php 
                            foreach($dashboard['product_revenue'] as $key =>$value){
                                if ($key === array_key_last($dashboard['product_revenue'])) {
                                    echo "'rgba(".rand(100,255).",".rand(100,255).",".rand(100,255).",0.5)'";
                                }else{
                                    echo "'rgba(".rand(100,255).",".rand(100,255).",".rand(100,255).",0.5)',";
                                }
                            }
                            ?>
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            // Service Overview Chart
            var orderStatusDataCtx = document.getElementById('orderStatusChart').getContext('2d');
            var orderStatusDataChart = new Chart(orderStatusDataCtx, {
                type: 'doughnut',
                data: {
                    labels: [
                        
                        <?php 
                        foreach($dashboard['order_status'] as $key =>$value){
                            if ($key === array_key_last($dashboard['order_status'])) {
                            echo "'".$value->name."'";
                            }else{
                                echo "'".$value->name."',";
                            }
                        }
                        ?>
                        
                    ],
                    datasets: [{
                        label: 'Order Status',
                        data: [
                            <?php 
                            foreach($dashboard['order_status'] as $key =>$value){
                                if ($key === array_key_last($dashboard['order_status'])) {
                                echo "".$value->count."";
                                }else{
                                    echo "".$value->count.",";
                                }
                            }
                            ?>
                        ],
                        backgroundColor: [
                            <?php 
                            foreach($dashboard['order_status'] as $key =>$value){
                                if ($key === array_key_last($dashboard['order_status'])) {
                                    echo "'rgba(".rand(100,255).",".rand(100,255).",".rand(100,255).",0.5)'";
                                }else{
                                    echo "'rgba(".rand(100,255).",".rand(100,255).",".rand(100,255).",0.5)',";
                                }
                            }
                            ?>
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            // Service Overview Chart
            var availServiceStatusCtx = document.getElementById('availServiceStatusChart').getContext('2d');
            var availServiceStatusChart = new Chart(availServiceStatusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Service Status'],
                    datasets: [{
                        label: [
                            <?php 
                            foreach($dashboard['avail_service_status'] as $key =>$value){
                                if ($key === array_key_last($dashboard['avail_service_status'])) {
                                    echo "'".$value->name."'";
                                }else{
                                    echo "'".$value->name."',";
                                }
                            }
                            ?>
                        ],
                        data: [
                            <?php 
                            foreach($dashboard['avail_service_status'] as $key =>$value){
                                if ($key === array_key_last($dashboard['avail_service_status'])) {
                                    echo "".$value->count."";
                                }else{
                                    echo "".$value->count.",";
                                }
                            }
                            ?>
                        ],
                        backgroundColor: [
                            <?php 
                            foreach($dashboard['avail_service_status'] as $key =>$value){
                                if ($key === array_key_last($dashboard['avail_service_status'])) {
                                    echo "'rgba(".rand(100,255).",".rand(100,255).",".rand(100,255).",0.5)'";
                                }else{
                                    echo "'rgba(".rand(100,255).",".rand(100,255).",".rand(100,255).",0.5)',";
                                }
                            }
                            ?>
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        });

        flatpickr("#dashboardDate", {
        });

        var printButton = document.getElementById('printButton');

        printButton.addEventListener('click', function() {
            window.print();
        });

    </script>
</div>



