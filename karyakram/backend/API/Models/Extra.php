<?php
class Extra
{

    private $conn;
    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /*A*/
    private function getAllCount()
    {
        $queries = array();
        $datas = array();
        $queries[0]  =  "SELECT count(*) as count FROM category";
        $queries[1]  =  "SELECT count(*) as count FROM event where price = 0";
        $queries[2]  =  "SELECT count(*) as count FROM event where price > 0";

        $topic = array('categories', 'freeEvents', 'paidEvents');
        $i = 0;
        foreach ($queries as $query) {
            $stmt = $this->conn->prepare($query);
            $temp = array();
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $temp = array(
                        $topic[$i++] => $count
                    );
                    array_push($datas, $temp);
                }
            }
        }


        return $datas;
    }

    private function getUsersByAge()
    {
        $datas = array();
        $min = 16;
        while ($min < 64) {
            $max = $min + 8;
            $query = "SELECT count(*) as count FROM user where age >= $min AND age < $max";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $datas[$min . "-" . $max] = $count;
                }
            }
            $min += 8;
        }


        return $datas;
    }

    private function getUsersByAgeSpecific($id)
    {
        $datas = array();
        $min = 16;
        while ($min < 64) {
            $max = $min + 8;
            $query = "SELECT COUNT(*) as count FROM interests i JOIN user u WHERE u.age >= $min and u.age < $max AND i.attendence != 0 AND i.user_id = u.id AND i.event_id= $id" ;
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $datas[$min . "-" . $max] = $count;
                }
            }
            $min += 8;
        }


        return $datas;
    }

    private function getAttendenceCount($id)
    {
        $queries = array();
        $datas = array();
        $queries[0]  =  "SELECT COUNT(*) as count FROM interests WHERE event_id = $id";
        $queries[1]  =  "SELECT COUNT(*) as count FROM interests WHERE event_id = $id and attendence != 0";

        $topic = array('totalInterested', 'present');
        $i = 0;
        foreach ($queries as $query) {
            $stmt = $this->conn->prepare($query);
            $temp = array();
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $temp = array(
                        $topic[$i++] => $count
                    );
                    array_push($datas, $temp);
                }
            }
        }


        return $datas;
    }
    //SELECT user.age FROM user JOIN interests on user.id = interests.user_id WHERE event_id = 15
    private function getEventsMonth()
    {
        $start = date('Y-m-01');
        $end = date('Y-m-t');
        $max = 20;
        $query = "SELECT name,interested from event where start_date >= $start AND end_date <= $end ORDER by interested desc limit $max";
        echo $query;
        $datas = array();
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $temp = array();
                extract($row);
                $temp = array(
                    "name" => $name,
                    "interested" => $interested
                );
                array_push($datas, $temp);
            }
        }

        return $datas;
    }

    private function getPopularEvents($max)
    {
        $date = date("Y-m-d");
        $query = "SELECT name,interested from event where start_date > $date ORDER by interested desc limit $max";
        $datas = array();
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $temp = array();
                extract($row);
                $temp = array(
                    "name" => $name,
                    "interested" => $interested
                );
                array_push($datas, $temp);
            }
        }

        return $datas;
    }


    public function getAllCounts()
    {
        $main = array(
            "counts" => $this->getAllCount(),
            "usersByAge" => $this->getUsersByAge(),
            "popularEvents" => $this->getPopularEvents(10)
        );
        $response = array(
            "code" => 200,
            "message" => $main
        );
        echo json_encode($response);
    }

    public function getCountByEventId($id)
    {
        $main = array(
            "usersByAge" => $this->getUsersByAgeSpecific($id),
            "attendence" => $this->getAttendenceCount($id)
        );
        $response = array(
            "code" => 200,
            "message" => $main
        );
        echo json_encode($response);
    }
}
