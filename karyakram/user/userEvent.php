<?php include "userDashboardNav.php";?>
<div class="col-7 my-3 d-flex flex-column main-body">

    <h2 >Events</h2>
    <table id="data-table" class="display" style="width:100%" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Location</th>
                <th>Name</th>
                <th>Interested</th>
                <th>Price</th>
            </tr>
        </thead>
    </table>
    <div id="data-holders"></div>
</div>
<div></div>


<script>


    $(document).ready(function () {
        $('#event').addClass("active");
        let url = "https://karyakram0.000webhostapp.com/backend/API/api.php?en=event&op=getEventByUser";
        let obj = {
            id:  <?=$_SESSION['user_id']?>
        };
        let temp = JSON.stringify(obj);
        var datas;
        var options = {
            url: url,
            dataType: "text",
            type: "POST",
            data: temp,
            success: function(data, status, xhr) {
                datas = $.parseJSON(data);
                createDivs(datas.message);
            },
            error: function(xhr, status, error) {
                
            }
        };
        $.ajax(options);
          
    }
    );

        function createDivs(datas){
            $("<div class=' m-1 fw-bold d-flex flex-row row-header text-center p-2' id='row-header'><div class='col-1'>Id</div><div class='col-4'>Location</div><div class='col-2'>Name</div><div class='col-2'>Interested</div><div class='col-2'>Price</div>").appendTo("#data-holders");
            for(let i =0;i<datas.length;i++){
                    $("<div class=' m-2 d-flex flex-row row-holder text-center p-2' id='"+datas[i].id+"'><div class='col-1 poi text-white bg-primary' onclick='relocator("+datas[i].id+")'>"+i+"</div><div class='col-4'>"+ datas[i].location+"</div><div class='col-2'>"+datas[i].name+"</div><div class='col-2'>"+datas[i].interested+"</div><div class='col-2'>"+datas[i].price+"</div>").appendTo("#data-holders");
            }
        } 
        
        function relocator(d){
                window.open("https://karyakram0.000webhostapp.com/dashboard/eventDetail.php?type=u&id="+d);    
        }

</script>
<style>
    .row-holder,.row-header{
        border:2px solid black;
        background-color: white;
    }
    
    .poi:hover{
        cursor:pointer;
    }
</style>
</body>
</html>