<?php
class Category{
    
    private $conn;
    private $table = 'category';
    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCattegoryName(){
        $query  =  "SELECT name FROM category";
        $stmt = $this->conn->prepare($query);
        $names = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                array_push($names, $name);
            }
        }
        $response = array(
            "code" => 200,
            "message" => $names,
        );
        echo json_encode($response);
    }
    
    
    /*A*/
    public function getAllCategories(){
        $query  =  "SELECT * FROM category";
        $stmt = $this->conn->prepare($query);
        $datas = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $item = array(
                        'id' => $id,
                        'name' => $name,
                    );
                array_push($datas, $item);
            }
        }
        $response = array(
            "code" => 200,
            "message" => $datas,
        );
        echo json_encode($response);
    }

}


?>