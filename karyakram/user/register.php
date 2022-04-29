  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    <style>.disclaimer{display:none;}</style>
  <body>
      <button type="button" id="btn-1" class="btn btn-primary col-1" data-bs-toggle="modal" data-bs-target="#myModal">
            New
        </button>
      <div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Add<div class="topic"></div> </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-1" class="row g-3 needs-validation"  action="" method="POST" novalidate>
                        <div class="col-md-6">
                            <label  class="form-label text-dark" for="name">Full Name</label>
                            <input class="form-control"  type="text" id="name" name="name" required> 
                            
                        </div>
                        <div class="col-md-6">
                                <label class="form-label text-dark" for="age">Age</label>
                                <input class="form-control" type="number" id="age" name="age" required> 

                        </div>
                        <div class="col-md-6">
                           
                            <label class="form-label text-dark" for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" required> 
                        </div>
                        <div class="col-md-6">
                                            
                            <label class="form-label text-dark" for="dob">Date of Birth</label>
                            <input class="form-control" type="date" id="dob" name="dob" required>  
                        </div>
                        <div class="col-md-6">
                                            
                            <label class="form-label text-dark" for="contact">Contact</label>
                            <input class="form-control" type="number" id="contact" name="contact" required> 
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            
                            <label class="form-label text-dark" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required> 
                        </div>
                        <div class="col-md-6">
                            
                            <label class="form-label text-dark" for="cpassword">Confirm Password</label>
                            <input class="form-control" type="cpassword" id="cpassword" name="cpassword" required> 
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-evenly" style="width: 100vw;height: 100vh;">
        <div class="col-6 d-flex flex-wrap">
        <div class="col-5 m-1 p-1">
        </div>
        <div class="col-5 m-1 p-1">
        </div>
        <div class="col-5 m-1 p-1">
        </div>
        <div class="col-5 m-1 p-1">
        </div>
        <div class="col-5 m-1 p-1">
        </div>
        <div class="col-5 m-1 p-1">
        </div>
        <div class="col-5 m-1 p-1">
        </div>
        
        <!--<div class="col-10 m-2 p-2">-->
        <!--    <input class="form-control" type="file" id="file" name="file"> -->
        <!--</div>-->
        <div class="col-5"></div>
        <button class="btn btn-primary col-2" id="btn-s">Submit</button>
    </div>
    <script>
      $(document).ready(function() {
        $('#btn-s').on("click", function() {
          console.log($('#contact').val());
          let temp = {
            phone: $('#contact').val(),
            password: $('#pswd').val()
          };
          let obj = JSON.stringify(temp);
          var options = {
            url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=user&op=login",
            dataType: "text",
            type: "POST",
            data: obj,
            success: function(data, status, xhr) {
              var values = $.parseJSON(data);
              if(values.message.role == 1){
                window.location.href = "https://karyakram0.000webhostapp.com/dashboard/dashboard_Main.php?id="+values.message.id+"&name="+values.message.name;
              }else if(values.message.role == 0){
                window.location.href = "https://karyakram0.000webhostapp.com/user/userDashboard.php?id="+values.message.id+"&name="+values.message.name;  
              }else{
                  alert("invalid login");
              }
            },
            error: function(xhr, status, error) {
              document.write(error);
            }
          };
          $.ajax(options);
        });

        $('#register').on("click",function(){
            window.location.href = "https://karyakram0.000webhostapp.com/user/register.php";
        });
      });

    </script>
  </body>

  </html>