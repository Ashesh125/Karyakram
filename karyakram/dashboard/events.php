<?php include "dashboard_Nav.php";?>
<div class="col-7 my-3 d-flex flex-column main-body">

    <h2 >Events</h2>
    <table id="data-table" class="display" style="width:100%" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Location</th>
                <th>Name</th>
                <th>Location</th>
                <th>Interested</th>
                <th>Price</th>
            </tr>
        </thead>
    </table>
</div>
<div></div>


<script>


    $(document).ready(function () {
        $('#event').addClass("active");
        var urlParams = new URLSearchParams(window.location.search);
        var type = urlParams.get('type');
        let url = "https://karyakram0.000webhostapp.com/backend/API/api.php?";
        switch(type){
            case "free":
                url += "en=event&op=getForFree";
                break;
                
            case "paid":
                url += "en=event&op=getForPaid";
                break;

            case "all":
                url += "en=event&op=getSabaiEvents";
                break;
                
        }

        var table = $('#data-table').DataTable({
    
            ajax: {
                url: url,
                dataSrc: 'message'
            },
            columns: [
                {data: 'id'},
                {data: 'location'},
                {data: 'name'},
                {data: 'location'},
                {data: 'interested'},
                {data: 'price'}
                
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },{
                    "targets": [1,5],
                    "visible": false,
                    "searchable": true
                    
                }
            ]
        });
        $('#data-table tbody').on('click', 'tr', function () {
            let data = table.row(this).data();
            window.open("https://karyakram0.000webhostapp.com/dashboard/eventDetail.php?type=a&id="+data['id']);    
        });
    }
    );


</script>
</body>
</html>