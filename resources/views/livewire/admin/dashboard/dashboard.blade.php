<div>
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text bg-transparent border-primary"><i data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
                </div>
                <button type="button" class="btn btn-outline-primary me-2 mb-2 mb-md-0" id="printButton" onclick="printReport()">
                    <i data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary mb-2 mb-md-0" onclick="downloadReport()">
                    <i data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">No. of Customers</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"><br>
                                    <h5 class="mb-2">{{number_format(2.23,2)}}</h5>
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
                                <h6 class="card-title mb-0">No. of Orders</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"><br>
                                    <h5 class="mb-2">{{number_format(2.23,2)}}</h5>
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
                            <h6 class="card-title mb-0">Total Product Purchase</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5"><br>
                                <h5 class="mb-2">{{number_format(  2.23,2)}}</h5>
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
                                    <h6 class="card-title mb-0">Total Services Purchase</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5"><br>
                                        <h5 class="mb-2">{{number_format(2.23,2)}}</h5>
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
                                        <h6 class="card-title mb-0">Total Amount Purchase(Php)</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5"><br>
                                            <h5 class="mb-2">{{number_format( 2.23,2)}}</h5>
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
                                    <h6 class="card-title mb-0">Average Profits</h6>
 
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5"><br>
                                        <h5 class="mb-2">{{number_format(2.23,2)}}</h5>
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
                </div>
            </div>
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Product Revenue</h6>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-md-7" style="margin-bottom: 40px;">
                                <p class="text-muted tx-13 mb-md-0 fw-bold ">Track the weekly sales of WMSU UPRESS Monthly Product Revenue.</p>
                            </div>
                            <div class="col-md-5 d-flex justify-content-md-end mb-10">
                                <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                </div>
                            </div>
                        </div>
                        <canvas id="productRevenueChart" width="100%" height="30"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
    // Sample static data for charts
    const productRevenueData = [1000, 1500, 800, 920];


    // Service Overview Chart
    var productRevenueCtx = document.getElementById('productRevenueChart').getContext('2d');
    var productRevenueChart = new Chart(productRevenueCtx, {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Month Of April',
                data: productRevenueData,
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
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

