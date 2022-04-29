<?php
class Event{
    private $conn;
    private $table = 'event';
    public $id;
    public $name;
    public $start_date;
    public $end_date;
    public $deadline;
    public $location;
    public $price;
    public $details;
    public $image;
    public $category;
    public $tags;
    public $uid;
    public $interested;
    public $keyword;

    public function __construct($db){
        $this->conn = $db;
    }


    public function getAllEvents($num){
        $queries = array();
        $queries[0]= "SELECT id, name, location, interested FROM event WHERE (category = 1) ORDER BY RAND() LIMIT 5";
        $queries[1]= "SELECT id, name, location, interested FROM event WHERE (category = 3) ORDER BY RAND() LIMIT 5";
        $queries[2]= "SELECT id, name, location, interested FROM event WHERE (category = 7) ORDER BY RAND() LIMIT 5";
        $result_array = array(array());
        $i=0;
        foreach ($queries as $query) {
              $j = 0;
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $event_item = array(
                        'id' => $id,
                        'name' => $name,
                        'location' => $location,
                        'interested' => $interested
                    );
                    $result_array[$i][$j]=$event_item;
                    $j++;
                }
            }
            $i++;
        }
        $response = array(
            "code" => 200,
            "message" => $result_array,
        );
        echo json_encode($response);
    }
    public function getFreeEvents($num){
         $query= "SELECT id, name, location, interested FROM event WHERE (price = 0) ORDER BY RAND() LIMIT 10";
        $result_array= array();
        $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $event_item = array(
                        'id' => $id,
                        'name' => $name,
                        'location' => $location,
                        'interested' => $interested
                    );
                    array_push($result_array,$event_item);
                }
            }
            $response = array(
                "code" => 200,
                "message" => $result_array,
            );
            echo json_encode($response); 

    }
    public function getPaidEvents($num){
        $query= "SELECT id, name, location, interested, price FROM event WHERE (price > 0) ORDER BY RAND() LIMIT 10";
        $result_array= array();
        $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $event_item = array(
                        'id' => $id,
                        'name' => $name,
                        'location' => $location,
                        'interested' => $interested,
                         'price' => $price
                    );
                    array_push($result_array,$event_item);
                }
            }
            $response = array(
                "code" => 200,
                "message" => $result_array,
            );
            echo json_encode($response);
    }
    public function getPopularEvents($num){
        $queries[0]= "SELECT id, name, location, interested FROM event WHERE (category = 1) ORDER BY interested DESC LIMIT 5";
        $queries[1]= "SELECT id, name, location, interested FROM event WHERE (category = 3) ORDER BY interested DESC LIMIT 5";
        $queries[2]= "SELECT id, name, location, interested  FROM event WHERE (category = 7) ORDER BY interested DESC LIMIT 5";
        $result_array = array(array());
        $i=0;
        foreach ($queries as $query) {
              $j = 0;
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $event_item = array(
                        'id' => $id,
                        'name' => $name,
                        'location' => $location,
                        'interested' => $interested
                    );
                    $result_array[$i][$j]=$event_item;
                    $j++;
                }
            }
            $i++;
        }
        $response = array(
            "code" => 200,
            "message" => $result_array,
        );
        echo json_encode($response);


    }
    public function getEventById($id){
        $query = "SELECT 
        e.id, 
        e.name, 
        e.start_date, 
        e.end_date, 
        e.deadline, 
        e.location, 
        e.price, 
        e.detail, 
        e.image, 
        e.tags, 
        e.interested,
        e.organizer,
        c.name as category, 
        u.name as username 
        FROM event e 
        JOIN category c on e.category = c.id 
        JOIN user u on e.user_Id = u.id  
        WHERE e.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $event_array = array(
                'id'=>$result['id'], 
                'name'=>$result['name'], 
                'start_date'=>$result['start_date'], 
                'end_date'=>$result['end_date'], 
                'deadline'=>$result['deadline'], 
                'location'=>$result['location'], 
                'price'=>$result['price'], 
                'detail'=>$result['detail'], 
                'image'=>$result['image'], 
                'tags'=>$result['tags'], 
                'interested'=>$result['interested'], 
                'category'=>$result['category'], 
                'organizer'=>$result['organizer'], 
                'username'=>$result['username'] 
            );
            $response = array(
                "code" => 200,
                "message" => $event_array,
            );
        }
        echo json_encode($response);
    }
    public function getEventFromKeyword($tag){
        $query = "SELECT 
        e.id, 
        e.name, 
        e.start_date, 
        e.end_date, 
        e.deadline, 
        e.location, 
        e.price, 
        e.detail, 
        e.image, 
        e.tags, 
        e.interested, 
        c.name as category, 
        u.name as username 
        FROM event e 
        JOIN category c on e.category = c.id 
        JOIN user u on e.user_Id = u.id  
        WHERE (c.name LIKE :tag OR e.tags LIKE :tag)
        LIMIT 8";
        $stmt = $this->conn->prepare($query);
        $tag = "%" . $tag . "%";
        $stmt->bindParam(":tag", $tag);
        if ($stmt->execute()) {
            $event_array = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $event_item = array(
                    'id'=>$id, 
                    'name'=>$name, 
                    'start_date'=>$start_date, 
                    'end_date'=>$end_date, 
                    'deadline'=>$deadline, 
                    'location'=>$location, 
                    'price'=>$price, 
                    'detail'=>$detail, 
                    'image'=>$image, 
                    'tags'=>$tags, 
                    'interested'=>$interested, 
                    'category'=>$category, 
                    'username'=>$username 
                );
                array_push($event_array, $event_item);
            }
            $response = array(
                "code" => 200,
                "message" => $event_array,
            );
        }
         echo json_encode($response);
    }
    
    public function createEvent(){

    }
    
    /*A*/ 
    public function getSabaiEvents(){
        $query = "SELECT 
        e.id, 
        e.name, 
        e.start_date, 
        e.end_date, 
        e.deadline, 
        e.location, 
        e.price, 
        e.detail, 
        e.image, 
        e.tags, 
        e.interested, 
        c.name as category, 
        u.name as username 
        FROM event e 
        JOIN category c on e.category = c.id 
        JOIN user u on e.user_Id = u.id";
        $stmt = $this->conn->prepare($query);
        $result_array = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $event_item = array(
                    'id'=>$id, 
                    'name'=>$name, 
                    'start_date'=>$start_date, 
                    'end_date'=>$end_date, 
                    'deadline'=>$deadline, 
                    'location'=>$location, 
                    'price'=>$price, 
                    'detail'=>$detail, 
                    'image'=>$image, 
                    'tags'=>$tags, 
                    'interested'=>$interested, 
                    'category'=>$category, 
                    'username'=>$username
                );
                array_push($result_array,$event_item);
            }
            $response = array(
                "code" => 200,
                "message" => $result_array,
            );
        }
        echo json_encode($response);
    }
    
    public function getEventByUser($id){
        $query = "SELECT 
        e.id, 
        e.name, 
        e.start_date, 
        e.end_date, 
        e.deadline, 
        e.location, 
        e.price, 
        e.detail, 
        e.image, 
        e.tags, 
        e.interested, 
        c.name as category, 
        u.name as username 
        FROM event e 
        JOIN category c on e.category = c.id 
        JOIN user u on e.user_Id = u.id 
        WHERE e.user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $result_array = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $event_item = array(
                    'id'=>$id, 
                    'name'=>$name, 
                    'start_date'=>$start_date, 
                    'end_date'=>$end_date, 
                    'deadline'=>$deadline, 
                    'location'=>$location, 
                    'price'=>$price, 
                    'detail'=>$detail, 
                    'image'=>$image, 
                    'tags'=>$tags, 
                    'interested'=>$interested, 
                    'category'=>$category, 
                    'username'=>$username
                );
                array_push($result_array,$event_item);
            }
            $response = array(
                "code" => 200,
                "message" => $result_array,
            );
        }
        
        echo json_encode($response);
        
    }
    
    
    function getForMainP2(){
     $query  = "Select id, name, location, interested from event ORDER BY interested DESC LIMIT 5";
     $stmt = $this->conn->prepare($query);
        $result_array = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $event_item = array(
                        'id' => $id,
                        'name' => $name,
                        'location' => $location,
                        'interested' => $interested
                    );
                array_push($result_array, $event_item);
            }
            
              $response = array(
                "code" => 200,
                "message" => $result_array,
            );
        
            echo json_encode($response);
        
        }
     
    }
    
    function getForMainP1(){
     $query  = "Select * from event where id=1";
     $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                extract($row);
                $event_item = array(
                        'id' => $id,
                        'name' => $name,
                        'location' => $location,
                        'interested' =>$interested,
                        'start'=>$start_date, 
                        'end'=>$end_date,
                        'interested'=>$interested,
                        'price'=>$price
                    );
              $response = array(
                "code" => 200,
                "message" => $event_item,
            );
        
            echo json_encode($response);
        
        }
     
    }
    
    /*A*/
}



?>