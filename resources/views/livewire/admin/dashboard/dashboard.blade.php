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
                <button type="button" class="btn btn-outline-primary me-2 mb-2 mb-md-0" onclick="printReport()">
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
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sales Overview</h5>
                        <canvas id="salesOverviewChart" width="100%" height="30"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Product Overview</h5>
                        <canvas id="productOverviewChart" width="100%" height="30"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Service Overview</h5>
                        <canvas id="serviceOverviewChart" width="100%" height="30"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pending Orders</h5>
                        <canvas id="pendingOrdersChart" width="100%" height="30"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Product Sales</h5>
                        <canvas id="totalProductSalesChart" width="100%" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Service Sales</h5>
                        <canvas id="totalServiceSalesChart" width="100%" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sample static data for charts
                const salesData = [300, 450, 600, 800, 700, 900, 1000];
                const productOverviewData = [150, 200, 250, 300, 350, 400, 450];
                const serviceOverviewData = [100, 150, 200, 250, 300, 350, 400];
                const totalProductSalesData = 1200;
                const totalServiceSalesData = 800;
                const pendingOrdersData = 30;
                const userAccountsData = [500, 200]; // Active, Inactive

                // Sales Overview Chart
                var salesOverviewCtx = document.getElementById('salesOverviewChart').getContext('2d');
                var salesOverviewChart = new Chart(salesOverviewCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: 'Sales Overview',
                            data: salesData,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Product Overview Chart
                var productOverviewCtx = document.getElementById('productOverviewChart').getContext('2d');
                var productOverviewChart = new Chart(productOverviewCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: 'Product Overview',
                            data: productOverviewData,
                            backgroundColor: 'rgba(255, 99, 132, 0.5)'
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Service Overview Chart
                var serviceOverviewCtx = document.getElementById('serviceOverviewChart').getContext('2d');
                var serviceOverviewChart = new Chart(serviceOverviewCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: 'Service Overview',
                            data: serviceOverviewData,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)'
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Total Product Sales Chart
                var totalProductSalesCtx = document.getElementById('totalProductSalesChart').getContext('2d');
                var totalProductSalesChart = new Chart(totalProductSalesCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Total Product Sales'],
                        datasets: [{
                            label: 'Total Product Sales',
                            data: [totalProductSalesData],
                            backgroundColor: ['#36a2eb']
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });

                // Total Service Sales Chart
                var totalServiceSalesCtx = document.getElementById('totalServiceSalesChart').getContext('2d');
                var totalServiceSalesChart = new Chart(totalServiceSalesCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Total Service Sales'],
                        datasets: [{
                            label: 'Total Service Sales',
                            data: [totalServiceSalesData],
                            backgroundColor: ['#ff6384']
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });

                // Pending Orders Chart
                var pendingOrdersCtx = document.getElementById('pendingOrdersChart').getContext('2d');
                var pendingOrdersChart = new Chart(pendingOrdersCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Pending Orders'],
                        datasets: [{
                            label: 'Pending Orders',
                            data: [pendingOrdersData],
                            backgroundColor: 'rgba(255, 206, 86, 0.5)'
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // User Accounts Chart
            
            });
        </script>
</div>