<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST, READ, PUT, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once 'Models/Database.php';
require_once 'Models/User.php';
require_once 'Models/Event.php';
/*A*/
require_once 'Models/Category.php';
require_once 'Models/Extra.php';

$database = new Database();
$db  = $database->connect();
$user =  new User($db);
$event  = new Event($db);
$category = new Category($db);
$extra = new Extra($db);

$url_components = explode("/", $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

$op = $_GET['op'];
$en = $_GET['en'];

switch($en){
case "user":
    switch ($op) {
        case "login":
            $data  = json_decode(file_get_contents("php://input"));
            $user->phone = $data->phone;
            $user->password = $data->password;
            $user->login();
            break;
            case "registerUser":
                $data  = json_decode(file_get_contents("php://input"));
                $user->name  = $data->name;
                $user->phone  = $data->contact;
                $user->email  = $data->email;
                $user->age  = $data->age;
                $user->dob  = $data->dob;
                $user->password  = $data->password;
                $user->register();
                break;
        case "getMyInterests":
            $data = json_decode(file_get_contents("php://input"));
            $user->id = $data->user_id;
            $user->getMyInterests($user->id);
            break;
            
        
        case "getSabaiUsers":
            $user->getSabaiUsers();
            break;

        case "getVerifiedUsers":
            $user->getVerifiedUsers();
            break;

        case "getUserById":
            $data  = json_decode(file_get_contents("php://input"));
            $user->id = $data->id;  
            $user->getUserById($user->id);
            break;
        
        case "updateUser":
            $data  = json_decode(file_get_contents("php://input"));
            $user->id = $data->id;
            $user->name = $data->name;
            $user->phone = $data->contact;
            $user->email = $data->email;
            $user->updateUser($user->id,$user->name,$user->contact,$user->email);
            break;
            
        default:
            break;
        }
    break;
case "event":
    switch ($op) {
        case "getForAll":
            $event->getAllEvents(5);
            break;
        case "getForFree":
            $event->getFreeEvents(5);
            break;
        case "getForPaid":
            $event->getPaidEvents(5);
            break;
        case "getForPopular":
            $event->getPopularEvents(5);
            break;
        case "getEventById":
            $data  = json_decode(file_get_contents("php://input"));
            $event->id = $data->id;
            $event->getEventById($event->id);
            break;
        case "getEventFromSearch":
            $data = json_decode(file_get_contents("php://input"));
            $event->keyword = $data->keyword;
            $event->getEventFromKeyword($event->keyword);
            break;
        case "getSabaiEvents":
            $event->getSabaiEvents();
            break;
        case "getEventByUser":
            $data  = json_decode(file_get_contents("php://input"));
            $event->id = $data->id;
            $event->getEventByUser($event->id);
            break;
        case "getForMainP2":
            $event->getForMainP2();
        case "getForMainP1":
            $event->getForMainP1();

        default:
            break;
    }

break;

/*A*/
case "extra":
        switch ($op) {
            case "getAllCategories":
                $category->getAllCategories();
                break;

            case "getAllCounts":
                $extra->getAllCounts();
                break;
            case "getCountByEventId":
                $data  = json_decode(file_get_contents("php://input"));
                $event->id = $data->id;
                $extra->getCountByEventId($event->id);
                break;
        }
    
break;
        
default:
break;
}



?>