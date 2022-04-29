<?php
    session_start();
    require_once "../backend/conn.php";

$sql = "select * from category";
$result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $k = 0;
            while($row = mysqli_fetch_assoc($result)) {
            $cata[$k] = array(
                "id" => $row["id"],
                "name" => $row["name"]
                );
            $k++;
            }   
        }
        print_r($cata);

// if($_POST){
       $filename = $_FILES['file']['name'];
            // Upload file
            // echo $filename."<br>";
            
            $name = $_POST['name'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $deadline = $_POST['deadline'];
            $location = $_POST['location'];
            $price = $_POST['price'];
            $organizer = $_POST['organizer'];
            $detail = $_POST['details'];
            $category = $_POST['category'];
            $user_id = $_POST['user_id'];
            $tags = "";
            foreach($cata as $cat => $i){
                if(isset($_POST[$i["name"]])){
                    $tags = $tags.$i["name"].",";
                }
            }
            $tags = substr($tags, 0, -1);
            $sql = "INSERT INTO event (name,start_date,end_date,deadline,location,price,organizer,detail,image,category,tags,user_id) values ('$name','$start','$end','$deadline','$location','$price','$organizer','$detail', '$filename','$category','$tags','$user_id')";
            echo $sql;
            if(mysqli_query($conn,$sql)){
                echo "<script> window.location.href='https://karyakram0.000webhostapp.com/user/addEvent.php';</script>";
            }
            move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$filename);
        

  
// }

?>