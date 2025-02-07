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
    function edit($name, $thumbnail, $instructor, $duration, $price, $id)
    {
        $sql = "UPDATE courses 
                SET name = ?, instructor = ?, duration = ?, price = ?, thumbnail = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        
        // Bind the parameters
        $stmt->bind_param('sssssi', $name, $instructor, $duration, $price, $thumbnail, $id);
        
        // Execute the query
        return $stmt->execute();
    }
    

    function add($name, $thumbnail,$instructor, $duration, $price)
    {
        $sql = "INSERT INTO courses (name,thumbnail, instructor, duration, price) VALUES (?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);
        
        // Bind the parameters
        $stmt->bind_param("sssssi",$name, $thumbnail,$instructor, $duration, $price);
        
        // Execute the query
        return $stmt->execute();
        
    
    }
   
    function delete($id)
    {
        $id = $this->conn->real_escape_string($id);
        $sql = "DELETE FROM courses WHERE id=$id";

        return $this->conn->query($sql);
    }
    }

