<?php
namespace app\Models;
class BaseModel
{
    protected $conn;
    public function __construct()
    {
        $this->conn = new \mysqli('localhost', 'root', '', 'ph51521_asm1_php2');
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
class HomeModel extends BaseModel
{
    function getAll()
    {
        $sql = "SELECT * FROM courses";
        $result = $this->conn->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    function findID($id)
    {
        $id = $this->conn->real_escape_string($id);
        $sql = "SELECT * FROM courses WHERE id = $id";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc();
    }

    function edit($name, $instructor, $duration, $price, $thumbnail)
    {
        $sql = "INSERT INTO courses (name, instructor, duration, price, thumbnail) 
                VALUES (:name, :instructor, :duration, :price, :thumbnail)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':instructor', $instructor);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':thumbnail', $thumbnail);
        return $stmt->execute();
    }

    function add($id, $name, $instructor, $duration, $price, $thumbnail)
    {
        $sql = "UPDATE courses 
                SET name = :name, instructor = :instructor, duration = :duration, price = :price, thumbnail = :thumbnail
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':instructor', $instructor);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':thumbnail', $thumbnail);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function delete($id)
    {
        $id = $this->conn->real_escape_string($id);
        $sql = "DELETE FROM courses WHERE id=$id";

        return $this->conn->query($sql);
    }
}

?>
