<?php
    session_start();

    if($_GET){
        if(!isset($_SESSION['admin_id'])){
            $_SESSION['admin_id']= $_GET['id'];
            $_SESSION['admin_name']=$_GET['name'];    
        }
    }
    
    if(!isset($_SESSION['admin_id'])){
        header("location:https://karyakram0.000webhostapp.com/index.php");
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
              referrerpolicy="no-referrer" />
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="https://karyakram0.000webhostapp.com/css/style.css">

        <script src="https://karyakram0.000webhostapp.com/script/bootstrapValidation.js"></script>

        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/d991a5e65c.js" crossorigin="anonymous"></script>
    </head>

    <body 
        style="background-color: #b1bfd8;
        background-image: linear-gradient(315deg, #b1bfd8 0%, #6782b4 74%);

        ">
        <div class="d-flex justify-content-between fixed-bottom" style="height: 100vh;">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height:100vh;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="https://karyakram0.000webhostapp.com/images/logo.png" class="mx-4" style="width:60px;height:50px;">
                    <span class="fs-4"><?=$_SESSION['admin_name']?></span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="https://karyakram0.000webhostapp.com/dashboard/dashboard_Main.php" id="home" class="nav-link text-white">
                            <i class="fas fa-home m-2"></i> Home
                        </a>
                    </li>
                    
                    <li>
                        <div class="dropdown">
                            <a href="#" class="nav-link text-white dropdown-toggle " id="event" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-calendar-alt m-2"></i> Events
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="patron">
                                <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/events.php?type=all">All</a></li>
                                <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/events.php?type=paid">Paid</a></li>
                                 <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/events.php?type=free">Free</a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <a href="#" class="nav-link text-white dropdown-toggle " id="user" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user m-2"></i> Users
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="patron">
                                <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/users.php?type=all">All</a></li>
                                <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/users.php?type=verified">Verified</a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <a href="#" class="nav-link text-white dropdown-toggle " id="add" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-plus m-2"></i> Add
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown4">
                                <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/category.php">Category</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<%=application.getContextPath()%>/Resources/Pages/Admin_List.jsp" id="admin" class="nav-link text-white ">
                            <i class="fas fa-th-list m-2"></i> Admin
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="https://karyakram0.000webhostapp.com/dashboard/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
