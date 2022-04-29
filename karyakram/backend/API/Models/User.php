<?php
class User
{
    private $conn;
    private $table = 'user';
    public $id;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $con_password;
    public $dob;
    public $age;
    public $status;
    public $role;

    public function __construct($db){
        $this->conn = $db;
    }
    function login()
    {
        if ($this->login_validation()) {
            $this->id = $this->phone_exists($this->phone, "login");
            if (!empty($this->id)) {
                $row = $this->fetch_user($this->id);
                //hash login password to verify
                // $this->password = password_hash($this->password, PASSWORD_DEFAULT);
                if (password_verify($this->password, $row['password'])) {
                    $user_data = array(
                        'id'=>$this->id,
                        'name'=>$row['name'],
                        'role'=>$row['role']
                        );
                    $response = array(
                        "code" => 200,
                        "message" => $user_data
                    );
                } else {
                    $response = array(
                        "code" => 400,
                        "message" => "Invalid password."
                    );
                }
            } else {
                $response = array(
                    "code" => 400,
                    "message" => "Phone number does not exist."
                );
            }
        } else {
            $response = array(
                "code" => 500,
                "message" => "Something went wrong."
            );
        }
        echo json_encode($response);
    }

    
    public function getMyInterests($user_id){
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
        i.attendence
        FROM interests i
        JOIN event e on i.event_id = e.id
        WHERE (i.user_id = :user_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
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
                    'attendence'=>$attendence 
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
    /*A*/
    public function getSabaiUsers(){
        $query = "SELECT * FROM user";
        $stmt = $this->conn->prepare($query);
        $result_array = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $user = array(
                    'id'=> $id, 
                    'name'=> $name, 
                    'email'=> $email, 
                    'contact'=> $contact, 
                    'password'=> $password, 
                    'dob'=> $dob, 
                    'age'=> $age, 
                    'status'=> $status, 
                    'blacklist'=> $blacklist
                );
                array_push($result_array,$user);
            }
            $response = array(
                "code" => 200,
                "message" => $result_array,
            );
        }
        echo json_encode($response);
    }

    public function getVerifiedUsers(){
        $query = "SELECT * FROM user where status = 1";
        $stmt = $this->conn->prepare($query);
        $result_array = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $user = array(
                    'id'=> $id, 
                    'name'=> $name, 
                    'email'=> $email, 
                    'contact'=> $contact, 
                    'password'=> $password, 
                    'dob'=> $dob, 
                    'age'=> $age, 
                    'status'=> $status,
                    'blacklist'=> $blacklist
                );
                array_push($result_array,$user);
            }
            $response = array(
                "code" => 200,
                "message" => $result_array,
            );
        }
        echo json_encode($response);
    }
    public function getUserById($id){
        $query = "SELECT * from user WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_array = array(
                'id'=> $result["id"], 
                    'name'=> $result["name"], 
                    'email'=> $result["email"], 
                    'contact'=> $result["contact"], 
                    'password'=> $result["password"], 
                    'dob'=> $result["dob"], 
                    'age'=> $result["age"], 
                    'status'=> $result["status"],
                    'blacklist'=> $result["blacklist"],
                    'created'=>$result['created'],
                    'role'=>$result["role"]
                );
            $response = array(
                "code" => 200,
                "message" => $user_array,
            );
        }
        echo json_encode($response);
    }
    
     /*A*/
     
    //  login dependency
    

    function login_validation()
    {
        $errors = [];
        if (empty($this->phone)) {
            $error[] = "Phone is required.";
        }
        if (strlen($this->password) < 8) {
            $errors[] = "Your Password cannot be less then 8 characters";
        }
        if (!empty($errors)) {
            return false;
        } else {
            return true;
        }
    }
    
    
    function phone_exists($phone, $activity = null)
    {
        $query = 'SELECT id 
        FROM ' . $this->table . '  
        WHERE 
        contact = :phone';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if ($activity == "login") {
                return $row['id'];
            } else {
                return true;
            }
        }
        return false;
    }

    function fetch_user($id)
    {
        $query = 'SELECT name, password, role 
        FROM ' . $this->table . '  
        WHERE 
        id = :id';            
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $row;
        }
        return false;
    }
    
    function updateUser($id,$name,$contact,$email){
        $query = 'UPDATE user set name = $name,contact = $contact, email = $email where id = $id'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $response = array(
                "code" => 200,
                "message" => "success",
            );
        
        echo json_encode($response);
    }
    
    function register()
    {
        if ($this->registration_validation()) {
            if($this->create_user()){
                $response = array(
                "code" => 200,
                "message" => "Registered"
            );
            }  
        } else {
            $response = array(
            "code" => 400,
            "message" => "Registration Failed");
        }
        echo json_encode($response);
    }
    
    
    function create_user()
    {
        $name = $this->name;
        $contact = $this->phone;
        $email = $this->email;
        $dob = $this->dob;
        $age = $this->age;
        $password = $this->password;
        $password   = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO users  
        SET
        name = :name,
        contact = :contact,
        email = :email,
        dob = :dob,
        age = :age,
        password=:password';
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($name));
        $this->phone = htmlspecialchars(strip_tags($contact));
        $this->email = htmlspecialchars(strip_tags($email));
        $this->password = htmlspecialchars(strip_tags($password));
        $this->age = htmlspecialchars(strip_tags($age));
        $this->dob = htmlspecialchars(strip_tags($dob));
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':contact', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':dob', $this->dob);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':password', $this->password);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    function registration_validation()
    {
        $errors = [];
        if (empty($this->name)) {
            $error[] = "Name is required.";
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/", $this->name)) {
            $error[] = "Invalid Name.";
        }
        if (empty($this->phone)) {
            $error[] = "Contact is required.";
        }
        if ($this->phone_exists($this->phone)) {
            $errors[] = "Sorry that Username is already is taken";
        }
        if (empty($this->email)) {
            $error[] = "Email is required.";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid email format.";
        }
        if (strlen($this->password) < 8) {
            $errors[] = "Your Password cannot be less then 8 characters";
        }
        if (!empty($errors)) {
            return false;
        } else {
            return true;
        }
    }
    
    
}



?>