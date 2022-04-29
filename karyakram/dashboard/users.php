<?php include "dashboard_Nav.php";?>
<div class="col-7 my-3 d-flex flex-column main-body">

    <h2 >Events</h2>
    <table id="data-table" class="display" style="width:100%" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Status</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>DOB</th>
                <th>Age</th>
                <th>Blacklist</th>
            </tr>
        </thead>
    </table>
</div>
<div></div>


<script>


    $(document).ready(function () {
        $('#user').addClass("active");
        var urlParams = new URLSearchParams(window.location.search);
        var type = urlParams.get('type');
        let url = "https://karyakram0.000webhostapp.com/backend/API/api.php?";
        switch(type){
            case "verified":
                url += "en=user&op=getVerifiedUsers";
                break;

            case "all":
                url += "en=user&op=getSabaiUsers";
                break;
                
        }

        var table = $('#data-table').DataTable({
    
            ajax: {
                url: url,
                dataSrc: 'message'
            },
            columns: [
                {data: 'id'},
                {data: 'status'},
                {data: 'name'},
                {data: 'email'},
                {data: 'contact'},
                {data: 'dob'},
                {data: 'age'},
                {data: 'blacklist',render: function (data, type, row) {
                        return renderCheck(data);
                    }, title: 'Blacklist', className: "dt-body-center"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },{
                    "targets": [1],
                    "visible": false,
                    "searchable": true
                    
                }
            ]
        });

        $('#data-table tbody').on('click', 'tr', function () {
            let data = table.row(this).data();
            window.open("https://karyakram0.000webhostapp.com/user/userDetail.php?id="+data['id']);    
        });

        
    }
    );

    function renderCheck(data) {
    if (data === "0") {
        return "<i class='fas fa-check-circle' id='black'></i>";
    } else {
        return "<i class='fa-solid fa-circle-xmark' id='red'></i>";
    }
}
</script>
<style>

    #red{
        color: red;
    }

    #green{
        color: green;
    }
    
    #black{
        color:black;
    }
</style>
</body>
</html>