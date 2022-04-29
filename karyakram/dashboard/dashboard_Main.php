<?php include "dashboard_Nav.php"; ?>

<div class="col-lg-8 col-md-6 mt-5 d-flex flex-column container-fluid main-body">
    <div class="col-12"></div>
    <div class="row">
        <div class="col-xl-4 col-md-12 mb-4 dashboard-card goto-books">
            <div class="card border-start border-bottom-0 border-top-0 border-end-0 border-5 border-primary  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Events</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_events"></div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 dashboard-card">
            <div class="card border-start border-bottom-0 border-top-0 border-end-0 border-5 border-primary shadow h-100 py-2 goto-books">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="all_users"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-4 dashboard-card" id="goto-patrons">
            <div class="card border-start border-bottom-0 border-top-0 border-end-0 border-5 border-primary  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Today</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_today">10</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-calendar-alt  fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2 d-flex justify-content-evenly">
        <div class="card shadow col-lx-5 col-md-5 m-2 pb-2">
            <canvas id="userAgeChart" style="background-color:#ffffff;height:80%;"></canvas>
        </div>
        <div class="card shadow col-lx-5 col-md-5 m-2 pb-2">
            <canvas id="eventChart" style="background-color:#ffffff;"></canvas>
        </div>
    </div>
    <div class="row p-2 d-flex justify-content-evenly">

        <div class="card shadow col-lx-12 col-md-12 m-2 pb-2">
            <canvas id="popularChart" style="background-color:#ffffff;"></canvas>
        </div>
    </div>
    <div></div>
    <script>
        $(document).ready(function() {
            $('#home').addClass("active");
            $.ajax({
                type: "GET",
                url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=extra&op=getAllCounts",
                data: "message",
                success: function(response) {
                    var obj = $.parseJSON(response);
                    var datas = obj.message;
                    console.log(datas.popularEvents);
                    fillCards(datas.counts);
                    generateEventChart(datas.counts[1].freeEvents, datas.counts[2].paidEvents);
                    generateUserAgeChart(datas.usersByAge);
                    generatePopularChart(datas.popularEvents);
                },
                dataType: "html"
            });
        });

        function fillCards(data) {
            $('#total_events').html(parseInt(data[1].freeEvents) + parseInt(data[2].paidEvents));
        }

        function generateBookChart(values) {

            let data = {
                labels: [
                    'Organization',
                    'Individuals'
                ],
                datasets: [{
                    label: 'Users',
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                    ],
                    hoverOffset: 4,
                    data: values,
                }]
            };
            const myChart = new Chart(
                document.getElementById('bookChart'), {
                    type: 'doughnut',
                    data: data,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Books'
                            }
                        }
                    }
                }
            );
        }

        function generateEventChart(free, paid) {

            let data = {
                labels: [
                    'Free',
                    'Paid',
                ],
                datasets: [{
                    label: 'Events',
                    backgroundColor: [
                        'rgb(69, 229, 33)',
                        'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 4,
                    data: [free, paid],
                }]
            };
            const myChart = new Chart(
                document.getElementById('eventChart'), {
                    type: 'pie',
                    data: data,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Events',
                            }
                        }
                    }
                }
            );
        }

        function generatePopularChart(datas) {
            let values = [];let labels = [];
            for (let i = 0; i < datas.length; i++) {
                labels[i] = datas[i].name;
                values[i] = datas[i].interested;
            }
            let data = {
                labels: labels,
                datasets: [{
                    label: 'Interested',
                    data: values,
                    backgroundColor: 'rgb(90, 192, 192)',
                }],

                borderWidth: 1
            };
            let myChart = new Chart(
                document.getElementById('popularChart'), {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                precision: 0,
                                beginAtZero: true
                            },
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Interested Users',
                            }
                        }
                    }
                }
            );
        }

        function generateUserAgeChart(datas) {
            let values = [];
            let totalUsers = 0;
            labels = ["16-24", "24-32", "32-40", "40-48", "48-56", "56-64"];
            for (let i = 0; i < labels.length; i++) {
                values[i] = datas[labels[i]];
                totalUsers += parseInt(datas[labels[i]]);
                $('#all_users').html(totalUsers);
            }
            let data = {
                labels: labels,
                datasets: [{
                    label: 'Users',
                    data: values,
                    backgroundColor: 'rgb(75, 192, 192)',
                }],

                borderWidth: 1
            };
            let myChart = new Chart(
                document.getElementById('userAgeChart'), {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                precision: 0,
                                beginAtZero: true
                            },
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Activity',
                            }
                        }
                    }
                }
            );
        }
    </script>
    </body>

    </html>