<?php 
    session_start();?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>JSP Page</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body style="background-color: #0cbaba;
background-image: linear-gradient(315deg, #0cbaba 0%, #380036 74%);
">
      
      
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
                            <label  class="form-label text-dark" for="rname">Full Name</label>
                            <input class="form-control"  type="text" id="rname" name="rname" required> 
                            
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
                                            
                            <label class="form-label text-dark" for="rcontact">Contact</label>
                            <input class="form-control" type="number" id="rcontact" name="rcontact" required> 
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            
                            <label class="form-label text-dark" for="rpassword">Password</label>
                            <input class="form-control" type="password" id="rpassword" name="rpassword" required> 
                        </div>
                        <div class="col-md-6">
                            
                            <label class="form-label text-dark" for="cpassword">Confirm Password</label>
                            <input class="form-control" type="password" id="cpassword" name="cpassword" required> 
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" id='btn-s2' type="submit">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>.disclaimer{display:none;}</style>
    <div class="row d-flex justify-content-evenly" style="width: 100vw;height: 100vh;">
      <div class="my-auto col-md-8 col-sm-12">
        <img class="mx-auto col-8 d-block" src="./images/logo.png">
      </div>
      <div class="my-auto col-md-3 col-sm-8 p-3" style="background-color: white;">

           <div class="text-center">
            <h1>LOGIN</h1>
          </div>
          <div class="col-md-12 my-1">
            <label for="contact" class="form-label text-dark">User Id</label>
            <input type="text " class="form-control " name="contact" id="contact" required>
            <div class="valid-feedback ">
              Looks good!
            </div>
          </div>
          <div class="col-md-12 my-1">
            <label for="pswd" class="form-label text-dark">Password</label>
            <input type="password" class="form-control " name="pswd" id="pswd" required>
            <div class="valid-feedback " style="background-color: red;">
              Looks good!
            </div>
          </div>
          <div class="d-flex justify-content-center pt-2">
            <button class="btn btn-primary " id="btn-s" >Login</button>
            <button type="button" id="btn-1" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#myModal">
            Register
        </button>
          </div>
      </div>
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

        $('#btn-s2').on('click',function(){
           
          if($('#rpassword').val() !== $('#cpassword').val()){
              alert('Passwords do not match');
          } 
           
           
          let temp2 = {
              
                name: $('#rname').val(),
                age: $('#age').val(),
                email: $('#email').val(),
                dob: $('#dob').val(),
                contact: $('#rcontact').val(),
                password: $('#rpassword').val()
          };
          let obj2 = JSON.stringify(temp2);
          var options = {
            url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=user&op=registerUser",
            dataType: "text",
            type: "POST",
            data: obj2,
            success: function(data, status, xhr) {
              var values = $.parseJSON(data);
              if(values.message == "Registered"){
                  alert("success");
                window.location.href = "https://karyakram0.000webhostapp.com/dashboard/login.php";
              }else if(values.message == "Registration Failed"){
                    alert("something went wrong!");
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
      });

    </script>
  </body>

  </html>