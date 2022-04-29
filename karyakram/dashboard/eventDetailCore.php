
<div class="col-9 my-3 d-flex flex-column main-body">
    <h2>Event Detail</h2>
    <div class="col-12">
        <div class="col-12 text-center">
            <h2 id="event_name"></h2>
        </div>
        <div id="image_holder" class="col-12 ">
            <img class="rounded mx-auto d-block" id="image" >
        </div>
        <div class="row fs-5 m-2 p-1">
            <div class="col-7" id="category">Category : </div>
            <div class="col-3" id="interested">Interested : </div>
        </div>
        <div class="row fs-5 m-2 p-1">
            <div class="col-7" id="location">Location : </div>
            <div class="col-3" id="price">Price : </div>
        </div>
        <div class="row fs-5 m-2 p-1">
            <div class="col-7" id="start_date">Start : </div>
            <div class="col-3" id="end_date">End : </div>
        </div>
        <div class="row fs-5 m-2 p-1">
            <div class="col-7" id="deadline">Deadline : </div>
        </div>
        <hr style="height:4px; width:100%; border-width:0; color:black; background-color:black">
        <div class="row fs-5 m-2 p-1 col-12">
            <h3>Description : </h3>
        </div>
        <div class="row fs-5 m-2 p-1">
            <div id="description" class="p-2 m-1"></div>
        </div>
        <hr style="height:4px; width:100%; border-width:0; color:black; background-color:black">
        <div class="row fs-5 m-2 p-1 col-12">
            <div class="col-12" id="organizers"> Organizers : </div>
        </div>
        <div class="row fs-5 m-2 p-1 col-12">
            <div class="col-12" id="posted_by"> Posted By : </div>
        </div>
        <hr style="height:4px; width:100%; border-width:0; color:black; background-color:black">
    </div>

    <div class="row p-2 d-flex justify-content-evenly">
        <div class="col-lx-5 col-md-5 m-2 pb-2">
        <div class="mb-4 dashboard-card goto-books">
            <div class="card my-4 border-start border-bottom-0 border-top-0 border-end-0 border-5 border-primary  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Interested</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_interested"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-4 border-start border-bottom-0 border-top-0 border-end-0 border-5 border-primary  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Attended</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_attended"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" onclick="alert('This will generate a attendence sheet which is downloadable also!;')">Attendence</button>
            </div>
        </div>
        </div>
        <div class="card shadow col-lx-5 col-md-5 m-2 pb-2">
            <canvas id="eventChart" style="background-color:#ffffff;"></canvas>
        </div>
    </div>
    <div class="row p-2 d-flex justify-content-evenly">

        <div class="card shadow col-lx-12 col-md-12 m-2 pb-2" style="height:400px;">
            <canvas id="userAgeChart" style="background-color:#ffffff;height:80%;"></canvas>
        </div>
    </div>
</div>
<div></div>


<script>
    $(document).ready(function() {
        $('#event').addClass("active");
        var urlParams = new URLSearchParams(window.location.search);
        let temp = {
            id: urlParams.get('id')
        };
        let obj = JSON.stringify(temp);
        var options = {
            url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=event&op=getEventById",
            dataType: "text",
            type: "POST",
            data: obj,
            success: function(data, status, xhr) {
                var values = $.parseJSON(data);
                fillDetailPage(values.message);
                $.ajax({
                        url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=extra&op=getCountByEventId",
                        dataType: "text",
                        type: "POST",
                        data: obj,
                        success: function(data, status, xhr) {
                            var values2 = $.parseJSON(data);
                            generateCharts(values2.message);
                            
                        },
                        error: function(xhr, status, error) {

                        }
                    }

                );
            },
            error: function(xhr, status, error) {

            }
        };
        $.ajax(options);

    });

    function fillDetailPage(datas) {
        $('#event_name').html(datas.name);
        $('#location').append(datas.location);
        $('#price').append(datas.price);
        $('#category').append(datas.category);
        $('#interested').append(datas.interested);
        $('#start_date').append(datas.start_date);
        $('#end_date').append(datas.end_date);
        $('#deadline').append(datas.deadline);
        $('#description').append(datas.detail);
        $('#posted_by').append(datas.username);
        $('#organizers').append(datas.username);
        $('#image').attr('src',"https://karyakram0.000webhostapp.com/images/"+datas.image);

    }

    function generateCharts(datas) {
        generateUserAgeChart(datas.usersByAge);
        generateEventChart(datas.attendence[0].totalInterested, datas.attendence[1].present);
        $('#total_interested').html(datas.attendence[0].totalInterested);
        $('#total_attended').html(datas.attendence[1].present);
           
    }

    function generateEventChart(total, present) {
        let absent = parseInt(total) - parseInt(present);
        let data = {
            labels: [
                'Present',
                'Absent',
            ],
            datasets: [{
                label: 'Users',
                backgroundColor: [
                    'rgb(69, 229, 33)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4,
                data: [present, absent],
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
                            text: 'Attendees',
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
                        text: 'Age Groups',
                    }
                }
            }
        }
    );
}
</script>