<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
              referrerpolicy="no-referrer" />
        
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/d991a5e65c.js" crossorigin="anonymous"></script>
   
<div class="col-lg-8 col-md-6 mt-5 d-flex flex-column container-fluid main-body">

<div class="row col-12 m-2 p-2 align-items-center" style="background-color: #ffbb33;">
    <img src="../images/alt-image.png" style="width: 300px;height:300px;" class="mx-auto d-block rounded-circle">
    <div class="col-12 d-flex flex-row py-3">
        <div class="col-6 text-end" id="nameP">
        </div>
        <div>, </div>
        <div class="col-6" id="positionP">
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center col-7 mx-auto">
    <form id="form-1" class="row g-3 needs-validation modal-body" action="" method="POST" novalidate>
        <div class="col-md-6">
            <label for="name" class="form-label">Full Name</label>

            <input type="hidden" class="form-control" id="id" value="0" name="id">
            <input type="text" class="form-control" id="name" value="" name="name" disabled>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Cannot be Empty!
            </div>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="contact" value="" name="phone" disabled>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="" name="email" disabled>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" value="" name="position" disabled>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
    </form>
</div>
</div>

<script>
$(document).ready(function() {
    $('#profile').addClass("active");
    var urlParams = new URLSearchParams(window.location.search);
    let obj = {
        id:  urlParams.get('id')
    };
    var options = {
        url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=user&op=getUserById",
        dataType: "text",
        type: "POST",
        data: JSON.stringify(obj),
        success: function(data, status, xhr) {
            var obj = $.parseJSON(data);
            console.log(obj.message);
            fillUserDetailPage(obj.message);
        },
        error: function(xhr, status, error) {
            
        }
    };
    $.ajax(options);
    function fillUserDetailPage(datas){
        let position = "Non-Verified";
        if(datas.status == 1){
            position = "Verified";
        }
        $('#name').val(datas.name);
        $('#contact').val(datas.contact);
        $('#email').val(datas.email);
        $('#position').val(position);
        $('#positionP').html(position);
        $('#nameP').html(datas.name);
        
    }
});
</script>